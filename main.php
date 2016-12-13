<!DOCTYPE html>
<html>
<head>
	<title>Main page</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myJSfile.js"></script>
</head>
<body>
<?php include 'session.php'; ?>
<div class = "container col-md-12">
	<div class = "col-md-12" id = "shapka">
		<div class = "col-md-10">
			<p class = "myfont alig-center" style="font-size : 95px;">Social network for simple people </p>
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
			<li><a href="some_user.php?login=<?php echo $_SESSION['login']?>">My profile</a></li>
			<li><a href="my_friends.php">Friends</a></li>
			<li><a href="messages.php">Messages</a></li>
			<li><a href="users.php">Users</a></li>
			<li><a href="main.php">About</a></li>
			<li><a href="">My settings</a></li>
		</ul>
	</div>
	<div class = "col-md-8 myborder">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

             <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
             <div class="item active">
              <img src="img/1.jpg" alt="Chania">
             </div>

             <div class="item">
             <img src="img/2.jpg" alt="Chania">
             </div>

             <div class="item">
              <img src="img/3.jpg" alt="Flower">
             </div>

             <div class="item">
             <img src="img/timkabar_image.jpg" alt="Flower">
             </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
             <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
             <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
             <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
             <span class="sr-only">Next</span>
            </a>
        </div>
	</div>
</div>
</body>
</html>
