<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'dbConnect.php';


$result = mysqli_query($db, "DELETE FROM user_subscriptions WHERE valid_to < NOW();");




mysqli_close($db);
