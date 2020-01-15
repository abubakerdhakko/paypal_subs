<?php  
// Product information 
$itemName = 'Membership Subscription'; 
$itemNumber = 'MS123456'; 
 
// Subscription price for one month 
$itemPrice = 25.00; 
   
// PayPal configuration  
define('PAYPAL_ID', 'sb-uvmyk858514@business.example.com');  
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE  
  
define('PAYPAL_RETURN_URL', 'http://localhost:8888/paypal-subs/success.php');  
define('PAYPAL_CANCEL_URL', 'http://localhost:8888/paypal-subs/cancel.php');  
define('PAYPAL_NOTIFY_URL', 'http://localhost:8888/paypal_subs/paypal_ipn.php');  
define('PAYPAL_CURRENCY', 'USD');  
  
// Database configuration  
define('DB_HOST', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', 'root');  
define('DB_NAME', 'paypal_sub');  
  
// Change not required  
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");