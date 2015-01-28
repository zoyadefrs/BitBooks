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
<form method="GET" action="index.php">
<input name="confirmbuy" type="hidden" value="1"/>
<div class="confirm">
<input type="submit" value="Confirm">
</div>
</form>
</div>
</div>

    <?php
	
	require_once("lib.php");
    require_once("database.php");
	require_once("coinbase-php/lib/Coinbase.php");
    
    $stmt = $conn->prepare('SELECT access_token, refresh_token, expire_time, email FROM student where username = (select seller from bookListing where id = ?)');
    $stmt->execute(array($listingID));
    
    $stmt2 = $conn->prepare('SELECT email from student where username = ?');
    $stmt2->execute(array($_SESSION['user']));
    $frow = $stmt2->fetch();
    $bemail = $frow['email'];
    if($row = $stmt->fetch()) {
        if (isset($row["access_token"]))
        {
            //echo $row["email"];
        	$tokens = array(
            "access_token" => $row["access_token"],
            "refresh_token" => $row["refresh_token"],
            "expire_time" => $row["expire_time"]); #From database
            $coinbaseOauth = Coinbase::withOauth($_gCLIENT_ID, $_gCLIENT_SECRET, $_gREDIRECT_URL);
            $coinbase = Coinbase::withOauth($coinbaseOauth, $tokens);
            //$tokens = $coinbaseOauth->refreshTokens($tokens);
            /*$stmt = $conn->prepare('update user set access_token = ?, refresh_token = ?, expire_time = ?');
              $stmt->execute(array($tokens['access_token'], $tokens['refresh_token'], $tokens['expire_time']));*/
            $coinbase->requestMoney($bemail, $price, "You've bought a book!");
        }
    }

    ?>

</body>
</html>