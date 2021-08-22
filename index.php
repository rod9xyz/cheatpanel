<html>
<link rel="stylesheet" type="text/css" href="style.css">
<div class="main">

    <h1><?php require "config.php"; echo chname; ?></h1>
    <?php if(isset($_COOKIE["pass"])) {
    echo "<a href='main.php'>User CP</a> <br><br>";;
    }
    else {

       echo "<a href='login.php'>Log in</a> | <a href='register.php'>register</a><p>";
    }
    ?>
</div>
</html>