<?php
if(isset($_POST["password"]) && isset($_POST["username"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $conn = mysqli_connect("localhost", "root", "root", "123");
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

        <h4>Cheat name</h4>
    <A HREF="index.php">index</A>
    <p>Login: <input type="text" name="username" /></p>
    <p>Password: <input type="password" name="password" /></p>
    <p><input type="submit" value="Log In"/></p>

</form>
<form action="register.php" method="post">
    <input type="submit" value="Register">
</form>
</div>