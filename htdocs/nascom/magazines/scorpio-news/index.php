<?php
	$title = "Scorpio News";
	if (!isset($tppath)) $tppath = "..";
	if (!isset($pre)) $pre = "";
	if (!isset($post)) $post = "";
	$desc = "Scorpio News was an "
	.	"<a href=\"$pre../issues/#scorpio-news\">English Nascom magazine</a>, "
	.	"published between 1987 and 1989. "
	.	"It was the successor of "
	.	"<a href=\"$pre../80-bus-news/$post\">80-Bus News</a>.";
	$bottom = "80-BUS publications spanned nearly 12 years from simple Z80 computers "
	.	"to the rise of IBM PC compatibles. Here ends the 8 bit era.";
	if (isset($ipath)) $path = $ipath; else $path = $ipath = ".";
	$pict = "logo.jpeg";

	$paths = [
		"$ipath/11"
	,	"$ipath/12"
	,	"$ipath/13"
	,	"$ipath/14"
	,	"$ipath/21"
	,	"$ipath/22"
	,	"$ipath/23"
	,	"$ipath/24"
	,	"$ipath/31"
	];

	require "$tppath/top.php";
	printPages($paths, $tppath);
	require "$tppath/bottom.php";
?>
