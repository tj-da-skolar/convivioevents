
<html>
	<head>
    <title>Convivio</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
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
<?php

if (isset($_POST['send'])) {
    $to = 'marvin_suangco@yahoo.com'; 
    $subject = 'Feedback from my site';

	$message = 'Name: ' . $_POST['name'] . "\r\n\r\n";
	$message .= 'Email: ' . $_POST['email'] . "\r\n\r\n";
	$message .= 'Comments: ' . $_POST['comments'];
}
$success = mail($to, $subject, $message );

?>
		<?php if (isset($success) && $success) { ?>
			<h1>Thank You</h1>
			Your message has been sent.
		<?php } else { ?>
			<h1>Oops!</h1>
			Sorry, there was a problem sending your message.
		<?php } ?>
	</body>
</html> 

