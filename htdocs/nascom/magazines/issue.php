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
	include "$tppath/top.php";

	if ($toctext) {
		$path = "$parMagazine/$parIssue";
	} else {
		$path = ".";
	}
	include "$path/content.php";

	include "$tppath/bottom.php"
?>
