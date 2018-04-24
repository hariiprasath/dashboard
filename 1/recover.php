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
            <div class="form-title"><center>Recover</center></div>

<?php
if(isset($_GET['success']) === true && empty($_GET['success']) === true){
?>
    <p align="center">Thanks, We have e-mailed you</p>
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

<?php   

} else{

    $mode_allowed = array('username', 'password');
    if(isset($_GET['mode']) === true && in_array($_GET['mode'], $mode_allowed)){
        if(isset($_POST['email']) === true && empty($_POST['email']) === false){
            if(email_exists($_POST['email']) === true) {
                recover($_GET['mode'], $_POST['email']);
                header('Location: recover.php?success');
                exit();
            } else {
                echo '<p>Oops, we could not find that email address!</p>';
            }
        }

    ?>




            <form class="login-form" action = "" method = "post">
                <div class="input">
                    <input class="input-field" type="text" name="email" placeholder="email">
                </div>
                <div class="button-wrap">
                    <input class="recover button" type="submit" value="Recover">
                </div>
            </form>


<?php

    } else {
        header('Location: login.php');
        exit();
    }
}     
?>
            

            <div class="signup-signin">
                <center>Do you know your password? <a href="login.html">Sign in</a></center>
              
                <center>Don't have an account? <a href="register.html">Sign up</a></center>
            
            </div>

        </div>
    </div>
</body>
</html>