<?php
require 'config.php';
$usrname = $_COOKIE["username"];
$pasword = md5($_POST['password']);
$pasuser = $_POST['passuser'];
$conn = mysqli_connect(db_host, db_username, db_password, db_name);
$sql1 = "SELECT * FROM `users` WHERE `name` = '${usrname}'";
$hwid = $conn->query($sql1)->fetch_array();
if($hwid['password'] != $_COOKIE["pass"]) {
header('location: \index.php');
die();
}
$sql2 = "UPDATE `users` SET `password` = '${pasword}' WHERE `name` = '${pasuser}';";
$conn->query($sql2);