<?php
if(isset($_POST["password"]) && isset($_POST["username"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $conn = mysqli_connect("localhost", "root", "root", "123");
    $sql = "INSERT INTO `users` (`id`, `name`, `password`, hwid, subtill, admin ) VALUES (NULL, '${username}', '${password}', NULL, NULL, '0');";
 //   $sql2 = "SELECT name FROM users WHERE name = '${username}' ";
  //  $result = $conn->query($sql2);
    //if($result->num_rows > 0) {
    //    echo "Username must be unique";

   // }
   // else {
        $conn->query($sql);
        echo "done";
   // }
}
?>
<link rel="stylesheet" type="text/css" href="style.css">
<div class="main"
<h4>Cheat name</h4>
<A HREF="index.php">index</A>
<form action="register.php" method="post">
    <p>Login: <input type="text" name="username" /></p>
    <p>Password: <input type="password" name="password" /></p>
    <p><input type="submit" value="Register" /></p>
</form>
<form action="login.php">
    <p><input type="submit" value="Log in" /></p>
</form>
</div>