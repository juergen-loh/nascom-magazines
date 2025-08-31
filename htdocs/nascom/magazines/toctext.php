<?php
	$stripChars = '/[^a-zA-Z0-9().+\- ]+/';

	$parIssue = preg_replace($stripChars, '', $_GET['issue']);
	$parMagazine = preg_replace($stripChars, '', $_GET['magazine']);
	$toctext = true;

	if (!file_exists("$parMagazine/issue.php")
	||	!file_exists("$parMagazine/$parIssue/issue.php")
	||	!file_exists("issue.php")
	) {
		require			( "../../SetIncludePath.php");
		SetIncludePath	( "../..");
		require "$include_path/404.php";
		exit;
	}

	include "$parMagazine/issue.php";
	include "$parMagazine/$parIssue/issue.php";
	include "issue.php";
?>
