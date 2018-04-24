<?php
include 'core/init.php';
logged_in_redirect();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dash</title>
    <link rel="icon" href="assets/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,600,800" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-wrap">
        <div class="login-container">
            <div class="form-title"><center>Welcome</center></div>
            <form class="login-form" action="login_check.php" method="post">
                <div class="input">
                    <input class="input-field" type="text" name="username" placeholder="username">
                </div>
                <div class="input">
                    <input class="input-field" type="password" name="password" placeholder="Password">
                </div>
                <div class="button-wrap">
                    <input class="sign button" type="submit" value="Log In">
                </div>
            </form>
            <div class="forgot">
                <center>Forgot <a href="recover.php?mode=username">username</a> or <a href="recover.php?mode=password">password</a> ?</center>
            </div>
            <div class="signup-signin">
                <center>Don't have an account? <a href="register.php">Sign up</a></center>
            </div>
        </div>
    </div>
</body>
</html>