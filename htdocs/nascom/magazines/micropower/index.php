<?php
	$tail = "";
	$title = "Micropower";
	$tppath = "..";
	$desc = 'Micropower was an '
	.	'<a href="../issues/">English Nascom magazine</a>, '
	.	'published between 1981 and 1982, in parallel to '
	.	'<a href="../inmc-80-news/">INMC 80 News</a> and '
	.	'<a href="../80-bus-news/">80-Bus News</a>.'
	.	"</p>\n<p>"
	.	"Micropower became the <a href=\"../nascom-newsletter/\">Nascom Newsletter</a> with the original issue numbers.";
	$bottom = "Micropower became the <a href=\"../nascom-newsletter/\">Nascom Newsletter</a> with the original issue numbers.";
	$path = ".";
	$pict = "logo.jpeg";
	include "$tppath/top.php";

	$path = "./11";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./12";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./13";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./14";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./21";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./22";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./23";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./24";	include "$path/content.php";

	include "$tppath/bottom.php"
?>
