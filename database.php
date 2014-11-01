<?php
$conn = new PDO('mysql:host=localhost;dbname=YHack', "YHackUser", "mypass");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
