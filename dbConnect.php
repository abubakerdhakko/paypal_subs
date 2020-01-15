<?php  
// Connect with the database  
$db = new mysqli(localhost, root, root, paypal_sub);  
  
// Display error if failed to connect  
if ($db->connect_errno) {  
    printf("Connect failed: %s\n", $db->connect_error);  
    exit();  
}