	
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
		//echo 'conn';
	}
	
	//Connect to the database
	mysql_select_db($_SESSION['db'], $con);
	
	//Checks if a value has been set
	if(isset($_POST['username'])) {
		//Gets the POST value with the user presses Log In/Submit Button
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['first'];
		$lastname = $_POST['last'];
		$email = $_POST['email'];
		
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $firstname;
    $_SESSION['email'] = $firstname;
    
    $sql = "SELECT * FROM user WHERE username='$username' LIMIT 1";
    $res = mysql_query($sql);
	
	$sqlemail = "SELECT * FROM user WHERE email = '$username'";
	$resemail = mysql_query($sql);
	
	$confirmpassword = $_POST['confirmpassword'];
	
	
	
	//echo 'check';
    $usertype = '1';
    //Checks if the username is valid
    if(mysql_num_rows($res) == 0  && mysql_num_rows($resemail) == 0) {
      //Database selection
      //$sql = "SELECT * FROM user WHERE user_name='".$username."' AND user_password='".$password."' LIMIT 1";
      $sql = "INSERT INTO user (username, password, firstName, lastName, email, userType) VALUES ('".$username."', '".$password."', '".$firstname."', '".$lastname."', '".$email."','".$usertype."');";
      $res = mysql_query($sql);

      header('Location: AfterSignUp.html');
      exit;
    } else {
      //header('Location: SignUp.php?error=TRUE');
	  echo "<script type='text/javascript'>
       alert('Error, your username or email are already in use');
    </script>";
      exit;
    }    
		
	}
?>