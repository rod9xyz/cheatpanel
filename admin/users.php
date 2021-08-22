<?php
require 'config.php';
$usrname = $_COOKIE["username"];
$conn = mysqli_connect(db_host, db_username, db_password, db_name);
$sql1 = "SELECT * FROM `users` WHERE `name` = '${usrname}'";
$hwid = $conn->query($sql1)->fetch_array();
if($hwid['password'] != $_COOKIE["pass"]) {
    header('location: \index.php');
    die();
}
$sql = "SELECT * FROM users ";
$data = $conn->query($sql)->fetch_array();
echo "
<link rel='stylesheet' type='text/css' href='style.css'>";
$query = "SELECT * FROM users"; //You don't need a ; like you do in SQL
$result = $conn->query($query);

echo "<table>"; // start a table tag in the HTML
echo "<tr><td>Id</td><td>Name</td><td>HWID</td><td>sub</td><td>admin</td><td>banned</td><td>ban reason</td></tr>";
while($row = $result->fetch_array()){   //Creates a loop to loop through results

    echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" .$row['hwid']. "</td><td>" .$row['subtill']. "</td><td>" .$row['admin']."</td><td>" .$row['banned']. "</td><td>" .$row['ban_reason']. "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML
