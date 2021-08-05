<?php
if(!isset($_COOKIE["username"]  )) {
    header("location: \panel\index.php");
    die();
}
$usrname = $_COOKIE["username"];
$conn = mysqli_connect("localhost", "root", "root", "123");
$sql1 = "SELECT * FROM `users` WHERE `name` = '${usrname}'";
$hwid = $conn->query($sql1)->fetch_array();
if($hwid['password'] != $_COOKIE["pass"]) {
    header('location: \panel\index.php');
    die();
}
$sql2 = "UPDATE `users` SET hwid = NULL WHERE name = '${usrname}'";
$conn->query($sql2);
echo "reset";