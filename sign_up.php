<?php 
  include 'session.php' ;
  include 'connect.php'; 
  include 'actions.php';
  $login = $_POST['login'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $res = mysql_query("SELECT * FROM users WHERE login = '$login'");
  $row = mysql_fetch_array($res);
  $array = serialize(array());
  $pic_name = $login."_image.jpg";
  $full_url = "img/".$pic_name;

   if(!empty($row['login']) or ($login=="" or $password=="" or $name=="" or $surname==""))
   {
   	header ('Location: index.php');
   }
   else 
   	{
      if(is_uploaded_file($_FILES['img']['tmp_name']))
      {
        move_uploaded_file($_FILES['img']['tmp_name'],$full_url);
       }
       else 
       {
        $full_url = "img/noavatar.jpg";
       }
   		mysql_query("INSERT INTO users (login,password,name,surname,friends,Avatar) VALUES ('$login','$password','$name','$surname','$array','$full_url')") or 
        die ("INSERT_ERROR");
        
        header('Location: index.php');
    }
?>