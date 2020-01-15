<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blizz paypal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <link rel="icon" href="favicon.ico" type="image/x-icon">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <!-- <link rel="stylesheet" href="../build/mediaelementplayer.css"> -->
    <link rel="stylesheet" href="./style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"> -->


    <link rel="stylesheet" href="https://cdn.plyr.io/1.6.16/plyr.css">
    <script src="https://cdn.plyr.io/1.6.16/plyr.js"></script>


</head>

<body>
<?php 
// Include configuration file  
include_once 'config.php';  
  
// Include database connection file  
include_once 'dbConnect.php'; 
 
// Start session 
session_start(); 
 
// Get logged-in user ID from sesion 
// Session name need to be changed as per your system 
$loggedInUserID = !empty($_SESSION['userID'])?$_SESSION['userID']:0; 
?>
<p>jbkbkbkbjjjjj</p>
<div class="container mt-5">

<div class="form-group">
    <label>Subscription Validity:</label>
    <select name="validity" onchange="getSubsPrice(this);">
        <option value="1" selected="selected">1 Month</option>
        <option value="3">3 Month</option>
        <option value="6">6 Month</option>
        <option value="9">9 Month</option>
        <option value="12">12 Month</option>
    </select>
</div>
<div class="form-group">
    <p><b>Total Price:</b> <span id="subPrice"><?php echo '$'.$itemPrice.' USD'; ?></span></p>
</div>

<!-- Buy button -->
<form action="<?php echo PAYPAL_URL; ?>" method="post">
    <!-- Identify your business so that you can collect the payments -->
    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
    <!-- Specify a subscriptions button. -->
    <input type="hidden" name="cmd" value="_xclick-subscriptions">
    <!-- Specify details about the subscription that buyers will purchase -->
    <input type="hidden" name="item_name" value="<?php echo $itemName; ?>">
    <input type="hidden" name="item_number" value="<?php echo $itemNumber; ?>">
    <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
    <input type="hidden" name="a3" id="paypalAmt" value="<?php echo $itemPrice; ?>">
    <input type="hidden" name="p3" id="paypalValid" value="1">
    <input type="hidden" name="t3" value="M">
    <!-- Custom variable user ID -->
    <input type="hidden" name="custom" value="<?php echo $loggedInUserID; ?>">
    <!-- Specify urls -->
    <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
    <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
    <input type="hidden" name="notify_url" value="<?php echo PAYPAL_NOTIFY_URL; ?>">
    <!-- Display the payment button -->
    <input class="buy-btn btn-success" type="submit" value="Buy Subscription">
</form>

</div>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"></script>
    <script>
function getSubsPrice(obj){
	var month = obj.value;
	var price = (month * <?php echo $itemPrice; ?>);
	document.getElementById('subPrice').innerHTML = '$'+price+' USD';
	document.getElementById('paypalValid').value = month;
	document.getElementById('paypalAmt').value = price;
}
</script>

</body>
</html>