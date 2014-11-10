<?php
		session_start();
	
	$_SESSION['host'] = "localhost";
	$_SESSION['user'] = "root";
	$_SESSION['pass'] = "";
	$_SESSION['db'] = "convivio";
	
	$con = mysql_connect($_SESSION['host'], $_SESSION['user'], $_SESSION['pass']);
	//Close connection when it can't connect to MySQL
	if(!$con) {
		die('Could not connect'. mysql_error());
	}else{
	echo ' conn';
	}

	
	//Connect to the database
	mysql_select_db($_SESSION['db'], $con);
		echo ' conn';
	//Checks if a value has been set
	 if(isset($_POST['username'])) {
		//Gets the POST value with the user presses Log In/Submit Button
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		echo $username;
		
		$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'  LIMIT 1";
		
	 	if($res = mysql_query($sql)){
			echo 'Success';
			$_SESSION['username'] = $username;
			header('Location: good.html');
						
		}else{
			echo ' failed';
		} 
		
	}
    
	
	$_SESSION['subject'] = "CONVIVIO";
	mysql_close($con);
?>
<!--
<html>
  <head>
    <title>Convivio</title>
    
   
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="http://fonts.googleapis.com/css?family=Raleway" rel='stylesheet' type='text/css'>
	<style>
	body {
	    background-image: url("bg.jpg");
	    background-repeat: no-repeat;
	    background-attachment: fixed;
    	background-position: center; 
    	background-size: 100%;
	}
	</style>	
  </head>
  
  <body>
   	
  	
	<div class="container myNavbar" style="width:97.75%; height:30%;">
		<ul>
			<div class="row-fluid" align="center">
				<img src="finallogo.jpg" alt="logo" style="width:5%; height:5%;">
				<img src="convivio.jpg" alt="letters" style="width:15%; height:15%; padding-left:0.5%; padding-right:30%;">
				<a class="btn" href="index.html" role="button"><i class="icon-home"></i> Home</a>
				<a class="btn" href="AboutUs.html" role="button"><i class="icon-question-sign"></i> About</a>
				<a class="btn" href="ContactUs.html" role="button"><i class="icon-comment"></i> Contact Us</a>
			</div>
		</ul>
	</div>

	<div class="container" align="center">
		<div class="row-fluid" align="center">
			<div class="span6">
				<div class="container myBackground" style="margin-top: 17%; width: 100%; margin-left: 8%">
					<h3>Making your special days happen!</h3>
				</div>
				<div class="container myBackground" style="margin-top: 3%; width: 100%; margin-left: 8%">
					<h4>Having a hard time planning an upcoming celebration? With Convivio, customizing your own party package and booking them for your special day are now within your reach. Be your own event coordinator!</h4>
					<br><p><a class="btn" href="SignUp.html" role="button"><i class="icon-cog"></i> SIGN UP NOW! &raquo;</a></p><br>
				</div>
			</div>

			<div class="span5">
				<div class="container myBackground" style="margin-top: 20%; width: 100%; margin-left: 10%;">
					<br><h3>Sign in to Convivio!</h3><br>
					<form method="post" action="login.php" class="form-signin" role="form">
						<div id="login-container">
							<input type="text" 	name="username"placeholder="Username or Email" style="width: 60%" required><br>
							<input type="password" name="password"placeholder="Password" style="width: 60%" required><br><br>
							<input class="btn" type="submit"  value="Login">
							
						</div><br>
					</form>
				</div>
			</div>
		</div>
	</div>	
		
	<br><br>
	<div id="copyright" class="container">
		<font size="4%;">&copy; Convivio 2014. All rights reserved.</font>
	</div>
	
  </body>
</html>-->
