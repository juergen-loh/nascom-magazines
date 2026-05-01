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

	if ($toctext) {
		$paths = ["$parMagazine/$parIssue"];
	} else {
		$paths = ["."];
	}

	require "$tppath/top.php";
	printPages($paths, $tppath);
	require "$tppath/bottom.php";
?>
