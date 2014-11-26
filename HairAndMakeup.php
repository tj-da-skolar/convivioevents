 <?php
	session_start();

		if($_SESSION['username']){
		$username = $_SESSION['username'];
	}
 
	$con = mysql_connect($_SESSION['host'], $_SESSION['user'], $_SESSION['pass']);
	//Close connection when it can't connect to MySQL
	if(!$con) {
		die('Could not connect'. mysql_error());
	}
		
	//Connect to the database
	mysql_select_db($_SESSION['db'], $con);
	
	
	//echo "Welcome ". $username ."!" ;
	$sql = "SELECT * FROM user WHERE username='$username'";
	//	echo $sql;
	$res = mysql_query($sql);
	//echo $res;
	$row = mysql_fetch_assoc($res);
	$firstname = $row['firstName'];
	//echo $firstname;
	$lastname = $row['lastName'];
	//echo $lastname;
	$fullname = $firstname. ' ' .$lastname;
	//echo $fullname;
	
	$sql = "SELECT supplierTypeName FROM suppliertype";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result)) {
		$rows[] = $row;
		//echo $row['supplierTypeName'];

	}
	
?>
<html>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="http://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Raleway" rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/png" href="fav.png"/>
<head></head>
<body>
<div class = "navbar">
	<div class = "navbar-inner">
		<img class="logo" src="ConvivioLogo.jpg">
		<ul class="navbar nav">
			<li><a id="username"> <?= $fullname; ?> </a></li>
			<li><a id="logout"href="#">Log out</a></li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="span4">
		<ul  class="nav nav-list">
		<?php foreach ($rows as $r  ): ?>
			<li><a> <?php echo $r['supplierTypeName'];?> </a>	</li>
		<?php endforeach;?>
		</ul>
		
		<!--
		<ul class="nav nav-list">
		  <li><a href="Catering.html">Catering</a></li>
		  <li><a href="Venue.html">Venue</a></li>
		  <li><a href="PhotoAndVideo.html">Photography and Videography</a></li>
		  <li class="active"><a href="#">Hair and Makeup</a></li>
		  <li><a href="Cake.html">Cake</a></li>
		  <li><a href="Gown.html">Gown</a></li>
		  <li><a href="Souvenirs.html">Souvenirs</a></li>
		  <li><a href="Desserts.html">Desserts</a></li>
		  <li><a href="LiveArtists.html">Live Artists</a></li>
		</ul>
		</ul>
		-->
	</div>
</div>
</body>
</html>