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
    <link rel="stylesheet" href="css/main_index.css">
</head>
<body>
    <header>
        <div class="header-wrap">
            <div class="head">Hello, <?php echo $user_data['first_name']; ?>!</div>
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
    <div class="grid-container">
        <div class="grids">
            <div class="forum-col">
                <div class="column-title">FORUMS</div>
                <div class="card forum-card fcard1 lost">
                    <div class="card-title">Lost & Found</div>
                    <table class="card-table">
                        <tr class="table-heading">
                            <th class="card-lf card-th">LOST/FOUND</th>
                            <th class="card-lfwhat card-th">What</th>
                            <th class="card-lfwhen card-th">When</th>
                        </tr>
                        <tr>
                            <td class="card-lf card-td">Lost</td>
                            <td class="card-lfwhat card-td">Seagate 2 TB hard disk</td>
                            <td class="card-lfwhen card-td">20 Feb 9:30 PM</td>
                        </tr>
                        <tr>
                            <td class="card-lf card-td">lost</td>
                            <td class="card-lfwhat card-td">Black Senheisser earphones w...</td>
                            <td class="card-lfwhen card-td">18 Feb 5:00 PM</td>
                        </tr>
                        <tr>
                            <td class="card-lf card-td">FOUND</td>
                            <td class="card-lfwhat card-td">DH 2 Card</td>
                            <td class="card-lfwhen card-td">18 Feb 2:45 PM</td>
                        </tr>
                        <tr>
                            <td class="card-lf card-td">Lost</td>
                            <td class="card-lfwhat card-td">HTC M One X Grey</td>
                            <td class="card-lfwhen card-td">18 Feb 2:45 PM</td>
                        </tr>
                    </table>
                    <a href="lost-found.php"><img class="forum-arrow" src="assets/arrow.png"></a>
                </div>
                <div class="card forum-card fcard2 cab">
                    <div class="card-title">Cabpool</div>
                    <table class="card-table">
                        <tr class="table-heading">
                            <th class="card-cabfrom card-th">From</th>
                            <th class="card-cabto card-th">To</th>
                            <th class="card-cabwhen card-th">When</th>
                        </tr>
                        <tr>
                            <td class="card-cabfrom card-td">SNU</td>
                            <td class="card-cabto card-td">Noida Sector 18</td>
                            <td class="card-cabwhen card-td">20 Feb 9:30 PM</td>
                        </tr>
                        <tr>
                            <td class="card-cabfrom card-td">Noida City Centre</td>
                            <td class="card-cabto card-td">SNU</td>
                            <td class="card-cabwhen card-td">18 Feb 5:00 PM</td>
                        </tr>
                        <tr>
                            <td class="card-cabfrom card-td">SNU</td>
                            <td class="card-cabto card-td">IGI Airport T3</td>
                            <td class="card-cabwhen card-td">18 Feb 2:45 PM</td>
                        </tr>
                        <tr>
                            <td class="card-cabfrom card-td">SNU</td>
                            <td class="card-cabto card-td">Greater Noida</td>
                            <td class="card-cabwhen card-td">18 Feb 2:45 PM</td>
                        </tr>
                    </table>
                    <a href="cabpool.php"><img class="forum-arrow" src="assets/arrow.png"></a>
                </div>
            </div>
            <div class="trend-col">
                <div class="column-title">TRENDING</div>
                <div class="card event-card tcard1">
                    <div class="card-title">Beatles Night</div>
                    <div class="card-content">26th Feb 6:30PM<br>Open Stage</div>
                </div>
                <div class="card event-card tcard2">
                    <div class="card-title">Beatles Night</div>
                    <div class="card-content">26th Feb 6:30PM<br>Open Stage</div>
                </div>
                <div class="card event-card tcard3">
                    <div class="card-title">Beatles Night</div>
                    <div class="card-content">26th Feb 6:30PM<br>Open Stage</div>
                </div>
            </div>
            <div class="trend-col">
<!--                <div class="column-title">SCREENING</div>-->
                <div class="card movie-card">
                    <div class="card-title">Beatles Night</div>
                    <div class="card-content">26th Feb 6:30PM<br>Open Stage</div>
                </div>
                <div class="card event-card tcard3">
                    <div class="card-title">Beatles Night</div>
                    <div class="card-content">26th Feb 6:30PM<br>Open Stage</div>
                </div>
            </div>
            <div class="subs-col">
                <div class="column-title">SUBSCRIBED</div>
                <div class="card event-card scard1">
                    <div class="card-title">Beatles Night</div>
                    <div class="card-content">26th Feb 6:30PM<br>Open Stage</div>
                </div>
                <div class="card event-card scard2">
                    <div class="card-title">Beatles Night</div>
                    <div class="card-content">26th Feb 6:30PM<br>Open Stage</div>
                </div>
                <div class="card event-card scard3">
                    <div class="card-title">Beatles Night</div>
                    <div class="card-content">26th Feb 6:30PM<br>Open Stage</div>
                </div>
            </div>
        </div>
    </div>
</body>
    
<script src="js/script_index.js"></script>
</html>