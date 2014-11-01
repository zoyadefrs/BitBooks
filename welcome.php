<?php
#No session_start() => it's always called from index.php, which does it already;
require_once('lib.php');
require_once("coinbase-php/lib/Coinbase.php");

if(isset($_GET['code'])) {
	#User was redirected from coinbase after he accepted our third-party bitcoin app

	$coinbaseOauth = new Coinbase_OAuth($_gCLIENT_ID, $_gCLIENT_SECRET, $_gREDIRECT_URL);
	$tokens = $coinbaseOauth->getTokens($_GET['code']);
	#TODO Alex: Store tokens that user has can now make transaction
	$coinbase = Coinbase::withOauth($coinbaseOauth, $tokens);
}

#TODO Alex (or someone): In navbar.php, if user's tokens is set in DB, don't show "Link coinbase account" link 
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="css/welcome.css">
</head>

<body>
<div class = "title">
<h2> YHacks </h2>
</div>

<div class= "welcome">
<h3>Welcome to ____ buy and sell textbooks and class related contents </h3>
<a href="login.php"><button type="button"> Sign in </button></a>
</div>


</body>
</html>