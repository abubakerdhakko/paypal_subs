<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'dbConnect.php';
$result = mysqli_query($db, "SELECT * FROM user_subscriptions");



echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>";

while ($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['payer_email'] . "</td>";
  // echo "<td>" . $row['LastName'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($db);
?>
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
  <h3 align="center"> Student Details</h3>
  <table border="1" align="center">
    <tr>
      <td> <input type="button" id="display" value="Display All Data" /> </td>
    </tr>
  </table>
  <div id="responsecontainer" align="center">

  </div>
</body>

</html>