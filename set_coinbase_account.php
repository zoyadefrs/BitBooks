<?php
require_once("coinbase-php/lib/Coinbase.php");
#TODO: FETCH THESE VALUES FROM DB
$_CLIENT_ID = "4dbc3a46bcd1fce37259e5a715da8c513ab69f4366adc2155068f4caeb2f2ef3";
$_CLIENT_SECRET = "2ac72ec6461e08f003cd4799aa94a6544d72005be20efc9ed2266d95ab6c223a";

$_REDIRECT_URL = "https://localhost";

$coinbaseOauth = new Coinbase_OAuth($_CLIENT_ID, $_CLIENT_SECRET, $_REDIRECT_URL);
header("Location: " . $coinbaseOauth->createAuthorizeUrl("request+balance"));
?>