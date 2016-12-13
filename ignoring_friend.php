<?php 
if(isset($_POST['ignorerequest'.$user_from]))
					{
						$ignore_request = mysql_query("DELETE FROM friends_request WHERE user_to ='$user_to'");
						echo "Request Ignored!";
						
					}
 ?>