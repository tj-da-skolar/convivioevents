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
	$userID = $row['userID'];
	//echo $userID;
	$firstname = $row['firstName'];
	//echo $firstname;
	$lastname = $row['lastName'];
	//echo $lastname;
	$fullname = $firstname. ' ' .$lastname;
	//echo $fullname;
	
	$sql = "SELECT * FROM event WHERE eventUserID='$userID'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result)) {
		$rows[] = $row;
		//echo $row['eventID'] .' '. $row['eventName'] ;

	}
	
	//$sql = "SELECT supplierTypeName FROM suppliertype";
	//$result = mysql_query($sql);
	//while($row = mysql_fetch_array($result)) {
	//	$rows[] = $row;
		//echo $row['supplierTypeName'];

	//}
	
?>
<html>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="http://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Raleway" rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/png" href="fav.png"/>
<head>
</head>
<body>
<div class = "navbar">
			<div class = "navbar-inner">
			<img class="logo" src="ConvivioLogo.jpg">
			<ul class="navbar nav">
				<li><a id="username"> <?= $fullname; ?></a></li>
				<li><a id="logout"href="#">Log out</a></li>
			</ul>
			</div>
	</div>
<div class="row">
		<div class="span4">
			<ul class="nav nav-list">
				<li class="active"><a>Bea Luz</a></li>
				<li><a href="#">&nbsp&nbsp Package 1</a></li>
				<li><a href="#">&nbsp&nbsp Package 2</a></li>
				<li class="active"><a>Dane Lladoc</a></li>
				<li><a href="#">&nbsp&nbsp Package 1</a></li>
				<li><a href="#">&nbsp&nbsp Package 2</a></li>
			</ul>
		</div>
		<div class="span11 offset1">
				<div class = "navbar">
					<div class = "navbar-inner">
						<h5 id="eventsUserName"> <?= $fullname; ?></h5><br>
						<span id="eventsUserEmail">@<?= $username; ?></span>
					</div>
					<div class = "navbar-inner" style="display:none">
				<h4 id="category"><center>Create Event</h4>
				</div>
			<div class = "navbar" style="display:none">
			<br><br>
				<form method="POST" action="login.php" class="form-signin" role="form">
					Event Name: 
					<input type="text" name="username" placeholder="" style="width: 40%"><br>
					Date: <select style="width: 15%;">
  					<option> </option>
  					<option>January</option>
 				 	<option>February</option>
 				 	<option>March</option>
  				 	<option>April</option>
 				 	<option>May</option>
	 				<option>June</option>
	 				<option>July</option>
 				 	<option>August</option>
 				 	<option>September</option>
  				 	<option>October</option>
 					<option>November</option>
 				 	<option>December</option>
					</select>
					<select style="width: 8%;">
  					<option> </option>
 				 	<option>1</option>
 				 	<option>2</option>
 					<option>3</option>
 				  	<option>4</option>
 				 	<option>5</option>
 				 	<option>6</option>
  				 	<option>7</option>
  					<option>8</option>
 				 	<option>9</option>
  					<option>10</option>
 				 	<option>etc</option>
					</select>
					<select style="width: 10%;">
  					<option> </option>
  					<option>2014</option>
  					<option>2015</option>
 					<option>2016</option>
  				 	<option>2017</option>
 				 	<option>2018</option>
					</select><br><br>
					<p><a class="btn" href="AddServices.html" role="button"> Create &raquo;</a></p>
				</form> 
			</div>
					<div class = "navbar-inner">
						<ul class="navbar nav pull-left">
							<li><a id="all">All</a></li>
							<li><a id="happening">Happening</a></li>
							<li><a id="upcoming">Upcoming</a></li>
							<li><a id="finished">Finished</a></li>
							<li><a id="bookmarked">Bookmarked</a></li>
						</ul>
					</div>
				</div>
				<div class = "navbar">
					<?php foreach ($rows as $r  ): ?>
						<a> <?php echo $r['eventName'];?> </a>
					<?php endforeach;?>
					<!--<a href="AddServices.html">Dannika's 18th</a>-->
				</div>
		</div>
</div>
</body>
</html>