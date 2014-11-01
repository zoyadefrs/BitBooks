<?php
#No session_start() => it's always called from index.php, which does it already;
require_once('lib.php');
require_once("coinbase-php/lib/Coinbase.php");

if(isset($_GET['code'])) {
	#User was redirected from coinbase after he accepted our third-party bitcoin app
	#TODO Alex: Store tokens that user has can now make transaction
	$tokens = $coinbaseOauth->getTokens($_GET['code']);
}
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
<button type="button" onclick=""> Sign in </button>
</div>


</body>
</html>