<?php
require_once('lib.php');
require_once("coinbase-php/lib/Coinbase.php");

if(isset($_GET['code'])) {
	#User was redirected from coinbase after he accepted our third-party bitcoin app

	$coinbaseOauth = new Coinbase_OAuth($_gCLIENT_ID, $_gCLIENT_SECRET, $_gREDIRECT_URL);
	$tokens = $coinbaseOauth->getTokens($_GET['code']);
	# $tokens["access_token"] string
	# $tokens["refresh_token"] string
	# $tokens["expire_time"] int

	#TODO Alex: Store tokens that user has can now make transaction

	$coinbase = Coinbase::withOauth($coinbaseOauth, $tokens);
}

#TODO Alex (or someone): In navbar.php, if user's tokens is set in DB, don't show "Link coinbase account" link 

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/homepage.css">
</head>

<body>
<!--- Navigation bar --->
<nav>
<u1>
<li><a href="">Home</a></li>
<li><a href="">About</a></li>
<li><a href="set_coinbase_account.php">Activate coinbase</a></li>
</u1>
</nav>
<!--- table search  --->
<table id="tablesearch" cellspacing="1" border="0">
<tbody>
<tr>
<td style="height:5px;"></td>
</tr>
<tr>
<td>&nbsp;&nbsp;</td>
<td style="white-space:nowrap;">
<b> Search by: </b>
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



</body>
</html>
