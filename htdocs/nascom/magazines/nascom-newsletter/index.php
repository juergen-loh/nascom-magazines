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
	require "$tppath/top.php";

	$path = "$ipath/25";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/26";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/31";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/32";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/33";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/34";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/35";	require "$path/content.php";

	require "$tppath/bottom.php"
?>
