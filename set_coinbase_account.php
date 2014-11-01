<?php
session_start();
#Should be called from an <a href="set_coinbase_account.php">Link coinbase account</a> link on homepage.php

require_once("lib.php");
require_once("coinbase-php/lib/Coinbase.php");

$coinbaseOauth = new Coinbase_OAuth($_gCLIENT_ID, $_gCLIENT_SECRET, $_gREDIRECT_URL);
header("Location: " . $coinbaseOauth->createAuthorizeUrl("request+balance"));
?>