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

	$paths = array(
		"$ipath/25"
	,	"$ipath/26"
	,	"$ipath/31"
	,	"$ipath/32"
	,	"$ipath/33"
	,	"$ipath/34"
	,	"$ipath/35"
	);

	require "$tppath/top.php";
	printPages($paths, $tppath);
	require "$tppath/bottom.php";
?>
