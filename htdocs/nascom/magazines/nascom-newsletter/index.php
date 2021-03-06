<?php
	$tail = "";
	$title = "Nascom Newsletter";
	$tppath = "..";
	$desc = 'Scorpio News was an '
	.	'<a href="../issues/">English Nascom magazine</a>, '
	.	'published between 1982 and 1984, in parallel to '
	.	'<a href="../80-bus-news/">80-Bus News</a>.'
	.	"</p>\n<p>"
	.	"It was the successor of ".'<a href="../micropower/">Micropower</a>.';
	$path = ".";
	$pict = "logo.jpeg";
	include "$tppath/top.php";

	$path = "./25";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./26";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./31";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./32";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./33";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./34";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./35";	include "$path/content.php";

	include "$tppath/bottom.php"
?>
