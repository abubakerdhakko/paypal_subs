<!-- < ?php

 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 include_once 'dbConnect.php';  
 $result = mysqli_query($db,"SELECT * FROM user_subscriptions");



 echo "<table border='1'>
 <tr>
 <th>Firstname</th>
 <th>Lastname</th>
 </tr>";

 while($row = mysqli_fetch_array($result))
 {
 echo "<tr>";
 echo "<td>" . $row['payer_email'] . "</td>";
  echo "<td>" . $row['LastName'] . "</td>";
 echo "</tr>";
 }
 echo "</table>";

 mysqli_close($db);
?> 