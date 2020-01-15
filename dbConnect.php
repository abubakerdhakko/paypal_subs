<?php  
// Connect with the database  
$url = parse_url(getenv("CLEARDB_DATABASE_URL:mysql://b770ae34b12c19:b5c5c63a@eu-cdbr-west-02.cleardb.net/heroku_0885a564f4e05ce?reconnect=true"));
$server = $url["eu-cdbr-west-02.cleardb.net"];
$username = $url["b770ae34b12c19"];
$password = $url["b5c5c63a"];
$db = substr($url["heroku_0885a564f4e05ce"], 1);

$config = array(
    'host' => $server ,
    'user' => $username ,
    'pw' => $password,
    'db' => $db 
);
// $url = parse_url(getenv("mysql://b770ae34b12c19:b5c5c63a@eu-cdbr-west-02.cleardb.net/heroku_0885a564f4e05ce?reconnect=true "));
// $server = $url["eu-cdbr-west-02.cleardb.net"];
// $username = $url["b770ae34b12c19"];
// $password = $url["b5c5c63a"];
// $db = substr($url["heroku_0885a564f4e05ce"], 1);
// $connection = new mysqli($server, $username, $password, $db);
// $db = new mysqli(eu-cdbr-west-02.cleardb.net, b5c5c63a, b770ae34b12c19,  heroku_0885a564f4e05ce);  
  
// Display error if failed to connect  
if ($config->connect_errno) {  
    printf("Connect failed: %s\n", $config->connect_error);  
   exit();  
}