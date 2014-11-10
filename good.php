<?php
session_start();
	//if($_SESSION['username'] != null)
		echo "Welcome, ".$_SESSION['username']."! <a href='logout.php'>Log out</a>";
	//else die("You must be logged in!");
?>
<html>
<body>
Login Successful
</body>
</html>
