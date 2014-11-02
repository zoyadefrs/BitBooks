<?php
require_once('database.php');
$isbn = $_GET['isbn'];
$result = array();
if(!isset($isbn))
{
    echo "NULL";
    exit;
}

$sql = "select faculty, code, isbn, title, edition, author, " .
        "seller, price from bookListing " .
        "where isbn = ?";

$stmt = $conn->prepare($sql);
$stmt->execute(array("5423659874512"));
while($row = $stmt->fetch())
{
    $entry = array('faculty' => $row['faculty'],
                'code' => $row['code'],
                'isbn' => $row['isbn'],
                'title' => $row['title'],
                'edition' => $row['edition'],
                'author' => $row['author'],
                'seller' => $row['seller'],
                'price' => $row['price'],
                'copies' => $row['copies']);
    array_push($result, $entry);
}
echo JSON_ENCODE($result);
?>