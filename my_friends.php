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
	<div class = "col-md-9 my_background alig-center" style = "height : 80px;"><a href="" style = "font-size:60px;">My friends</a></div>
	<div class = "myborder col-md-6">
		<?php 
			$my_login = $_SESSION['login'];
		$strin = mysql_query("SELECT * FROM users where login = '$my_login'") or die("LOH");
						$string = mysql_fetch_array($strin);
						$string3 = $string['friends'];
						$array = unserialize($string3);
						for ( $i=0;$i<count($array);$i++)
						{
							$frien = mysql_query("SELECT * FROM users WHERE login = '$array[$i]'");
							$friend = mysql_fetch_array($frien);
							$name = $friend['name'];
							$surname = $friend['surname'];
							?>
							<div class = "col-md-12">
							<div class = "col-md-4"><img src=<?php echo get_image($array[$i]); ?> class = "img-circle avatars">	</div>
							<div class = "col-md-8">
						    <a href="some_user.php?login=<?php echo $array[$i] ?>" class = "about_friends"> Login : <?php echo $array[$i]; ?></a>
							<p class = "about_friends"> Name : <?php echo $name; ?></p>
							<p class = "about_friends"> Surname : <?php echo $surname; ?></p>
							<a href="privaty_message.php?login=<?php echo $array[$i] ?>">Privaty messages</a></li>
							</div>
							</div>
							<?php  
						}
		 ?>
	</div>
	<div class = "col-md-3 form-inline">
		<form action = "add_friend.php" method = "post">
			<input type = "login" name = "login" placeholder="TYPE LOGIN" class = "form-control" id = "add_friend_input"></input>
			<button type = "submit" class = "btn btn-default btn-primary" style = "width : 29%; height:45px;">ADD </button>
		</form>
		<div class = "col-md-12 myborder" >
			<p style = "width : 100%;" class = "myfont">Friends requests</p>
			<?php 
			$user_to = $my_login;
			$friends_request = mysql_query("SELECT * FROM friends_requests WHERE user_to = '$my_login'")
			;	
			if($friends_request == null)
			{
				echo "No requests for now";
			}
			else
			{
                $rows = mysql_fetch_array($friends_request);
				while($rows != null)
				{
					$rows['opened'] = true;
					echo nl2br($rows['user_from']." wants to add you as friend \n");
					$user_from = $rows['user_from'];
					
					$rows = mysql_fetch_array($friends_request);
					if(isset($_POST['ignorerequest'.$user_from]))
					{
						$ignore_request = mysql_query("DELETE FROM friends_requests WHERE user_to ='$user_to' AND user_from = '$user_from'");
						header("Location: my_friends.php");
						 
					}
					if(isset($_POST['acceptrequest'.$user_from]))
					{
						$strin = mysql_query("SELECT * FROM users where login = '$my_login'") or die("LOH");
						$string = mysql_fetch_array($strin);
						$string3 = $string['friends'];
						$array = unserialize($string3);
						array_push($array,$user_from);
						$string2 = serialize($array);
						mysql_query("UPDATE users SET friends = '$string2' where login = '$my_login'") or die("LOH2");
						mysql_query("DELETE FROM friends_requests WHERE user_to ='$user_to' AND user_from = '$user_from'");
						header("Location: my_friends.php");
					}

			 ?>
			 <form action="my_friends.php" method="POST">
              <input type="submit" name="acceptrequest<?php echo $user_from; ?>" value="Accept Request">
              <input type="submit" name="ignorerequest<?php echo $user_from; ?>" value="Ignore Request">
             </form>
             <?php 
             	}
                }
              ?>
		</div>
	</div>
</div>
</body>
</html>

