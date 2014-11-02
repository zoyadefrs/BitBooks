<?php
session_start();
require_once('lib.php');

if(!isset($_SESSION['user']))
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