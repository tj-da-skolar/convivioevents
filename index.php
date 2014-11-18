<?php
	session_start();
	
	$_SESSION['host'] = "tcp:sh6p718bkv.database.windows.net";
	$_SESSION['user'] = "official_convivio@yahoo.com@sh6p718bkv";
	$_SESSION['pass'] = "Celebrate18";
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
	
	$sql = "CREATE TABLE IF NOT EXISTS user(userID int(11) NOT NULL AUTO_INCREMENT, username varchar(20) NOT NULL,
		password varchar(20) NOT NULL,
		firstName varchar(20) NOT NULL,
		lastName varchar(30) NOT NULL,
		email varchar(20) NOT NULL,
		userType int(11) NOT NULL,
		PRIMARY KEY (`userID`)
		)";
?>