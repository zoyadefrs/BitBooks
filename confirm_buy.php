<?php
	if(!isset($_SESSION['user']))
	{
		header('Location: index.php');
	}
	
	session_start();
	require_once("lib.php");
	require_once("coinbase-php/lib/Coinbase.php");
	#TODO Alex: if($_SESSION["user"]'s token is set) {do what is below}
	$tokens = array(
            "access_token" => "",
            "refresh_token" => "",
            "expire_time" => ""); #From database

	$coinbaseOauth = new Coinbase_OAuth($_gCLIENT_ID, $_gCLIENT_SECRET, $_gREDIRECT_URL);
	$coinbase = Coinbase::withOauth($coinbaseOauth, $tokens);
	echo $coinbase->getBalance();
?>