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
<div class = "tablecontent">
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
<b>Course Name:</b>
&nbsp;
</td>
<td>
<input name="coursename" type=text id="coursename" maxlength="4" style="font-weight:bold;width:50px;">
</td>
</tr>
<tr>
<td>&nbsp;&nbsp;</td>
<td style="white-space:nowrap;">
<b>Course Number:</b>
&nbsp;
</td>
<td>
<input name="coursenumber" type=text id="coursenumber" maxlength="4" style="font-weight:bold;width:50px;">
</td>
</tr>
<tr>
<td>&nbsp;&nbsp;</td>
<td style="white-space:nowrap;">
<b>Title:</b>
&nbsp;
</td>
<td>
<input name="booktitle" type=text id="booktitle" maxlength="30" style="font-weight:bold;width:150px;">
</td>
</tr>
<tr>
<td>&nbsp;&nbsp;</td>
<td style="white-space:nowrap;">
<b>ISBN:</b>
&nbsp;
</td>
<td>
<input name="bookisbn" type=text id="bookisbn" maxlength="13" style="font-weight:bold;width:100px;">
</td>
</tr>
<tr>
<td>&nbsp;&nbsp;</td>
<td style="white-space:nowrap;">
<b>Price:</b>
&nbsp;
</td>
<td>
<input name="bookiprice" type=text id="bookprice" maxlength="6" style="font-weight:bold;width:50px;">
</td>
</tr>
</tbody>
</table>
</div>
<div class="submit"><input type="submit" name="commit" value="Let's sell my book!"></p>
</form>

</div>
</body>
</html>