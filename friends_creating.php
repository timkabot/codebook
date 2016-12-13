<?php 
 include 'session.php'; 
 include 'connect.php';
 include 'actions.php';
 $zapros = mysql_query("SELECT * FROM users WHERE name LIKE '%".$_POST['search']."%'") or die ("logushki");
 $output = '';
 while($res = mysql_fetch_array($zapros))
 {
 	//echo $res['name'];
 	$output.='<div class = "col-md-12 ">';
 	$output.='<div class = "col-md-4">';
 	$output.='<img src="';
 	$opa = get_image($res['login']); 
 	$output.=$opa;
 	$output.='" class = "img-circle avatars">	</div>';
 	$output.='<div class = "col-md-8">';
 	$login = $res['login'];
 	$output.= '<a href="some_user.php?login=';
 	$output.= $login;
 	$output.='?>" class = "about_friends"> Login : '.$login.'</a>';
 	$output.='<p class = "about_friends"> Name :'.$res['name'].'</p>';
 	$output.='<p class = "about_friends"> Surname :'.$res['surname'].'</p>';
 	$output.='<a href="privaty_message.php?login='.$res['login'].'">Privaty messages</a></li></div></div>';
 }
 echo $output;
 ?>
 <!-- /*<div class = "col-md-8">
						    <a href="some_user.php?login=<?php echo $array[$i] ?>" class = "about_friends"> Login : <?php echo $array[$i]; ?></a>
							<p class = "about_friends"> Name : <?php echo $name; ?></p>
							<p class = "about_friends"> Surname : <?php echo $surname; ?></p>
							<a href="privaty_message.php?login=<?php echo $array[$i] ?>">Privaty messages</a></li>
							</div> -->