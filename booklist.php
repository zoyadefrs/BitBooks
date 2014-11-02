<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('Location: index.php');
}

$isbn = $_GET['isbn'];

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/booklist.css">
<link rel="stylesheet" type="text/css" href="css/navbar.css">
<script src="js/general.js"></script>
</head>

<body>
<?php
require_once("navbar.php");
?>
<div id="content_wrapper">
<?php
    $stmt = $conn->prepare("select id, faculty, code, isbn, title, edition, author, seller, (select concat(firstName, ' ', lastName) as name from student where userName = bl.seller), price from bookListing bl where isbn = '5423659874512'");
    $stmt->execute(array($listingID));

    while($row = $stmt->fetch())
    {
        ?>
        <div>
        <span>
        
        </span>
        </div>
        <?php
    }
?>
</div>

</body>
</html>
