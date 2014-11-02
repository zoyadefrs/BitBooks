<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('Location: index.php');
}
?>

<html>

<head>
<link rel="stylesheet" type="text/css" href="css/sell-book.css">
</head>

<body>
<?php
require_once("navbar.php");
?>
<div class ="container">
<form>
<!-- table search  -->
<table id="tablesearch" cellspacing="1" border="0">
<tbody>
<tr>
<td style="height:5px;"></td>
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
<option value="0150">John Molson School of Business</option>
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
<input name="coursename" type=text id="coursename" style="font-weight:bold;width:50px;">
</td>
</tr>
<tr>
<td>&nbsp;&nbsp;</td>
<td style="white-space:nowrap;">
<b>Course Number:</b>
&nbsp;
</td>
<td>
<input name="coursenumber" type=text id="coursenumber" style="font-weight:bold;width:50px;">
</td>
</tr>
<tr>
<td>&nbsp;&nbsp;</td>
<td style="white-space:nowrap;">
<b>ISBN:</b>
&nbsp;
</td>
<td>
<input name="bookisbn" type=text id="bookisbn" style="font-weight:bold;width:50px;">
</td>
</tr>
<tr>
<td>&nbsp;&nbsp;</td>
<td style="white-space:nowrap;">
<b>Price:</b>
&nbsp;
</td>
<td>
<input name="bookiprice" type=text id="bookprice" style="font-weight:bold;width:50px;">
</td>
</tr>
</tbody>
</table>
<div class="submit"><input type="submit" name="commit" value="Let's sell my book!"></p>
</form>
</div>
</body>
</html>