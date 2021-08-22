<?php
if(isset($_POST["password"]) && isset($_POST["username"])) {
    require 'config.php';
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $conn = mysqli_connect(db_host, db_username, db_password, db_name);
    $sql1 = "SELECT * FROM `users` WHERE `name` = '${username}' AND password = '${password}'";
    $result = $conn->query($sql1);
    if($result->num_rows == 0) {
        echo "Wrong username or password";
    }
    else {
        setcookie("pass", $password);
        setcookie("username", $username);
        header("location: main.php");
    }
}
?>
<div class = 'main'>
<form action="login.php" method="post">
    <link rel="stylesheet" type="text/css" href="style.css">

        <h4><?php require 'config.php'; echo chname; ?></h4>
    <A HREF="index.php">index</A>
    <p>Login: <input type="text" name="username" required/></p>
    <p>Password: <input type="password" name="password" required/></p>
    <p><input type="submit" value="Log In"/></p>

</form>
<form action="register.php" method="post">
    <input type="submit" value="Register">
</form>
</div>