<?php  
// Connect with the database  
$db = new mysqli(eu-cdbr-west-02, b770ae34b12c19, b5c5c63a, heroku_0885a564f4e05ce);  
  
// Display error if failed to connect  
if ($db->connect_errno) {  
    printf("Connect failed: %s\n", $db->connect_error);  
    exit();  
}