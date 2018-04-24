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
    <link rel="stylesheet" href="css/forum_cabpool.css">
    <link rel="stylesheet" href="css/side-menu.css">
    <link rel="stylesheet" href="css/main_cabpool.css">
</head>

<?php
if(empty($_POST) === false){
    $required_fields = array('cabfrom','cabto','cabwhen','contact');
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
            <div class="head">Cabpool</div>
            <div class="cab-new-post new-post-button" onclick="open_modal()">Make new post</div>
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
    <div class="modal-wrap">
        <div class="modal" id="lfmodal">
            <div class="modal-content">
                <div class="modal-header">Make new post</div>
                <img class="close-button" onclick="close_modal()" src="assets/close.png">
                
<?php

if(isset($_GET['success']) && empty($_GET['success'])){
header('Location: cabpool.php');
} else {
if(empty($_POST) === false && empty($errors) === true){
$cabpool_data = array(
    'cabfrom' => $_POST['cabfrom'],
    'cabto' => $_POST['cabto'],
    'cabwhen' => $_POST['cabwhen'],
    'cabname' => $user_data['first_name'],
    'contact' => $_POST['contact'],
             
);


cabpoolpost($cabpool_data);
header('Location: cabpool.php?success'); //here i am sending the get variable success to this page
exit();

} else {
echo output_errors($errors);
}


?>

                <form action="" method = "post">
                    <div class="input first cab-first">
                        <input class="input-field" type="text" name="cabfrom" placeholder="Where are you going from?">
                    </div>
                    <div class="input">
                        <input class="input-field" type="text" name="cabto" placeholder="Where are you going to?">
                    </div>
                    <div class="input">
                        <input class="input-field" id="txtbox" type="text" name="cabwhen" placeholder="When are you going?">
                    </div>
                    <div class="input">
                        <input class="input-field" type="text" name="contact" placeholder="Your contact number?">
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
    <div class="table-container">

        <?php
    $result = mysql_query("SELECT * FROM cabpool");

    
      echo '<table class="lf-table">
            <tr class="heading">
                
                <th class="cabfrom">What</th>
                <th class="cabto">Where</th>
                <th class="cabwhen">When</th>
                <th class="cabname">Name</th>
                <th class="cabcontact">Contact</th>
                
            </tr>';

            while($row = mysql_fetch_array($result))
            {
                
                echo '<tr class="record">';
                
                echo '<td class="cabfrom">'. $row['cabfrom'] .'</td>';
                echo '<td class="cabto">'. $row['cabto'] .'</td>';
                echo '<td class="cabwhen">'. $row['cabwhen'] .'</td>';
                echo '<td class="cabname">'. $row['cabname'] .'</td>';
                echo '<td class="contact">'. $row['contact'] .'</td>';
                echo "</tr>";

            }
            

            ?>


        
            
        </table>
    </div>
</body>
    
<script src="js/script_cabpool.js"></script>
</html>