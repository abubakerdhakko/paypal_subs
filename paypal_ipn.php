<?php

// Include configuration file 
include_once 'config.php'; 
 
// $test = json_encode($_REQUEST);
// file_put_contents('paypal_ipn_text.txt', $test);
// die();

// Include database connection file 
include_once 'dbConnect.php'; 
 

      // CONFIG: Enable debug mode. This means we'll log requests into 'ipn.log' in the same directory.
      // Especially useful if you encounter network errors or other intermittent problems with IPN (validation).
      // Set this to 0 once you go live or don't require logging.
      define("DEBUG", 1);
      define("LOG_FILE", "../log/ipn.log");

      // Set to 0 once you're ready to go live
      define("USE_SANDBOX", 1);

      // Read POST data
      // reading posted data directly from $_POST causes serialization
      // issues with array data in POST. Reading raw POST data from input stream instead.
      $raw_post_data = file_get_contents('php://input');
      $raw_post_array = explode('&', $raw_post_data);
      $myPost = array();
      foreach ($raw_post_array as $keyval) {
              $keyval = explode ('=', $keyval);
              if (count($keyval) == 2)
                      $myPost[$keyval[0]] = urldecode($keyval[1]);
      }
      // read the post from PayPal system and add 'cmd'
      $req = 'cmd=_notify-validate';
      if (function_exists('get_magic_quotes_gpc')) {
         $get_magic_quotes_exists = true;
      }
      foreach ($myPost as $key => $value) {
              if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                 $value = urlencode(stripslashes($value));
              } else {
                 $value = urlencode($value);
              }
              $req .= "&$key=$value";
      }

      // Post IPN data back to PayPal to validate the IPN data is genuine
      // Without this step anyone can fake IPN data
      if (USE_SANDBOX == true) {
         $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
      } else {
         $paypal_url = "https://www.paypal.com/cgi-bin/webscr";
      }

      $ch = curl_init($paypal_url);
      if ($ch == FALSE) {
         return FALSE;
      }

      curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
      curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);

      if (DEBUG == true) {
         curl_setopt($ch, CURLOPT_HEADER, 1);
         curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
      }

      // CONFIG: Optional proxy configuration
      //curl_setopt($ch, CURLOPT_PROXY, $proxy);
      //curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);

      // Set TCP timeout to 30 seconds
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

      // CONFIG: Please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path
      // of the certificate as shown below. Ensure the file is readable by the webserver.
      // This is mandatory for some environments.

      //$cert = __DIR__ . "./cacert.pem";
      //curl_setopt($ch, CURLOPT_CAINFO, $cert);

      $res = curl_exec($ch);
      if (curl_errno($ch) != 0) { // cURL error
         if (DEBUG == true) {
            error_log(date('[Y-m-d H:i e] '). "Can't connect to PayPal to validate IPN message: " . curl_error($ch) . PHP_EOL, 3, LOG_FILE);
         }
         curl_close($ch);
         exit;

      } else {
         // Log the entire HTTP response if debug is switched on.
         if (DEBUG == true) {
            error_log(date('[Y-m-d H:i e] '). "HTTP request of validation request:". curl_getinfo($ch, CURLINFO_HEADER_OUT) ." for IPN payload: $req" . PHP_EOL, 3, LOG_FILE);    
            error_log(date('[Y-m-d H:i e] '). "HTTP response of validation request: $res" . PHP_EOL, 3, LOG_FILE);

            // Split response headers and payload
            list($headers, $res) = explode("\r\n\r\n", $res, 2);
         }
         curl_close($ch);
      }

      // Inspect IPN validation result and act accordingly
      if (strcmp ($res, "VERIFIED") == 0) {

         if (DEBUG == true) {
            error_log(date('[Y-m-d H:i e] '). "Verified IPN: $req ". PHP_EOL, 3, LOG_FILE);
         }
         return true;
      } else if (strcmp ($res, "INVALID") == 0) {
         // log for manual investigation
         // Add business logic here which deals with invalid IPN messages'
            // Retrieve transaction data from PayPal 
    $paypalInfo = $_POST; 

    $subscr_id = $paypalInfo['payer_id']; 
    $subscr_id = $paypalInfo['subscr_id']; 
    $payer_email = $paypalInfo['payer_email']; 
    $item_name = $paypalInfo['item_name']; 
    $item_number = $paypalInfo['item_number']; 
    $txn_id = !empty($paypalInfo['txn_id'])?$paypalInfo['txn_id']:''; 
    $payment_gross =  !empty($paypalInfo['mc_gross'])?$paypalInfo['mc_gross']:0; 
    $currency_code = $paypalInfo['mc_currency']; 
    $subscr_period = !empty($paypalInfo['period3'])?$paypalInfo['period3']:floor($payment_gross/$itemPrice); 
    $payment_status = !empty($paypalInfo['payment_status'])?$paypalInfo['payment_status']:''; 
    $custom = $paypalInfo['custom']; 
    $subscr_date = !empty($paypalInfo['subscr_date'])?$paypalInfo['subscr_date']:date("Y-m-d H:i:s"); 
    $dt = new DateTime($subscr_date); 
    $subscr_date = $dt->format("Y-m-d H:i:s"); 
    $subscr_date_valid_to = date("Y-m-d H:i:s", strtotime(" + $subscr_period month", strtotime($subscr_date))); 
     
            // Insert transaction data into the database 
            $insert = $db->query("INSERT INTO user_subscriptions(user_id,validity,valid_from,valid_to,item_number,txn_id,payment_gross,currency_code,subscr_id,payment_status,payer_email) VALUES('".$custom."','".$subscr_period."','".$subscr_date."','".$subscr_date_valid_to."','".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','".$subscr_id."','".$payment_status."','".$payer_email."')"); 
             
            // Update subscription id in the users table 
            if($insert && !empty($custom)){ 
                $subscription_id = $db->insert_id; 
                $update = $db->query("UPDATE users SET subscription_id = {$subscription_id} WHERE id = {$custom}"); 
         if (DEBUG == true) {
            error_log(date('[Y-m-d H:i e] '). "Invalid IPN: $req" . PHP_EOL, 3, LOG_FILE);
         }
         return false;
      }

   

?>


<script>
console.log('paypal_ipn');
</script>
<?php 


/* 
 * Read POST data 
 * reading posted data directly from $_POST causes serialization 
 * issues with array data in POST. 
 * Reading raw POST data from input stream instead. 
 */         
$raw_post_data = file_get_contents('php://input'); 
print_r($raw_post_array);
die();

$raw_post_array = explode('&', $raw_post_data); 
$myPost = array($_POST); 
foreach ($raw_post_array as $keyval) { 
    $keyval = explode ('=', $keyval); 
    if (count($keyval) == 2) 
        $myPost[$keyval[0]] = urldecode($keyval[1]); 
} 
 
// Read the post from PayPal system and add 'cmd' 
$req = 'cmd=_notify-validate'; 
if(function_exists('get_magic_quotes_gpc')) { 
    $get_magic_quotes_exists = true; 
} 
foreach ($myPost as $key => $value) { 
    if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) { 
        $value = urlencode(stripslashes($value)); 
    } else { 
        $value = urlencode($value); 
    } 
    $req .= "&$key=$value"; 
} 
/* 
 * Post IPN data back to PayPal to validate the IPN data is genuine 
 * Without this step anyone can fake IPN data 
 */ 
$paypalURL = PAYPAL_URL; 
$ch = curl_init($paypalURL); 
if ($ch == FALSE) { 
    return FALSE; 
} 
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $req); 
curl_setopt($ch, CURLOPT_SSLVERSION, 6); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); 
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1); 
 
// Set TCP timeout to 30 seconds 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name')); 
$res = curl_exec($ch); 
 


/* 
 * Inspect IPN validation result and act accordingly 
 * Split response headers and payload, a better way for strcmp 
 */  
$tokens = explode("\r\n\r\n", trim($res)); 
$res = trim(end($tokens)); 
if (strcmp($res, "VERIFIED")  || strcasecmp($res, "VERIFIED")) { 
     
    // Retrieve transaction data from PayPal 
    $paypalInfo = $_POST; 

    $subscr_id = $paypalInfo['payer_id']; 
    $subscr_id = $paypalInfo['subscr_id']; 
    $payer_email = $paypalInfo['payer_email']; 
    $item_name = $paypalInfo['item_name']; 
    $item_number = $paypalInfo['item_number']; 
    $txn_id = !empty($paypalInfo['txn_id'])?$paypalInfo['txn_id']:''; 
    $payment_gross =  !empty($paypalInfo['mc_gross'])?$paypalInfo['mc_gross']:0; 
    $currency_code = $paypalInfo['mc_currency']; 
    $subscr_period = !empty($paypalInfo['period3'])?$paypalInfo['period3']:floor($payment_gross/$itemPrice); 
    $payment_status = !empty($paypalInfo['payment_status'])?$paypalInfo['payment_status']:''; 
    $custom = $paypalInfo['custom']; 
    $subscr_date = !empty($paypalInfo['subscr_date'])?$paypalInfo['subscr_date']:date("Y-m-d H:i:s"); 
    $dt = new DateTime($subscr_date); 
    $subscr_date = $dt->format("Y-m-d H:i:s"); 
    $subscr_date_valid_to = date("Y-m-d H:i:s", strtotime(" + $subscr_period month", strtotime($subscr_date))); 
     
            // Insert transaction data into the database 
            $insert = $db->query("INSERT INTO user_subscriptions(user_id,validity,valid_from,valid_to,item_number,txn_id,payment_gross,currency_code,subscr_id,payment_status,payer_email) VALUES('".$custom."','".$subscr_period."','".$subscr_date."','".$subscr_date_valid_to."','".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','".$subscr_id."','".$payment_status."','".$payer_email."')"); 
             
            // Update subscription id in the users table 
            if($insert && !empty($custom)){ 
                $subscription_id = $db->insert_id; 
                $update = $db->query("UPDATE users SET subscription_id = {$subscription_id} WHERE id = {$custom}"); 
        
    } 
} 
die;