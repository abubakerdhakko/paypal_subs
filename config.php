<script>
console.log('config.php');
</script>

<?php  
// Product information 

$itemName = 'Membership Subscription'; 
$itemNumber = 'MS123456'; 
 
// Subscription price for one month 
$itemPrice = 25.00; 
   
// PayPal configuration  
define('PAYPAL_ID', 'sb-uvmyk858514@business.example.com');  
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE  
  
define('PAYPAL_RETURN_URL', 'http://bliss-zone.herokuapp.com/success.php');  
define('PAYPAL_CANCEL_URL', 'http://bliss-zone.herokuapp.com/cancel.php');  
// define('PAYPAL_NOTIFY_URL', 'http://bliss-zone.herokuapp.com/paypal_ipn.php');  

define('PAYPAL_NOTIFY_URL', '	http://c4c2ae30.ngrok.io/paypal-subs/paypal_ipn.php');
define('PAYPAL_CURRENCY', 'USD');  
  
// Database configuration  
define('DB_HOST', 'eu-cdbr-west-02.cleardb.net');  
define('DB_USERNAME', 'b770ae34b12c19');  
define('DB_PASSWORD', 'b5c5c63a');  
define('DB_NAME', 'heroku_0885a564f4e05ce');  
// https://ipnpb.sandbox.paypal.com/cgi-bin/webscr
// Change not required  
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://ipnpb.sandbox.paypal.com/cgi-bin/webscr":"https://ipnpb.sandbox.paypal.com/cgi-bin/webscr");