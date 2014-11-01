<?php
	session_start();
	require_once("lib.php");
	#TODO Alex: if($_SESSION["user"]'s token is set) {do what is below}
	#Tokens value for Philippe's account for now
	$tokens = "23e7624965aba2243b9fc10ac6b1e304f50db33c22113038a2a7678b18698f4d";

	$coinbaseOauth = new Coinbase_OAuth($_gCLIENT_ID, $_gCLIENT_SECRET, $_gREDIRECT_URL);
?>