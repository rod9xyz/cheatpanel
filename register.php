<?php
if(isset($_POST["password"]) && isset($_POST["username"])) {
    require 'config.php';
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $secretword = md5($_POST["secretword"]);
    $conn = mysqli_connect(db_host, db_username, db_password, db_name);
    $sql = "INSERT INTO `users` (`id`, `name`, `password`, `secret_word`, `hwid`, `subtill`, `admin`, `banned`, `ban_reason`) VALUES (NULL,'${username}','${password}','${secretword}', NULL, NULL, '0', '0', NULL);";
    $sql2 = "SELECT name FROM users WHERE name = '${username}' ";
    $result = $conn->query($sql2);
    if($result->num_rows > 0) {
        echo "Username must be unique";

    }
    else {
        $conn->query($sql);
        echo $secretword;
    }
}
?>
<link rel="stylesheet" type="text/css" href="style.css">
<div class="main"
<h4><?php require 'config.php'; echo chname; ?></h4>
<br>
<A HREF="index.php">index</A>
<form action="register.php" method="post">
    <p>Login: <input type="text" name="username" required/></p>
    <p>Password: <input type="password" name="password" required/></p>
    <p>Secret word <input type="password" name="secretword" required/></p><p>Warning! Please save your secret word for password reset in the future</p>
    <p><input type="submit" value="Register" /></p>
</form>
<form action="login.php">
    <p><input type="submit" value="Log in" /></p>
</form>
</div>