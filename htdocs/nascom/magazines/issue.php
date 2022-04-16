<?php
	$title = "$magazine";
	$issue = "Issue $issue";
	$tppath = "../..";
	$path = "./";
	$post = "";
	include "$tppath/top.php";

	$path = ".";
	include "content.php";

	include "$tppath/bottom.php"
?>
