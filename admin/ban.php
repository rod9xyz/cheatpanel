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
if($hwid['admin'] != '1') {
    die();
}
$usrban = $_POST['banuser'];
$bamuser1 = "SELECT banned FROM `users` WHERE `name` = '${usrban}'";
$reason = $_POST['banreason'];
$sql2 = "UPDATE `users` SET `banned` = '1' WHERE `name` = '${usrban}'";
$sql3 = "UPDATE `users` SET `ban_reason` = '${reason}' WHERE name = '${usrban}'";
$sql4 = "UPDATE `users` SET `banned` = '0' WHERE `name` = '${usrban}'";
$check = $conn->query($bamuser1)->fetch_array();
if($check['banned'] == "1")
{
    $conn->query($sql4);
    echo "user has been unbanned";
}
if($check['banned'] == "0") {
$conn->query($sql2);
$conn->query($sql3);
echo "user banned successfully";
}