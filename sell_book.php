<?php
include_once('database.php');
session_start();
if(!isset($_SESSION['user']))
{
	header('Location: index.php');
}
//coursename, coursenumber, booktitle, bookisbn, bookprice
if(isset($_GET['coursename']) && isset($_GET['coursenumber'])
&& isset($_GET['booktitle']) && isset($_GET['bookisbn'])
&& isset($_GET['bookprice']) && isset($_GET['author']) && isset($_GET['edition']) )
{
    $stmt = $conn->prepare("insert into bookListing(faculty,code, isbn,title, edition, author, seller, price) values(?,?,?,?,?,?,?,?)");
$stmt->execute(array($_GET['coursename'],$_GET['coursenumber'],
                          $_GET['bookisbn'],$_GET['booktitle'],
                         $_GET['edition'],$_GET['author'],
                         $_SESSION['user'],$_GET['bookprice']));
header('Location: index.php?soldbook=1');
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
<div class="title">
    <h1>Sell Your Book </h1>
</div> 
<div class ="container">
<div class = "tablecontent">
    <form method="GET" action="">
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
<input name="coursename" type="text" id="coursename" maxlength="4" style="font-weight:bold;width:50px;">
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
<input name="bookprice" type=text id="bookprice" maxlength="6" style="font-weight:bold;width:50px;">
</td>
</tr>
<tr>
<td>&nbsp;&nbsp;</td>
<td style="white-space:nowrap;">
<b>Author:</b>
&nbsp;
</td>
<td>
<input name="author" type=text id="author" style="font-weight:bold;width:200px;">
</td>
</tr>
<tr>
<td>&nbsp;&nbsp;</td>
<td style="white-space:nowrap;">
<b>Edition:</b>
&nbsp;
</td>
<td>
<input name="edition" type=text id="edition" maxlength="6" style="font-weight:bold;width:50px;">
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