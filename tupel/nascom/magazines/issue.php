<?php
	$tail = "";
	$title = "$magazine";
	$issue = "Issue $issue";
	$tppath = "../..";
	$path = "./";
	include "$tppath/top.php";

	$path = ".";
	include "content.php";

	include "$tppath/bottom.php"
?>
