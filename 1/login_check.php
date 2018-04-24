<?php
include 'core/init.php';
logged_in_redirect();

if(empty($_POST) === false) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) === true || empty($password) === true) {
        $errors[] = 'you need to enter a username and password';
    } else if (user_exists($username) === false) {
        $errors[] = 'We can\'t find that username. Have you registered?';
    } else if(user_active($username) === false) {
        $errors[] = 'You have not activated your account! ';
    } else {

        if(strlen($password) > 32){
            $errors[] = 'password too long';
        }

        $login = login($username, $password);
        if($login === false) {
            $errors[] = 'That username/ password combination is incorrect';
        } else {
            //if username and password match then set user sesion 
            $_SESSION['user_id'] = $login; //its queal to user because login returns the user id
            header('Location: index.php');
            exit();
        }
        
    }
} else {
    $errors[] = 'No data received';
}

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


<?php

if(empty($errors) === false) {
?>                                              
     We tried to log you in , but... 

<?php
    echo output_errors($errors);
}

?>


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