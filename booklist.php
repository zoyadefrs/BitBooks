<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('Location: index.php');
}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/booklist.css">
<link rel="stylesheet" type="text/css" href="css/navbar.css">
<script src="js/general.js"></script>
</head>

<body>
<?php
require_once("navbar.php");
?>
<div id="content_wrapper">
</div>

</body>
</html>
