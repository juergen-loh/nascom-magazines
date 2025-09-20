<?php
	$title = "Nascom Newsletter";
	if (!isset($tppath)) $tppath = "..";
	if (!isset($pre)) $pre = "";
	if (!isset($post)) $post = "";
	$desc = "Nascom Newsletter was an "
	.	"<a href=\"$pre../issues/#nascom-newsletter\">English Nascom magazine</a>, "
	.	"published between 1982 and 1984, in parallel to "
	.	"<a href=\"$pre../80-bus-news/$post\">80-Bus News</a>."
	.	"</p>\n<p>"
	.	"It was the successor of "
	.	"<a href=\"$pre../micropower/$post\">Micropower</a>.";
	if (isset($ipath)) $path = $ipath; else $path = $ipath = ".";
	$pict = "logo.jpeg";
	include "$tppath/top.php";

	$path = "$ipath/25";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/26";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/31";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/32";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/33";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/34";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/35";	include "$path/content.php";

	include "$tppath/bottom.php"
?>
