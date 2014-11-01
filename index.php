<?php
session_start();
require_once('lib.php');
#TODO: FOR TESTING. REMOVE FROM FINAL CODE ONCE WE HAVE THE LOGIN PAGE.

if(isset($_SESSION['user']))
{
	#welcome.php shouldn't initialize a session_start();
	require_once('welcome.php');
}
else
{
	#homepage.php shouldn't initialize a session_start();
	require_once('homepage.php');
}

?>