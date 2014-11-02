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
<div>
<span class="columnSpan">
        Faculty
        </span>
        <span class="columnSpan">
        Code
        </span>
        <span class="columnSpan">
       ISBN
        </span>
        <span class="columnSpan">
       Title
        </span>
        <span class="columnSpan">
        Edition
        </span>
        <span class="columnSpan">
        Author
        </span>
        <span class="columnSpan">
        Seller
        </span>
        <span class="columnSpan">
        Price
        </span class="columnSpan">
<span>
        </span>
</div>
<?php
    $stmt = $conn->prepare("select id, faculty, code, isbn, title, edition, author, seller, (select concat(firstName, ' ', lastName) as name from student where userName = bl.seller), price from bookListing bl where isbn = ?");
    $stmt->execute(array($isbn));
$i = 0;
    while($row = $stmt->fetch())
    {
        ?>
        <div class="<?php if($i % 2 == 0) {echo 'even';}else{echo 'odd';}?>">
        <span class="columnSpan">
        <?php echo  $row['faculty'];?>
        </span>
        <span class="columnSpan">
        <?php echo  $row['code'];?>
        </span>
        <span class="columnSpan">
        <?php echo  $row['isbn'];?>
        </span>
        <span class="columnSpan">
        <?php echo  $row['title'];?>
        </span>
        <span class="columnSpan">
        <?php echo  $row['edition'];?>
        </span>
        <span class="columnSpan">
        <?php echo  $row['author'];?>
        </span>
        <span class="columnSpan">
        <?php echo  $row['seller'];?>
        </span>
        <span class="columnSpan">
        <?php echo  $row['price'];?>
        </span class="columnSpan">
        <span>
        <form method="GET" action="confirm_buy.php">
        <input name="id" type="hidden" value="<?php echo $row['id']; ?>"/>
        <input type="submit" value="Buy"/>
        </form>
        </span>
        </div>
        
        <?php
        ++$i;
    }
?>
</div>

</body>
</html>
