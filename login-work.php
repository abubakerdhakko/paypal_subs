<?php
session_start();
include("dbConnect.php"); //Establishing connection with our database
 
$error = ""; //Variable for storing our errors.
if(isset($_POST["submit"]))
{
if(empty($_POST["p_email"]))
{
$error = " field  required.";
}else
{
// Define $username and $password
$username=$_POST['p_email'];
 

// To protect from MySQL injection
$username = stripslashes($username);
$username = mysqli_real_escape_string($db, $username);

 
//Check username and password from database
$sql="SELECT * FROM user_subscriptions WHERE payer_email='$username' ";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 
//If username and password exist in our database then create a session.
//Otherwise echo error.
 
if(mysqli_num_rows($result) == 1)
{
$_SESSION['p_email'] = $username; 

// printf (
//   $_SESSION['p_email']);
// die();

// Initializing Session
header("location: success_page.php"); // Redirecting To Other Page
}else
{
$error = "Incorrect email.";
}
}
}
 
?>