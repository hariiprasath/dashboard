<?php
include 'core/init.php';
logged_in_redirect(); //function call to make sure user dont access this page if already logged in 
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


<?php

if(empty($_POST) === false){
    $required_fields = array('username','password','password_again','first_name','email');
    foreach($_POST as $key=>$value){                //looping thru all of the submitted data
        if(empty($value) && in_array($key, $required_fields) === true){ 
            $errors[] = 'Fiels marked with asterisk are required';
            break 1;
        }
    }       

    if(empty($errors) === true) {
        if(user_exists($_POST['username']) === true){
            $errors[] = 'Sorry, The username \'' . $_POST['username'] . '\' is already taken.';
        }
        if(preg_match("/\\s/", $_POST['username']) == true){            //regular expression match 

            $errors[] = 'Username must not contain any spaces';
        }
        if(strlen($_POST['password']) < 6){
            $errors[] = 'Your password must be atleast 6 characters long';
        }       
        if($_POST['password'] != $_POST['password_again']){
            $errors[] = 'Your passwords do not match';
        }
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = 'A valid email address is required';
        }
        if(email_exists($_POST['email']) === true){
            $errors[] = 'Sorry, The email \'' . $_POST['email'] . '\' is already in use.';
        }
        if(email_snu($_POST['email']) === false){
            $errors[] = 'Sorry, We accept registerations from Shiv Nadar University.';
        }

        

    }       

}


?>



<body>
    <div class="login-wrap">
        <div class="login-container">
            <div class="form-title" style="margin-bottom: 12%;"><center>Sign up</center></div>
            
<?php

    if(isset($_GET['success']) && empty($_GET['success'])){
        echo 'You have been registerd successfully! Please check your email to activate your account.';
    } else {
        if(empty($_POST) === false && empty($errors) === true){
            $register_data = array(
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'first_name' => $_POST['first_name'],
                    'last_name' => $_POST['last_name'],
                    'email' => $_POST['email'],
                    'email_code' => md5($_POST['username'] + microtime())           //activation code for sending to mail id follow up to the user.php register_user function
                );

            register_user($register_data);
            header('Location: register.php?success'); //here i am sending the get variable success to this page
            exit();

            } else {
            echo output_errors($errors);
            }
        

?>

            <form class="login-form" action="" method = "post">

                <div class="input">
                    <input class="input-field" type="text" name="username" placeholder="username">
                </div>

                <div class="input">
                    <input class="input-field" type="password" name="password" placeholder="password">
                </div>

                <div class="input">
                    <input class="input-field" type="password" name="password_again" placeholder="password_again">
                </div>

                <div class="input">
                    <input class="input-field" type="text" name="name" placeholder="first_name">
                </div>

                <div class="input">
                    <input class="input-field" type="text" name="name" placeholder="last_name">
                </div>
                
                <div class="input">
                    <input class="input-field" type="text" name="email" placeholder="email">
                </div>                

                <div class="button-wrap">
                    <input class="register button" onclick="location.href='message.html';" type="submit" value="Register">
                </div>

            </form>

<?php
}

?>



            <div class="signup-signin">
                <center>Already have an account? <a href="login.php">Sign in</a></center>
            </div>
        </div>
    </div>
</body>
</html>