<?php
session_start();
require_once('lib.php');

#Form validation
if(!empty($_POST))
{
	$username = validate_input($_POST['username']);
	$password = md5(validate_input($_POST['password']));

	#TODO alex: Check against database

	#For now, I just assume perfect user.
	$_SESSION['user'] = $username;
	header('Location: homepage.php');

}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/login.css">
</head>


<body>
<div class = "container">
<div class = "login">
<h1>Login</h1>
<form method="post" action="">
<p><input type="text" name="username" value="" placeholder="example@encs.concordia.ca"></p>
<p><input type="password" name="password" value="" placeholder="Password"</p>
<p class="submit"><input type="submit" name="commit" value="Login"></p>
</form>
</div>
</div>


</body>

</html>
