<?php
if(isset($_POST["password"]) && isset($_POST["username"])) {
    require 'config.php';
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $secretword = md5($_POST["secretword"]);
    $conn = mysqli_connect(db_host, db_username, db_password, db_name);
    $sql1 = "UPDATE `users` SET `password` = '${password}' WHERE `name` = '${username}';";
    $sql2 = "SELECT * FROM `users` WHERE `name` = '${username}';";
    $check = $conn->query($sql2)->fetch_array();
    if($check['secret_word'] != $secretword) {
        echo 'bad secret word';
        die();
    }
    else {
        $conn->query($sql1);
    }

}
?>
<link rel="stylesheet" type="text/css" href="style.css">
<div class="main"
<h4><?php require 'config.php'; echo chname; ?></h4>
<br>
<A HREF="index.php">index</A>
<form action="reset_password.php" method="post">
    <p>Login: <input type="text" name="username" required/></p>
    <p>New password: <input type="password" name="password" required/></p>
    <p>Secret word <input type="password" name="secretword" required/></p>
    <p><input type="submit" value="Reset" /></p>
</form>
<form action="login.php">
    <p><input type="submit" value="Log in" /></p>
</form>
</div>