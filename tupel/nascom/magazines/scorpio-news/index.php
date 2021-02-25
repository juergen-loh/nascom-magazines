<?php
	$tail = "";
	$title = "Scorpio News";
	$tppath = "..";
	$desc = 'Scorpio News was an '
	.	'<a href="../issues/">English Nascom magazine</a>, '
	.	'published between 1987 and 1989. '
	.	"It was the successor of ".'<a href="../80-bus-news/">80-Bus News</a>.';
	$bottom = "80-BUS publications spanned nearly 12 years from simple Z80 computers to the rise of IBM PC compatibles. Here ends the 8 bit era.";
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
	$path = "./24";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./31";	include "$path/content.php";

	include "$tppath/bottom.php"
?>
