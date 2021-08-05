<?php
$usrname = $_COOKIE["username"];
$conn = mysqli_connect("localhost", "root", "root", "123");
$sql1 = "SELECT * FROM `users` WHERE `name` = '${usrname}'";
$hwid = $conn->query($sql1)->fetch_array();
if($hwid['password'] != $_COOKIE["pass"]) {
    header('location: \panel\index.php');
    die();
}
if($hwid['admin'] != '1') {
    die();
}
$subname = $_POST['subuser'];
$subtill = $_POST['subtime'];
$sql2 = "UPDATE `users` SET `subtill` = '$subtill' WHERE name = '$subname'";
$conn->query($sql2);
echo "sub set successfully";
echo $subtill;
echo $subname;