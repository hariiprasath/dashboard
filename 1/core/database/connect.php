<?php
$connect_error = "Sorry, we are experiencing connection problem";
mysql_connect('localhost','root','');
mysql_select_db('lr') or die($connect_error);

?>