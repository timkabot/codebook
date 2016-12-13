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
$user_to = $_GET['login'];
$my_login = $_SESSION['login'];
?>
<div class = "container col-md-12">
	<div class = "col-md-12" id = "shapka">
		<div class = "col-md-10">
			<p class = "myfont alig-center" style="font-size : 95px;">Social network for simple people</p>
		</div>
		<div class = "col-md-2 myfont">
		<?php echo "Welcome ".$_SESSION['name']." ".$_SESSION['surname']; 
		?>
<br>
        <a href="index.php" class = "myfont">Sign Out</a>
		</div>
	</div>

	<div class = "col-md-4 menu my_background">
		<ul>
			<li><a href="some_user.php?login=<?php echo $_SESSION['login']?>">Home</a></li>
			<li><a href="my_friends.php">Friends</a></li>
			<li><a href="users.php">Users</a></li>
			<li><a href="messages.php">Messages</a></li>
			<li><a href="main.php">About</a></li>
			<li><a href="">My settings</a></li>
		</ul>
	</div>
	<div class = "myborder col-md-8">
	<div class = "col-md-12 joker">
		<form action = "write_message.php?login=<?php echo $user_to ?>" method = "post">
			<div class = "form-group">
			<label> Type your message here</label>
				<textarea class = "form-control" rows = "3" name = "body"></textarea>
			</div>
			<button type="submit" class="btn btn-default">Send</button>
		</form>
	</div>
	</div>
	<div class = "col-md-12 ">
		<?php 
		   $moi  = mysql_query("SELECT * FROM messages WHERE user_from = '$my_login'");
		   while($mine = mysql_fetch_array($moi))
		   {
		   	echo $mine['msg_body']."\n";
		   }
		    $ego  = mysql_query("SELECT * FROM messages WHERE user_from = '$user_to'");
		   while($mine = mysql_fetch_array($ego))
		   {
		   	echo $mine['msg_body'];
		   }
 		 ?>
	</div>
</div>
</body>
</html>
