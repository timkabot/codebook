<!DOCTYPE html>
<html>
<head>
	<title>Main page</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
	<div class = "col-md-12 joker">
		<form action = "write_message.php" method = "post">
		<div class = "form-group">
		    <label >Login</label>
			<input type = "text" name = "login" ></input>
		</div>
			<div class = "form-group">
			<label> Type your message here</label>
				<textarea class = "form-control" rows = "3" name = "body"></textarea>
			</div>
			<button type="submit" class="btn btn-default">Send</button>
		</form>
	</div>
	</div>
	<div class="col-md-3"></div>
	<div class = "col-md-9 joker">

		<?php 
			$my_login = $_SESSION['login'];
			$my_msg = mysql_query("SELECT * FROM messages WHERE user_to = '$my_login'");
			while($msg = mysql_fetch_array($my_msg))
			{
				?>
				<?php 
				if(isset($msg['msg_body']))
				{ 
					$user_from = $msg['user_from'];
					?>
				<div class = "col-md-12 myborder" style = "align:center; height : 100px;">
					<div class = "col-md-5">
						<img src=<?php echo get_image($user_from); ?> class = "img-circle msg_avatar">
					</div>
					<div class = "col-md-7">
						 <a href="privaty_message.php?login=<?php echo $user_from ?>">
						 	<p class = "myfont">
						  <?php echo $msg['msg_body']; ?>
					     </p>
						 </a>
					</div>
				</div>
				<?php } 
			}
		 ?>
	</div>
</div>
</body>
</html>

