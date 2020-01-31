<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $.ajax({ //create an ajax request to display.php
      type: "GET",
      url: "success.php",
      dataType: "html", //expect html to be returned                
      success: function(response) {
        $("#responsecontainer").html(response);
        // alert(response);
      }
    });
  });
</script>

<body>
  <h3 align="center">Manage Student Details</h3>
  <table border="1" align="center">
    <tr>
      <td> <input type="button" id="display" value="Display All Data" /> </td>
    </tr>
  </table>
  <div id="responsecontainer" align="center">

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
        </div>
      <?php } else { ?>
        <h1 class="error">Waiting for response else refresh page </h1>
      <?php } ?>
    </div>
  </div>
</body>

</html>