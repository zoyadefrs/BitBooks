<?php
#No session_start() => it's always called from index.php, which does it already;
require_once('lib.php');
require_once("coinbase-php/lib/Coinbase.php");

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="css/welcome.css">
<link rel="stylesheet" type="text/css" href="css/navbar.css">
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