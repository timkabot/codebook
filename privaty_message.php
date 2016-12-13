<!DOCTYPE html>
<html>
<head>
	<title>Main page</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'session.php'; 
include 'connect.php';
include 'actions.php';?>
<div class = "container col-md-12">
	<div class = "col-md-12" id = "shapka">
		<div class = "col-md-10">
			<p class = "myfont alig-center" style="font-size : 95px;">Social network for simple people</p>
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
	<div class = "col-md-9 my_background alig-center" style = "height : 80px;"><a href="" style = "font-size:60px;">My messages</a></div>
	<div class = "myborder col-md-9">
	<?php 
	   if(isset($_GET['login'])) {$that_login = $_GET['login'];}
	   $my_login = $_SESSION['login'];
	   $my_msg = mysql_query("SELECT * FROM messages where user_from = '$my_login' and user_to = '$that_login'");
	   $his_msg = mysql_query("SELECT * FROM messages where user_from = '$that_login' and user_to = '$my_login'");
	?>
	<div class = "col-md-6 myborder">
		<?php 
		while($msg = mysql_fetch_array($my_msg))
		{
		 ?>
		 <div class = "col-md-12"> <p class = "myfont"><?php echo $my_login." says :".$msg['msg_body'] ?></p></div>
		<?php  }?>
	</div>
	<div class = "col-md-6 myborder">
		<?php 
		while($msg = mysql_fetch_array($his_msg))
		{

		 ?>
		 <div class = "col-md-12"> <p class = "myfont"><?php echo $that_login." says :".$msg['msg_body'] ?></p></div>
		<?php  }?>
	</div>
	<div class = "col-md-12 joker">
		<form action = "write_message.php?login=<?php echo $that_login ?>" method = "post">
			<div class = "form-group">
			<label> Type your message here</label>
				<textarea class = "form-control" rows = "3" name = "body"></textarea>
			</div>
			<button type="submit" class="btn btn-default">Send</button>
		</form>
	</div>
	</div>
</div>
</body>
</html>

