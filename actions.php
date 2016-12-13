<?php 
   function get_image($login)
   {
    include 'connect.php';
   	$query = mysql_query("SELECT * FROM users WHERE login = '$login'");
   	$info = mysql_fetch_array($query);	
   	  if($info['Avatar']!='')
   	  {
   	  	return $info['Avatar'];
   	  }
   	  else { return "img/noavatar.jpg";}
   }

?>
