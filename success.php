
<script>
    console.log('dddd')
</script>

<?php


// Include configuration file  
include_once 'config.php';

// Include database connection file  
include_once 'dbConnect.php';

if (!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && $_GET['st'] == 'Completed') {
    // Get transaction information from URL  
    $item_number = $_GET['item_number'];
    $txn_id = $_GET['tx'];
    $payment_gross = $_GET['amt'];
    $currency_code = $_GET['cc'];
    $payment_status = $_GET['st'];
    $custom = $_GET['cm'];

    // Check if transaction data exists with the same TXN ID.  
    $prevPaymentResult = $db->query("SELECT * FROM user_subscriptions WHERE txn_id = '" . $txn_id . "'");

    if ($prevPaymentResult->num_rows > 0) {
        // Get subscription info from database 
        $paymentData = $prevPaymentResult->fetch_assoc();
    }
}
?>

<div class="bg-main">
    <?php if (!empty($paymentData)) { ?>

        <h1 class="success">Your Subscription Payment has been Successful!</h1>

        <div class="" style="background-color: #e1e1e1;
    padding: 10px 40px;
    max-width: 1000px;
    margin: 0px auto;
    border-radius: 10px;">

            <h4>Payment Information</h4>
            <p><b>Reference Number:</b> <?php echo $paymentData['id']; ?></p>
            <p><b>Transaction ID:</b> <?php echo $paymentData['txn_id']; ?></p>
            <p><b>Paid Amount:</b> <?php echo $paymentData['payment_gross'] . ' ' . $paymentData['currency_code']; ?></p>
            <p><b>Payment Status:</b> <?php echo $paymentData['payment_status']; ?></p>

            <h4>Subscription Information</h4>
            <p><b>ID:</b> <?php echo $paymentData['subscr_id']; ?></p>
            <p><b>Name:</b> <?php echo $itemName; ?></p>
            <p><b>Validity:</b> <?php echo $paymentData['valid_from'] . ' to ' . $paymentData['valid_to']; ?></p>
            <a href="sub.php">Go to login page </a>
        </div>
    <?php } else { ?>
        <h1 class="error">Waiting for response else refresh page or <span> <a href="sub.php">Go to login page </a></span> </h1>
        <br />
    <?php } ?>
</div>
