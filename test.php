<?php
include_once 'dbConnect.php';  
$result = mysqli_query($con,"SELECT * FROM users_subscription");

echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['payer_email'] . "</td>";
// echo "<td>" . $row['LastName'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>