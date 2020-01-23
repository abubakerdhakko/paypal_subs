
<?php
include('dbConnect.php');
session_start();
$user_check=$_SESSION['p_email'];


$sql = mysqli_query($db,"SELECT payer_email FROM user_subscriptions WHERE payer_email='$user_check' ");

$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
 
$username=$row['p_email'];
 
if(!isset($user_check))
{
header("Location: login.php");
}
?>