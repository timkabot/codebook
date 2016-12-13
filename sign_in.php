<?php 
  include 'connect.php';
  include 'session.php';
  $login = $_POST['login'];
  $password = $_POST['password'];
  $res = mysql_query("SELECT * FROM users WHERE login = '$login' AND password = '$password'");
  $row=mysql_fetch_array($res);
  $_SESSION['login'] = $login;
  $_SESSION['name'] = $row['name'];
  $_SESSION['surname'] = $row['surname'];
   if(empty($row['login']) or $login == "" or $password == "")
   {
   	header ('Location: index.php');
   }
   else 
   {
   	header ('Location: main.php?login');
   }
?>