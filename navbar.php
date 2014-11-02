<!-- Navigation bar -->
<nav>
<u1>
<li><a href="index.php">Search for a book</a></li>
<li><a href="sell_book.php">Sell a book</a></li>


<?php

    require_once('lib.php');
    require_once('database.php');
    #if nothing in DB, add "Activate coinbase" link, else don't display anything
    $stmt = $conn->prepare('SELECT access_token, refresh_token, expire_time FROM student WHERE username = ?');
    $stmt->execute(array($_SESSION["user"]));

    if($row = $stmt->fetch()) {
        if (!isset($row["access_token"]))
        {
            ?>
                <li><a href="set_coinbase_account.php">Activate coinbase</a></li>
            <?php
        }
    }
    
?>
<li><a href="logout.php">Logout</a></li>
</u1>
</nav>