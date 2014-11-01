<?php
require_once('lib.php');
require_once("coinbase-php/lib/Coinbase.php");

if(isset($_GET['code'])) {
	#User was redirected from coinbase after he accepted our third-party bitcoin app

	$coinbaseOauth = new Coinbase_OAuth($_gCLIENT_ID, $_gCLIENT_SECRET, $_gREDIRECT_URL);
	$tokens = $coinbaseOauth->getTokens($_GET['code']);
	# $tokens["access_token"] string
	# $tokens["refresh_token"] string
	# $tokens["expire_time"] int

	#TODO Alex: Store tokens that user has can now make transaction

	$coinbase = Coinbase::withOauth($coinbaseOauth, $tokens);
}

#TODO Alex (or someone): In navbar.php, if user's tokens is set in DB, don't show "Link coinbase account" link 

?>