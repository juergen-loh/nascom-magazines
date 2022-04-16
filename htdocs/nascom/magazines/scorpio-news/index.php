<?php
	$title = "Scorpio News";
	if (!isset($tppath)) $tppath = "..";
	if (!isset($pre)) $pre = "";
	if (!isset($post)) $post = "";
	$desc = "Scorpio News was an "
	.	"<a href=\"$pre../issues/\">English Nascom magazine</a>, "
	.	"published between 1987 and 1989. "
	.	"It was the successor of "
	.	"<a href=\"$pre../80-bus-news/$post\">80-Bus News</a>.";
	$bottom = "80-BUS publications spanned nearly 12 years from simple Z80 computers "
	.	"to the rise of IBM PC compatibles. Here ends the 8 bit era.";
	if (isset($ipath)) $path = $ipath; else $path = $ipath = ".";
	$pict = "logo.jpeg";
	include "$tppath/top.php";

	$path = "$ipath/11";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/12";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/13";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/14";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/21";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/22";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/23";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/24";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/31";	include "$path/content.php";

	include "$tppath/bottom.php"
?>
