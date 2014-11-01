<?php
if(!isset($_SESSION['user']))
{
	header('Location: index.php');
}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="homepage.css">
<script src="js/general.js"></script>
</head>

<body>
<!-- Navigation bar -->
<nav>
<u1>
<li><a href="">Home</a></li>
<li><a href="">About</a></li>
<li><a href="set_coinbase_account.php">Activate coinbase</a></li>
</u1>
</nav>

<!-- table search  -->
<div id="tablebooklist_wrapper">
<table id="tablebooklist" cellspacing="1" cellpadding="2" border="0" style="border-color:LightSteelBlue;border-width:1px;borderr-style:Solid;width:920px;">
<tbody>
<form action="">
<tr align="left" style="background-color:White;">
<td "left" colspan="10"></td>
</tr>
<tr align="center" style="background-color:White;">
<td align="center" colspan="10" style="font-size:14pt;font-weight:bold;">Booklist</td>
</tr>
<tr align="center" style="background-color:WhiteSmoke;">
<td align="center" colspan="10" style="font-size:8pt;font-weigth:normal;white-space:nowrap;">"Course Name:"<b>theName</b>",&nbsp;;&nbsp; Course Number:" <b>theNumber</b>
</td>
</tr>


</tbody>
</table>



</form>
</div>


</body>
</html>
