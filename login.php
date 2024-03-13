<?php
include("server.php");
if (isset($_SESSION['username'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/cosmo/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Online Shop - Login</title>
</head>

<body>
    <?php include('include/nav.php') ?>
    <div class="container">
        <?php include('include/errors.php'); ?>
        <?php include('include/success.php'); ?>
        <form class="sign" method="post">
            <div class="input-group">
                <label>User name</label>
                <input type="text" name="username" placeholder="Enter your username">
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password">
            </div>

            <div class="input-group">
                <button type="submit" name="login" class="btn">Login</button>
            </div>
            <p>Already have an account? <a href="register.php">Sign in</a></p>
        </form>
    </div>
</body>

</html>