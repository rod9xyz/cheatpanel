<?php
if(!isset($_COOKIE["username"]  )) {
    header("location: index.php");
    die();
}
$usrname = $_COOKIE["username"];
$conn = mysqli_connect("localhost", "root", "root", "123");
$sql1 = "SELECT * FROM `users` WHERE `name` = '${usrname}'";
$conn = mysqli_connect("localhost", "root", "root", "123");
$sql1 = "SELECT * FROM `users` WHERE `name` = '${usrname}'";
$hwid = $conn->query($sql1)->fetch_array();
if($hwid['password'] != $_COOKIE["pass"]) {
    header('location: \panel\index.php');
    die();
}
?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>panel</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="main">
        <h2>welcome, <?php echo $_COOKIE["username"]?></h2>
        <h4><?php
            if($hwid['banned'] == '1') {
                echo "Your account has been banned for the following reason: ", $hwid["ban_reason"];
                die();
            }
            if($hwid['subtill'] == "")
            {
                echo "No subscribtion";
            }
            else {
            echo "Subscribed till: ", $hwid['subtill'];
            }
            ?>
            <form action="logout.php">
                <p><input type="submit" value="Log out"></p>
            </form>

    </div>
<?php if($hwid['subtill'] == "")
    {
        die();
    }   ?>
    <div class="main">

        <form action="resethwid.php" method="post">
            <p><?php echo "HWID: ",$hwid['hwid']?></p>
            <p><input type="submit" value="Reset HWID"></p>
        </form>
    </div>
    <div class="main">
        <p>Change log</p>
        <textarea name="text" rows="12" cols="41">
        <?php echo file_get_contents('update.txt');?>
        </textarea>
    </div>
</body>