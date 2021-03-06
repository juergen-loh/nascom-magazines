<?php
	$issue = quotemeta(addslashes($_GET['issue']));
	$query = quotemeta(addslashes(getenv("QUERY_STRING")));

	$quest = substr($query, -3, 1);
	if ($quest == "&") {
		$page = (int) substr($query, -2);
	} else {
		$page = 1;
	}
	$page = sprintf("%02d", $page);
	$redirect = "/nascom/journal/$issue/$page/";

	header("Status: 301 Moved Permanently");
//	header("Status: 307 Temporary Redirect");
	header("Location: https://tupel.jloh.de$redirect");
?>
