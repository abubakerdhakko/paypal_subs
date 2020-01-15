<?php  
// Connect with the database  
$db = new mysqli(eu-cdbr-west-02, b770ae34b12c19, b5c5c63a, eu-cdbr-west-02);  
  
// Display error if failed to connect  
if ($db->connect_errno) {  
    printf("Connect failed: %s\n", $db->connect_error);  
    exit();  
}

define('DB_HOST', 'eu-cdbr-west-02.cleardb.net');  
define('DB_USERNAME', 'b770ae34b12c19');  
define('DB_PASSWORD', 'b5c5c63a');  
define('DB_NAME', 'eu-cdbr-west-02.cleardb.net');  