<?php
echo "homepage.php\nhere";

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