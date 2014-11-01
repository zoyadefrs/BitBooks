<?php
#No session_start() => it's always called from index.php, which does it already;
require_once('lib.php');

#Form validation
if(!empty($_POST))
{
	$username = validate_input($_POST['username']);
	$password = md5(validate_input($_POST['password']));

	#TODO alex: save in database

}
?>
<html>
<body>
	<h1>hey</h1>
</body>
</html>