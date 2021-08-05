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
if($hwid['admin'] != '1') {
    header("location: \panel\index.php");
    die();
}
?>
<html>
<link rel="stylesheet" type="text/css" href="../style.css">
<div class="main">
    <p>Ban user</p>
    <form action="ban.php" method="post">
        <p>Username <input type="text" name="banuser"/></p>
        <p>Reason <input type="text" name="banreason"/></p>
        <input type="submit" value="Ban"/>

    </form>
</div>
<div class="main">
    <p>Set subscribtion</p>
    <form action="setsub.php" method="post">
        <p>Username <input type="text" name="subuser"/></p>
        <p>End date <input type="date" name="subtime"/></p>
        <input type="submit" value="Set"/>

    </form>
</div>
</html>
