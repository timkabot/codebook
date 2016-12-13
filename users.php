<!DOCTYPE html>
<html>
<head>
	<title>Main page</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="myJSfile.js"></script>
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
	<div class = "col-md-9 my_background alig-center" style = "height : 80px;"><a href="" style = "font-size:60px;">Users</a></div>
	<div class = "myborder col-md-6">
	<div class = "col-md-6 form-group" style = "height : 100px;">
		<div class = "input-group">
			<input type = "text" name = "search_text" id = "search_text" class ="form-control" placeholder = "Search by name"></input>
		</div>
	</div>
		<div id= "result" class = "col-md-12">
			
		</div>
	</div>
	<div class = "col-md-3 form-inline">
		<form action = "add_friend.php" method = "post">
			<input type = "login" name = "login" placeholder="TYPE LOGIN" class = "form-control" id = "add_friend_input"></input>
			<button type = "submit" class = "btn btn-default btn-primary" style = "width : 29%; height:45px;">ADD </button>
		</form>
		<div class = "col-md-12 myborder" >
			<p style = "width : 100%;" class = "myfont">Friends requests</p>
			<?php  
			$user_to = $_SESSION['login'];
			$friends_request = mysql_query("SELECT * FROM friends_requests WHERE user_to = '$user_to'")
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
<script type="text/javascript">
	$(document).ready(function(){
					$('#search_text').keyup(function(){
						var txt = $(this).val();
						if(txt == 'kino'){
				         
						}else{
							$('#result').html('');
							$.ajax({
								url:"friends_creating.php",
								method:"post",
								data:{search:txt},
								dataType:"text",
								success:function(data){
									$('#result').html(data);
								}
							});
						}
					});

				});

</script>
</body>
</html>

