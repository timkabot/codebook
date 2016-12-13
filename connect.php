<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";
$connection = mysql_connect($servername, $username, $password) or die("Connection_error");
mysql_select_db($dbname) or die("cannot select DB");
?> 