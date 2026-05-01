<?php
	if (!isset($toctext)) {
		$toctext = false;
	}

	$title = "$magazine";
	$issue = "Issue $issue";

	if ($toctext) {
		$tppath = ".";
		$path = "$parMagazine/$parIssue/";
		$post = "text/";
	} else {
		$tppath = "../..";
		$path = "./";
		$post = "";
	}
	require "$tppath/top.php";

	if ($toctext) {
		$path = "$parMagazine/$parIssue";
	} else {
		$path = ".";
	}
	require "$path/content.php";

	require "$tppath/bottom.php"
?>
