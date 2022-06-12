<?php
	$parIssue = quotemeta(addslashes($_GET['issue']));
	$parMagazine = quotemeta(addslashes($_GET['magazine']));
	$toctext = true;

	include "$parMagazine/issue.php";//"../issue.php";
	include "$parMagazine/$parIssue/issue.php";//"issue.php";
	include "issue.php";//"../../issue.php";
?>
