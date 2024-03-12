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
    <title>Online Shop - Register</title>
</head>

<body>
    <?php include('include/nav.php') ?>
    <div class="container">
        <?php include('include/errors.php'); ?>
        <form class="sign" method="post">
            <div class="input-group">
                <label>First name</label>
                <input type="text" name="firstname" placeholder="Enter your first name">
            </div>
            <div class="input-group">
                <label>Last name</label>
                <input type="text" name="lastname" placeholder="Enter your last name">
            </div>
            <div class="input-group">
                <label>User name</label>
                <input type="text" name="username" placeholder="Enter your username">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email">
            </div>
            <div class="input-group">
                <label>Phone number</label>
                <input type="text" name="phone" placeholder="Enter your Phone number">
            </div>
            <div class="input-group">
                <label>Address</label>
                <input type="text" name="address" placeholder="Enter your address">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password">
            </div>
            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm-password" placeholder="Confirm password">
            </div>
            <div class="input-group">
                <button type="submit" name="register" class="btn">Register</button>
            </div>
            <p>Don't have an account? <a href="register.php">Sign up</a></p>
        </form>
    </div>
</body>

</html>