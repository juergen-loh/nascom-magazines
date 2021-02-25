<?php
	$tail = "";
	$title = "INMC 80 News";
	$tppath = "..";
	$desc = 'INMC-80 News was an '
	.	'<a href="../issues/">English Nascom magazine</a>, '
	.	'published between 1980 and 1982. '
	.	"After Nascom&rsquo;s financial difficulties it followed ".'<a href="../inmc-news/">INMC News</a>.'
	.	"</p>\n<p>"
	.	"INMC 80 News mutated once more and became <a href=\"../80-bus-news/\">80-Bus News</a>.";
	$bottom = "INMC 80 News mutated once more and became <a href=\"../80-bus-news/\">80-Bus News</a>.";
	$path = ".";
	$pict = "logo.jpeg";
	include "$tppath/top.php";

	$path = "./01";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./02";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./03";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./04";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./05";	include "$path/content.php";

	include "$tppath/bottom.php"
?>
