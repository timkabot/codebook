<?php

include 'connect.php';
include 'session.php';
$login = $_POST['login'];
echo $login." ".$_SESSION['login'];
if(empty($login))
{
	header('Location: my_friends.php');
}
$res = mysql_query( "SELECT * FROM users WHERE  login = '$login'");
$row = mysql_fetch_array($res);
$user_login = $_SESSION['login'];
$opened = false;
$deleted = false;
if(!empty($row['login']))
{
	$answer = mysql_query("INSERT INTO friends_requests (user_from, user_to, opened, deleted) VALUES ('$user_login', '$login' , '$opened', '$deleted')")
    or die("FRIENDS REQUEST INSERTING ERROR");
	;
}
 header('Location: my_friends.php');
  ?>