<?php 
include 'session.php'; 
include 'connect.php';
include 'actions.php';
  if(isset($_POST['login']) )
  {
  	$user_from = $_SESSION['login'];
  	$user_to = $_POST['login'];
  	$body = $_POST['body'];
  	mysql_query("INSERT INTO messages (user_from , user_to, msg_body) VALUES ('$user_from','$user_to','$body')"
  		)
  	or die ("MESSAGES INSERTING ERROR");
  	  header('Location: messages.php');
  }
  if(isset($_GET['login']))
  {
  	$user_from = $_SESSION['login'];
  	$user_to = $_GET['login'];
  	$body = $_POST['body'];
  	mysql_query("INSERT INTO messages (user_from , user_to, msg_body) VALUES ('$user_from','$user_to','$body')"
  		)
  	or die ("MESSAGES INSERTING ERROR");
  	$site = "privaty_message.php?login=".$user_to;
  	  header("Location: ".$site);
  }


 ?>