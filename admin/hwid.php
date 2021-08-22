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
if(!isset($_POST['hwiduser'])) {
    header('location: \index.php');
}
$hwidname = $_POST['hwiduser'];
$sql2 = "UPDATE users SET `hwid` = NULL WHERE `name` = '${hwidname}'";
$conn->query($sql2);