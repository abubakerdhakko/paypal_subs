<script>
    console.log('dbConnect.php');
</script>

<?php
// $url = parse_url(getenv("CLEARDB_DATABASE_URL:
// mysql://b770ae34b12c19:b5c5c63a@eu-cdbr-west-02.cleardb.net/heroku_0885a564f4e05ce?reconnect=true "));
// $server = $url["eu-cdbr-west-02.cleardb.net"];
// $username = $url["b770ae34b12c19"];
// $password = $url["b5c5c63a"];
// $db = substr($url["heroku_0885a564f4e05ce"], 1);

// $config = array(
//     'host' => $server ,
//     'user' => $username ,
//     'pw' => $password,
//     'db' => $db 
// );


// if ($config->connect_errno) {  
//     printf("Connect failed: %s\n", $config->connect_errno);  
//    die();  
// }else
// {

//     printf("Connect");

// }



// Connect with the  live database  
$db = new mysqli('eu-cdbr-west-02.cleardb.net', 'b770ae34b12c19', 'b5c5c63a', 'heroku_0885a564f4e05ce');

// Display error if failed to connect  
if ($db->connect_errno) {
    printf("Connect failed: %s\n", $db->connect_errno);
    exit();
}



// // Connect with the local database  
// $db = new mysqli('localhost', 'root', 'root', 'paypal_sub');

// // Display error if failed to connect  
// if ($db->connect_errno) {
//     printf("Connect failed: %s\n", $db->connect_error);
//     exit();
// } 
