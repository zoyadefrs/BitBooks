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
    $stmt = $conn->prepare('update student set access_token = ?, refresh_token = ?, expire_time = ?');
    $stmt->execute(array($tokens["access_token"], $tokens["refresh_token"], $tokens["expire_time"]));
}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/homepage.css">
<link rel="stylesheet" type="text/css" href="css/navbar.css">
<script src="js/general.js"></script>
</head>

<body>
<?php
require_once("navbar.php");
?>
<div id="content_wrapper">
	<!-- Filled in general.js-->
</div>

<!-- table search  -->
<div id="tablesearch_wrapper">
	<form action="booklist.php">
	<table id="tablesearch" cellspacing="1" border="0">
	<tbody>
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
	</tbody>
	</table>
	<div class="search"><input type="submit" name="search" value="Search" /></div>
	</form>    

</div>

</body>
</html>
