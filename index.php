<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="myJSfile.js"></script>
    <?php include 'session.php'; ?>
    <script type="text/javascript">
<!--

function validate_form ( )
{
  valid = true;

        if ( document.forma_vhoda.login.value == "" ||  document.forma_vhoda.password.value == "")
        {
                alert ( "Пожалуйста заполните поле 'Ваше имя' или 'Вашу фамилию'." );
                valid = false;
        }

        return valid;
}

//-->
</script>
	<title></title>
</head>
<body>
  <div class = "container col-md-12" >
   
   <div class = "col-md-12" id = "shapka">
    <div class = "col-md-3"></div>
    <div class = "col-md-8"> <p id = "welcome">  Welcome to CODEBOOK</p> </div>
   </div>
   
   <div class = "col-md-6 myborder" id = "sign_div">
   	    <div class = "col-md-12 alig-center"><p id = "sign"> SIGN IN</p></div>
   	    <div class = "col-md-12 alig-center">
  			<form action = "sign_in.php" method="post" name = "forma_vhoda" onsubmit="return validate_form ( );">
  				<div class = "form-group">
  					<label class = "myfont"> Login </label>
  					<input type = "login" class = "form-control" placeholder="LOGIN" name = "login"></input>
  				</div>
  				<div class = "form-group">
  					<label class = "myfont"> Password </label>
  					<input type = "password" class = "form-control" placeholder="PASSWORD" name = "password"></input>
  				</div>
  				<button type="submit" class="btn btn-default">SIGN IN</button>
  			</form>
  		</div>
   </div>
  	

  	<div class = "col-md-6 alig-cen myborder" id = "sign_div">
  		<div class = "col-md-12 alig-center"><p id = "sign"> SIGN UP</p></div>
  		 <div class = "col-md-12 alig-center">
  			<form action = "sign_up.php" method="post" enctype="multipart/form-data">
  				<div class = "form-group">
  					<label class = "myfont"> Name </label>
  					<input type = "login" class = "form-control" placeholder="NAME" name = "name"></input>
  				</div>
  				<div class = "form-group">
  					<label class = "myfont"> Surname </label>
  					<input type = "text" class = "form-control" placeholder="SURNAME" name = "surname"></input>
  				</div>
  				<div class = "form-group">
  					<label class = "myfont"> Login </label>
  					<input type = "text" class = "form-control" placeholder="LOGIN" name = "login"></input>
  				</div>
  				<div class = "form-group">
  					<label class = "myfont"> Password </label>
  					<input type = "password" class = "form-control" placeholder="PASSWORD" name = "password"></input>
  				</div>
  				<div class = "form-group">
  				    <label class = "myfont"> Avatar </label>
  					<input type = "file" name = "img" value = "Choose image"></input>
  				</div>
  				<button type="submit" class="btn btn-default">SIGN UP</button>
  			</form>
  		</div>
  	</div>

  </div>
</body>
</html>