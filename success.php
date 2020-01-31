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
