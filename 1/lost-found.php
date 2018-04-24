<?php
include 'core/init.php';
protect_page();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dash</title>
    <link rel="icon" href="assets/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,800" rel="stylesheet">
    <link rel="stylesheet" href="css/forum.css">
    <link rel="stylesheet" href="css/main_lnf.css">
</head>
<?php
if(empty($_POST) === false){
    $required_fields = array('lfwhat','lfwhere','lfwhen','contact');
    foreach($_POST as $key=>$value){                //looping thru all of the submitted data
        if(empty($value) && in_array($key, $required_fields) === true){ 
            $errors[] = 'Fiels marked with asterisk are required';
            break 1;
        }
    }       

         

}

?>
<body>
    <header>
        <div class="header-wrap">
            <div class="head">Lost & Found</div>
            <div class="new-post-button" onclick="open_modal()">Make new post</div>
            <div class="menu-button" onclick="open_menu()"><img src="assets/menu.png"></div>
        </div>
    </header>
    <div class="side-menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="changepassword.php">Change Password</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
        <div class="close-button" onclick="close_menu()"><img src="assets/close.png"></div>
    </div>
    <div class="newpost-modal-wrap">
        <div class="modal" id="lfmodal">
            <div class="modal-content">
                <div class="modal-header">Make new post</div>
                <img class="close-button" onclick="close_modal()" src="assets/close.png">
                

<?php

    if(isset($_GET['success']) && empty($_GET['success'])){
        header('Location: lost-found.php');
    } else {
        if(empty($_POST) === false && empty($errors) === true){

if (!empty($_FILES["uploadedimage"]["name"])) {

            $target_dir = "lost-found-uploads/";

            $target_path = $target_dir . date("d-m-Y")."-".time(). basename($_FILES["uploadedimage"]["name"]);   
                    
                   
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_path,PATHINFO_EXTENSION));

                $check = getimagesize($_FILES["uploadedimage"]["tmp_name"]);
                if($check !== false) {  
                   
                   if (file_exists($target_path)) {
                        $errors[] = 'Sorry, file already exists.';
                        $uploadOk = 0;
                        break 1;
                    }
                    if ($_FILES["uploadedimage"]["size"] > 2000000) {
                        $errors[] = 'Sorry, Image should be less than 2mb.';
                        $uploadOk = 0;
                        break 1;
                    }
                    if($imageFileType != "jpg" && $imageFileType != "jpeg" ) {                        
                        $errors[] = 'Sorry, only JPG, JPEG files are allowed.';
                        $uploadOk = 0;
                        break 1;
                    }
               
                    move_uploaded_file($_FILES["uploadedimage"]["tmp_name"], $target_path);
                    echo "The file ". basename( $_FILES["uploadedimage"]["name"]). " has been uploaded.";

                    $uploadOk = 1;
                } else {
                    $errors[] = 'File is not an image.';
                    $uploadOk = 0;
                    break 1;
                    
                }
                   
                
}   
            



            $lnf_data = array(
                    'lost-found' => $_POST['lost-found'],
                    'lfwhat' => $_POST['lfwhat'],
                    'lfwhere' => $_POST['lfwhere'],
                    'lfwhen' => $_POST['lfwhen'],
                    'image' => $target_path,
                    'lfname' => $user_data['first_name'],
                    'contact' => $_POST['contact'],
                             
                );
            

            lnfpost($lnf_data);
            header('Location: lost-found.php?success'); //here i am sending the get variable success to this page
            exit();

            } else {
            echo output_errors($errors);
            }
        

?>

                <form action="" method = "post" enctype = "multipart/form-data">
                    <div class="radio first">

                        <input type="radio" name="lost-found" value="LOST" checked><span class="radio-text">Lost</span>
                        <input type="radio" name="lost-found" value="FOUND"><span class="radio-text">Found</span>
                    </div>
                    <div class="input">
                        <input class="input-field" type="text" name="lfwhat" placeholder="What did you lose?*">
                    </div>
                    <div class="input">
                        <input class="input-field" type="text" name="lfwhere" placeholder="Where did you lose it?">
                    </div>
                    <div class="input">
                        <input class="input-field" id="txtbox" type="text" name="lfwhen" placeholder="When did you lose it?*">
                    </div>
                    <div class="input">
                        <input class="input-field" type="text" name="contact" placeholder="Your contact number?*">
                    </div>
                    <div class="input">
                        <input class="input-field" type="file" name="uploadedimage" placeholder="Upload">
                    </div>
                    <div class="button">
                        <input class="submit-button" type="submit" value="Submit">
                    </div>
                </form>
<?php
}

?>

            </div>
        </div>
    </div>
    <div class="image-modal-wrap">
    	<div class="image-modal">
    		<img id="image-in-modal" src="">
    	</div>
    </div>
    <div class="table-container">

<?php

 $result = mysql_query("SELECT * FROM lnf");

    
      echo '<table class="lf-table">
            <tr class="heading">
                <th class="l-or-f">Lost/Found</th>
                <th class="lfwhat">What</th>
                <th class="lfwhere">Where</th>
                <th class="lfwhen">When</th>
                <th class="lfimage">Image</th>
                <th class="lfname">Name</th>
                <th class="lfcontact">Contact</th>
            </tr>';

            while($row = mysql_fetch_array($result))
            {
                
                echo '<tr class="record">';
                echo '<td class="l-or-f">'. $row['lost-found'] .'</td>';
                echo '<td class="lfwhat">'. $row['lfwhat'] .'</td>';
                echo '<td class="lfwhere">'. $row['lfwhere'] .'</td>';
                echo '<td class="lfwhen">'. $row['lfwhen'] .'</td>';
                
               echo '<td class="lfimage">  <img class="image-icon" src="assets/image.png" alt=" ' . $row['image'] . ' " onclick="open_image_modal(this)"></td>';



               
              


                
                echo '<td class="lfname">'. $row['lfname'] .'</td>';
                echo '<td class="lfcontact">'. $row['contact'] .'</td>';
                echo "</tr>";

            }
            

            ?>

        
        </table>
    </div>
</body>
   
 <script src="js/jquery.min.js"></script>
<script src="js/script_lnf.js"></script>
</html>