<?php
require_once('database.php');
$faculty;
if(isset($_GET['faculty']))
{
    $faculty = $_GET['faculty'];
}
$code;
if(isset($_GET['code']))
{
    $code = $_GET['code'];
}
$sqlWhereParts = array();
$sqlAnswerParts = array();
$result = array();
if(isset($faculty))
{
    array_push($sqlWhereParts, "faculty = ?");
    array_push($sqlAnswerParts, $faculty);
}
if(isset($code))
{
    array_push($sqlWhereParts, "code = ?");
    array_push($sqlAnswerParts, $code);
}

/*if(count($sqlWhereParts) == 0)
{
    echo "NULL";
    exit;
    }*/

$sql = "select faculty, code, isbn, title, edition, author, " .
        " (select count(*) from bookListing where " .
        " isbn = isbn) as copies from bookListing " .
        "where ";
for($i = 0; $i < count($sqlWhereParts);++$i)
{
    $sql .= $sqlWhereParts[$i] . " ";
    if($i < count($sqlWhereParts) - 1)
    {
        $sql .= "and ";
    }
}

$sql .= "group by isbn";

$stmt = $conn->prepare($sql);
$stmt->execute($sqlAnswerParts);
while($row = $stmt->fetch())
{
    $entry = array('faculty' => $row['faculty'],
                'code' => $row['code'],
                'isbn' => $row['isbn'],
                'title' => $row['title'],
                'edition' => $row['edition'],
                'author' => $row['author'],
                'copies' => $row['copies']);
    array_push($result, $entry);
}
echo JSON_ENCODE($result);
?>