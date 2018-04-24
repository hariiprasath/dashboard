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
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<?php

  
if(empty($_POST) === false){
    $required_fields = array('eventDesc');
    foreach($_POST as $key=>$value){                //looping thru all of the submitted data
        if(empty($value) && in_array($key, $required_fields) === true){ 
            $errors[] = 'Fiels marked with asterisk are required';
            break 1;
        }
    }       

         

}

?>

<body>

    <div id="banner" class="jumbotron fixed-top" style="background-image: url(assets/images/snu.jpg)">
        <div class="overlay"></div>
        <div class="title text-center">Snuphoria</div>
        <p class="text-center">The Music Society</p>
        <div class="new-post-btn text-center" onclick="open_modal()">+</div>
        <div class="overlay"></div>
    </div>
    
    <div style="height: 33%"></div>

    <div id="menu-icon" onclick="open_menu()">
        <div id="menu-bar-1"></div>
        <div id="menu-bar-2"></div>
        <div id="menu-bar-3"></div>
    </div>
    
     <div class="side-menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="">Account</a></li>
            <li><a href="login.html">Log Out</a></li>
        </ul>
        <div class="close-button" onclick="close_menu()"><img src="assets/close.png"></div>
    </div>
    
    <div class="newpost-modal-wrap" id="modal-wrap">
        <div class="newpost-modal">
            <div class="modal-content">
                <div class="modal-header">
                    Make new post
                    <div class="close-button" onclick="close_modal()"><img src="assets/close.png">
                </div>
                </div>

<?php

    if(isset($_GET['success']) && empty($_GET['success'])){
        header('Location: snuphoria.php');
    } else {
        if(empty($_POST) === false && empty($errors) === true){

            
            if (!empty($_FILES["uploadedimage"]["name"])) {

            $target_dir = "club_uploads/snuphoria/";

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
            



            $club_data = array(
                    
                    'eventTitle' => $_POST['eventTitle'],
                    'eventDesc' => $_POST['eventDesc'],
                    'eventTime' => $_POST['eventTime'],
                    'eventLoc' => $_POST['eventLoc'],
                    'imgFile' => $target_path,
                    
                             
                );
            var_dump($club_data);
           
            snuphoria_post($club_data);
            header('Location: snuphoria.php?success'); //here i am sending the get variable success to this page
            exit();

            } else {
            echo output_errors($errors);
            }
        

?>



                <form action="" method = "post" enctype = "multipart/form-data">
                    <div class="input">
<!--                        <label for="eventTitle">Event Title</label>              -->
                        <input type="text" id="eventTitle" name="eventTitle" placeholder="Event Title">
                    </div>
                    <div class="input">
<!--                        <label for="eventDesc">Event Description</label>                        -->
                        <textarea type="text" id="eventDesc" name="eventDesc" placeholder="Describe the event"></textarea>
                    </div>
                    <div class="input">
<!--                        <label for="eventTime">Event Time</label>-->
                        <input type="text" id="eventTime" name="eventTime" placeholder="When is it happening?">
                    </div>
                    <div class="input">
<!--                        <label for="eventLoc">Event Location</label>-->
                        <input type="text" id="eventLoc" name="eventLoc" placeholder="Where is it happening?">
                    </div>
                    <div class="inputFile">
                        <label for="imgFile">
                            <div id="img-upload-btn"><img src="assets/add-img.png"></div>
                            <span id="file-selected"></span>
                            <input type="file" id="imgFile" name="uploadedimage" size="60">
                        </label>
                    </div>
                    <div class="button cab-button">
                        <input class="submit-button" type="submit" value="Submit">
                    </div>
                </form>


<?php
}

?>

            </div>
        </div>
    </div>
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                
<?php

 $result = mysql_query("SELECT * FROM snuphoria ORDER BY post_id DESC;");

while($row = mysql_fetch_array($result))
            {


          echo '<div class="fullcard-wrapper">
                    <div class="fullcard">
                        <div class="fullcard-image">
                            <img src=" ' . $row['imgFile'] . ' ">
                        </div>';
            echo '           <div class="fullcard-content">
                            <div class="fullcard-title">'. $row['eventTitle'] .'</div>
                            <div class="fullcard-desc text-justify">' . $row['eventDesc'] . ' </div>';
                  echo '          <div class="fullcard-time-loc">
                                <div class="fullcard-time">' . $row['eventTime'] . '</div>';
                     echo'           <div class="fullcard-loc">' . $row['eventLoc'] . '</div>
                            </div>
                        </div>
                    </div>';


            }
            ?>


                    <div class="fullcard-posted text-left">posted on 20th May 2018</div>
                </div>
                
                <div class="fullcard-wrapper">
                    <div class="fullcard">
                    
                    </div>
                    <div class="fullcard-posted text-left">posted on 20th May 2018</div>
                </div>
                <div class="fullcard-wrapper">
                    <div class="fullcard">
                    
                    </div>
                    <div class="fullcard-posted text-left">posted on 20th May 2018</div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <svg height="0" width="0">
        <defs>
            <clipPath id="svgPath">
                <path x="0" y="0" fill="#FFFFFF" stroke="#000000" stroke-width="1.5794" stroke-miterlimit="10" d="M775.5,29.5a14,14,0,0,0,14,14v23a14,14,0,0,0,0,28v23a14,14,0,0,0,0,28v18.21a91,91,0,0,0,0,177.58V359.5a14,14,0,0,0,0,28v23a14,14,0,0,0,0,28v23a14,14,0,0,0,0,28v15H.5v-15a14,14,0,0,0,0-28v-23a14,14,0,0,0,0-28v-23a14,14,0,0,0,0-28V341.29a91,91,0,0,0,71-88.79,91,91,0,0,0-71-88.79V145.5a14,14,0,0,0,0-28v-23a14,14,0,0,0,0-28v-23a14,14,0,0,0,0-28V.5h789v15A14,14,0,0,0,775.5,29.5Z"/>
            </clipPath>
        </defs>
    </svg>
    
</body>

<script src="js/Vibrant.js"></script> 
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/main.js"></script> 

</html>