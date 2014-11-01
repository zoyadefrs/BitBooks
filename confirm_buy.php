<?php
    session_start();
	if(!isset($_SESSION['user']))
	{
		header('Location: index.php');
	}
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
    ?>




    <?php
	
	require_once("lib.php");
    require_once("database.php");
	require_once("coinbase-php/lib/Coinbase.php");

    $stmt = $conn->prepare('SELECT access_token, refresh_token, expire_time FROM student WHERE username = ?');
    $stmt->execute(array($_SESSION["user"]));

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