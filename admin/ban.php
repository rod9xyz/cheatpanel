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
$usrban = $_POST['banuser'];
$reason = $_POST['banreason'];
$sql2 = "UPDATE `users` SET `banned` = '1' WHERE `name` = '${usrban}'";
$sql3 = "UPDATE `users` SET `ban_reason` = '${reason}' WHERE name = '${usrban}'";
$conn->query($sql2);
$conn->query($sql3);
echo "user banned successfully";
