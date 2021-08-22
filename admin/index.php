<?php
require 'config.php';
if(!isset($_COOKIE["username"]  )) {
    header("location: index.php");
    die();
}
$usrname = $_COOKIE["username"];
$conn = mysqli_connect(db_host, db_username, db_password, db_name);
$sql1 = "SELECT * FROM `users` WHERE `name` = '${usrname}'";
$hwid = $conn->query($sql1)->fetch_array();
if($hwid['password'] != $_COOKIE["pass"]) {
    header('location: index.php');
    die();
}
if($hwid['admin'] != '1') {
    header("location: \index.php");
    die();
}
?>
<html>
<link rel="stylesheet" type="text/css" href="../style.css">
<div class="main">
    <br><br><a href="users.php">Users list</a><br><br>
</div>

<div class="main">
    <p>Ban user</p>
    <form action="ban.php" method="post">
        <p>Username <input type="text" name="banuser"/></p>
        <p>Reason <input type="text" name="banreason"/></p>
        <input type="submit" value="Ban"/>

    </form>
</div>
<div class="main">
    <p>Set subscription</p>
    <form action="setsub.php" method="post">
        <p>Username <input type="text" name="subuser"/></p>
        <p>End date <input type="date" name="subtime"/></p>
        <input type="submit" value="Set"/>

    </form>
</div>
<div class="main">
    <p>Reset HWID</p>
    <form action="hwid.php" method="post">
        <p>Username <input type="text" name="hwiduser"/></p>
        <input type="submit" value="Reset"/>

    </form>
</div>
<div class="main">
    <p>Reset Password</p>
    <form action="resetpass.php" method="post">
        <p>Username <input type="text" name="passuser"/></p>
        <p>Password <input type="text" name="password"/></p>
        <input type="submit" value="Reset"/>

    </form>
</div>
</html>
