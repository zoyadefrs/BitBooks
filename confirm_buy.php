<?php
	if(!isset($_SESSION['user']))
	{
		header('Location: index.php');
	}
	
	session_start();
	require_once("lib.php");
	require_once("coinbase-php/lib/Coinbase.php");
	#TODO Alex: if($_SESSION["user"]'s token is set) {do what is below}
	#Tokens value for Philippe's account for now
    $stmt = $conn->prepare('SELECT access_token, refresh_token, expire_time FROM student WHERE username = ?');
    $stmt->execute(array($_SESSION["user"]));

    if($row = $stmt->fetch()) {
        if (isset($row["access_token"]))
        {
        	$tokens = array(
            "access_token" => $row["access_token"],
            "refresh_token" => $row["refresh_token"],
            "expire_time" => $row["expire_time"]); #From database

            $coinbaseOauth = new Coinbase_OAuth($_gCLIENT_ID, $_gCLIENT_SECRET, $_gREDIRECT_URL);
            $coinbase = Coinbase::withOauth($coinbaseOauth, $tokens);
            echo $coinbase->getBalance();
        }
    }
?>