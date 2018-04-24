<?php
include 'core/init.php';
protect_page();

if(empty($_POST) ===false){
        $required_fields = array('current_password','password','password_again'); //we can add more fields if we want to
        foreach($_POST as $key=>$value){                //looping thru all of the submitted data
        if(empty($value) && in_array($key, $required_fields) === true){ 
            $errors[] = 'Fiels marked with asterisk are required';
            break 1;
        }
    }

    if(md5($_POST['current_password']) === $user_data['password']){             //variable user_data taken from init.php where we fetched the users input data
        if(trim(($_POST['password']) !== trim($_POST['password_again']))){
            $errors[] = 'your new passwords do not match';
        }else if (strlen($_POST['password']) < 6){
            $errors[] = 'Your password must be at least 6 characters';
        }
    } else{
        $errors[] = 'Your current Password is incorrect';
    }
        
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
            <div class="form-title"><center>Reset Passsword</center></div>
            
<?php
if(empty($_POST) === false && empty($errors) === true){
    change_password($session_user_id, $_POST['password']);
    header('Location: changepassword.php');
}else if (empty($errors) === false){
    echo output_errors($errors);
}

?>

            <form class="login-form" action="" method = "post">
                <div class="input">
                    <input class="input-field" type="password" name="current_password" placeholder="Current password">
                </div>
                <div class="input">
                    <input class="input-field" type="password" name="password" placeholder="Type new password">
                </div>
                <div class="input">
                    <input class="input-field" type="password" name="password_again" placeholder="Retype password">
                </div>
                <div class="button-wrap">
                    <input class="sign button" type="submit" value="Change password">
                </div>
            </form>
        </div>
    </div>
</body>
</html>