<script>
  console.log('config.php');
</script>

<?php
// Product information 

$itemName = 'Membership Subscription';
$itemNumber = 'MS123456';

// Subscription price for one month 
$itemPrice = 9;

$validTill = 12;

// PayPal configuration  
define('PAYPAL_ID', 'sb-uvmyk858514@business.example.com');
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE  
// live
define('PAYPAL_RETURN_URL', 'http://bliss-zone.herokuapp.com/success.php');
define('PAYPAL_CANCEL_URL', 'http://bliss-zone.herokuapp.com/cancel.php');
define('PAYPAL_NOTIFY_URL', 'http://bliss-zone.herokuapp.com/paypal_ipn.php');



// local
// define('PAYPAL_RETURN_URL', 'http://dfc2e1e5.ngrok.io/bliss/success.php');
// define('PAYPAL_CANCEL_URL', 'http://dfc2e1e5.ngrok.io/bliss/cancel.php');
// define('PAYPAL_NOTIFY_URL', 'http://dfc2e1e5.ngrok.io/bliss/paypal_ipn.php');

// define('PAYPAL_NOTIFY_URL', 'http://3fc0235b.ngrok.io/paypal-subs/paypal_ipn.php');
define('PAYPAL_CURRENCY', 'USD');

// Database configuration  
// define('DB_HOST', 'localhost');  
// define('DB_USERNAME', 'root');  
// define('DB_PASSWORD', 'root');  
// define('DB_NAME', 'paypal_sub');  




define('DB_HOST', 'eu-cdbr-west-02.cleardb.ne');
define('DB_USERNAME', 'b770ae34b12c19');
define('DB_PASSWORD', 'b5c5c63a');
define('DB_NAME', 'heroku_0885a564f4e05ce');




define('PAYPAL_URL', (PAYPAL_SANDBOX == true) ? "https://ipnpb.sandbox.paypal.com/cgi-bin/webscr" : "https://ipnpb.sandbox.paypal.com/cgi-bin/webscr");


// define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.sandbox.paypal.com/cgi-bin/webscr
// ");
