<?php  
// Connect with the database  
$db = new mysqli(eu-cdbr-west-02.cleardb.net, b770ae34b12c19, b5c5c63a, eu-cdbr-west-02.cleardb.net);  
  
// Display error if failed to connect  
if ($db->connect_errno) {  
    printf("Connect failed: %s\n", $db->connect_error);  
    exit();  
}
