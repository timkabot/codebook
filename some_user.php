<?php 
 include 'session.php'; 
 include 'connect.php';
 include 'actions.php';
   if(isset($_GET['login']))
 {
 	$login = $_GET['login'];
 	$information = mysql_query("SELECT * FROM users WHERE login = '$login'");
 	$info = mysql_fetch_array($information);
 	$name = $info['name'];
 	$surname = $info['surname'];
 }
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Main page</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class = "container col-md-12">
	<div class = "col-md-12" id = "shapka">
		<div class = "col-md-10">
			<p class = "myfont alig-center" style="font-size : 95px;">Social network for simple people </p>
		</div>
		<div class = "col-md-2 myfont">
		<?php echo "Welcome ".$_SESSION['name'].$_SESSION['surname']; 
		?>
<br>
        <a href="index.php" class = "myfont">Sign Out</a>
		</div>
	</div>
	<div class = "col-md-3  my_background" name = "main_menu">
		<ul>
			<li><a href="some_user.php?login=<?php echo $_SESSION['login']?>">My profile</a></li>
			<li><a href="my_friends.php">Friends</a></li>
			<li><a href="users.php">Users</a></li>
			<li><a href="messages.php">Messages</a></li>
			<li><a href="main.php">About</a></li>
			<li><a href="">My settings</a></li>
		</ul>
	</div>
	<div class = "col-md-9 my_background alig-center" style = "height : 80px;"><a href="" style = "font-size:60px;">Profile</a></div>
	<div class = "myborder col-md-9">
	<div class = "col-md-12 joker user_page">
	<img src=<?php echo get_image($login); ?> class = "img-circle main_avatar">
	</div>
	<div class = "col-md-12 joker user_page">
	<p class = "about_friends"> Login : <?php echo $login; ?></p>
	<p class = "about_friends"> Name : <?php echo $name; ?></p>
	<p class = "about_friends"> Surname : <?php echo $surname; ?></p>
	</div>
	</div>
</div>
</body>
</html>

