<?php
    session_start();
	if(!isset($_SESSION['user']))
	{
		header('Location: index.php');
	}
    $listingID = $_GET["id"];
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/confirm_buy.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <script src="js/confirm_buy.js"></script>
</head>
<body>

    <?php
    require_once("navbar.php");
    $stmt = $conn->prepare("select id, faculty, code, isbn, title, edition, author, seller, (select concat(firstName, ' ', lastName) from student where userName = bl.seller) as name, price from bookListing bl where id = ?");
    $stmt->execute(array($listingID));
    $faculty = "";
    $code = "";
    $isbn = "";
    $title = "";
    $edition = "";
    $author = "";
    $seller = "";
    $price = "";
    if($row = $stmt->fetch())
    {
        $faculty = $row['faculty'];
        $code = $row['code'];
        $isbn = $row['isbn'];
        $title = $row['title'];
        $edition = $row['edition'];
        $author = $row['author'];
        $seller = $row['name'];
        $price = $row['price'];
    }
    ?>

<div class = "container">
<div class = "confirmbuy">
<!-- Navigation bar -->

<!-- table search  -->
<table id="tablesearch" cellspacing="1" border="0">
<tbody>
<tr>
<td style="height:5px;"></td>
</tr>
<tr>
<td>&nbsp;&nbsp;</td>
<td style="white-space:nowrap;">
<b>Here is your booklist: </b>
&nbsp;
</td>
</tr>

<tr>
<td>&nbsp;&nbsp;</td>
<td style="white-space:nowrap;">
</td>
</tr>
<tr>
<td>&nbsp;&nbsp;</td>
<td style="white-space:nowrap;">
        <b>Seller: <?php echo $seller; ?></b>
&nbsp;
</td>
</tr>

<tr>
<td>&nbsp;&nbsp;</td>
<td style="white-space:nowrap;">
<b>Title Name: <?php echo $title; ?></b>
&nbsp;
</td>
</tr>
<tr>
<td>&nbsp;&nbsp;</td>
<td style="white-space:nowrap;">
<b>ISBN: <?php echo $isbn; ?></b>
&nbsp;
</td>
</tr>
<tr>
<td>&nbsp;&nbsp;</td>
<td style="white-space:nowrap;">
<b>Edition: <?php echo $edition; ?></b>
&nbsp;
</td>
</tr>
<tr>
<td>&nbsp;&nbsp;</td>
<td style="white-space:nowrap;">
<b>&nbsp;&nbsp; </b>
</td>
</tr>
</tbody>
</table>

<div class="confirm"><input type="submit" name="confirmbuy" value="Confirm"></div>
</form>
</div>
</div>

    <?php
	
	require_once("lib.php");
    require_once("database.php");
	require_once("coinbase-php/lib/Coinbase.php");
    
    $stmt = $conn->prepare('SELECT access_token, refresh_token, expire_time FROM student WHERE username = (select seller from bookListing where id = ?)');
    $stmt->execute(array($listingID));

    if($row = $stmt->fetch()) {
        if (isset($row["access_token"]))
        {
        	$tokens = array(
            "access_token" => $row["access_token"],
            "refresh_token" => $row["refresh_token"],
            "expire_time" => $row["expire_time"]); #From database

            $coinbaseOauth = new Coinbase_OAuth($_gCLIENT_ID, $_gCLIENT_SECRET, $_gREDIRECT_URL);
            $coinbase = Coinbase::withOauth($coinbaseOauth, $tokens);
            #$coinbase->requestMoney('alexan_s@encs.concordia.ca', 0.01, "My test");
        }
    }

    ?>

</body>
</html>