<?php
	$parIssue = quotemeta(addslashes($_GET['issue']));
	$parMagazine = quotemeta(addslashes($_GET['magazine']));
	$toctext = true;

	if (!file_exists("$parMagazine/issue.php")
	||	!file_exists("$parMagazine/$parIssue/issue.php")
	||	!file_exists("issue.php")
	) {
		require			( "../../SetIncludePath.php");
		SetIncludePath	( "../..");
//		$include_path	= "../../../cgi-bin";
		require "$include_path/404.php";
		exit;
	}

	include "$parMagazine/issue.php";//"../issue.php";
	include "$parMagazine/$parIssue/issue.php";//"issue.php";
	include "issue.php";//"../../issue.php";
?>
