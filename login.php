
<?php
include('login-work.php'); // Include Login Script
if ((isset($_SESSION['p_email']) != '')) 
{
header('Location: success_page.php');
}
?>
 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Form</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
 
<body>
<div class="loginBox">
<h3>Login Form</h3>
<br><br>
<form method="post" action="">
<label>payer_email:</label><br>
<input type="text" name="p_email" placeholder="payer_email" /><br><br>
<!-- <label>Password:</label><br>
<input type="password" name="password" placeholder="password" />  <br><br> -->
<input type="submit" name="submit" value="Login" /> 
</form>
<div class="error"><?php echo $error;?></div>
</div>
</body>
</html>