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
<h2> BitBooks</h2>
</div>

<div class= "welcome">
<h3>A secure place to buy and sell textbooks</h3>
<div style="margin-top:100px;"><a href="login.php"><button type="button" style="width: 100px;height: 35px;border-radius: 5px;background-color: rgba(76, 82, 84, 0.24);"> Sign in </button></a></div>
</div>


</body>
</html>