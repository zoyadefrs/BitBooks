<?php

if(!isset($_SESSION['user']))
{
	header('Location: index.php');
}

require_once('lib.php');
require_once("coinbase-php/lib/Coinbase.php");
require_once('database.php');
if(isset($_GET['code'])) {
	#User was redirected from coinbase after he accepted our third-party bitcoin app

	$coinbaseOauth = new Coinbase_OAuth($_gCLIENT_ID, $_gCLIENT_SECRET, $_gREDIRECT_URL);
	$tokens = $coinbaseOauth->getTokens($_GET['code']);

	$coinbase = Coinbase::withOauth($coinbaseOauth, $tokens);
    $stmt = $conn->prepare('insert into student (access_token, refresh_token, expire_time) values (?, ?, ?)');
    $stmt->execute(array($tokens["access_token"], $tokens["refresh_token"], $tokens["expire_time"]));
}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/homepage.css">
<script src="js/general.js"></script>
</head>

<body>
<?php
require_once("navbar.php")
?>
<!-- table search  -->
<div id="tablesearch_wrapper">
	
	<table id="tablesearch" cellspacing="1" border="0">
	<tbody>
	<form action="booklist.php">
	<tr>
	<td style="height:5px;"></td>
	</tr>
	<tr>
	<td>&nbsp;&nbsp;</td>
	<td style="white-space:nowrap;">
	<b> Search by </b>
	</td>
	</tr>
	<tr>
	<td>&nbsp;&nbsp;</td>
	<td style="white-space:nowrap;">
	<b>Faculty Department:</b>
	&nbsp;
	</td>
	<td align="left" colspan="1">
	<select name="department" id="departmentname" style="background-color:White;">
	<option value="0120">Engineering and Computer Science</option>
	</select>
	</td>

	<tr>
	<td>&nbsp;&nbsp;</td>
	<td style="white-space:nowrap;">
	<b>&nbsp;&nbsp; or </b>
	</td>
	</tr>

	<tr>
	<td>&nbsp;&nbsp;</td>
	<td style="white-space:nowrap;">
	<b>Course Name:</b>
	&nbsp;
	</td>
	<td>
	<input name="coursename" type=text maxlength="4" id="coursename" style="font-weight:bold;width:50px;">
	</td>
	</tr>
	<tr>
	<td>&nbsp;&nbsp;</td>
	<td style="white-space:nowrap;">
	<b>Course Number:</b>
	&nbsp;
	</td>
	<td>
	<input name="coursenumber" type=text maxlength="4" id="coursenumber" style="font-weight:bold;width:50px;">
	</td>
	</tr>
	<tr><td><input type="submit" value="Search"/></td></tr>

	</form>
	</tbody>
	</table>

	
</div>


</body>
</html>
