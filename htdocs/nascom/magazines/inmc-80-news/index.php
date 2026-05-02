<?php
	$title = "INMC 80 News";
	if (!isset($tppath)) $tppath = "..";
	if (!isset($pre)) $pre = "";
	if (!isset($post)) $post = "";
	$desc = "INMC-80 News was an "
	.	"<a href=\"$pre../issues/#inmc-80-news\">English Nascom magazine</a>, "
	.	"published between 1980 and 1982. "
	.	"After Nascom&rsquo;s financial difficulties it followed "
	.	"<a href=\"$pre../inmc-news/$post\">INMC News</a>."
	.	"</p>\n<p>"
	.	"INMC 80 News mutated once more and became "
	.	"<a href=\"$pre../80-bus-news/$post\">80-Bus News</a>.";
	$bottom = "INMC 80 News mutated once more and became "
	.	"<a href=\"$pre../80-bus-news/$post\">80-Bus News</a>.";
	if (isset($ipath)) $path = $ipath; else $path = $ipath = ".";
	$pict = "logo.jpeg";

	$paths = [
		"$ipath/01"
	,	"$ipath/02"
	,	"$ipath/03"
	,	"$ipath/04"
	,	"$ipath/05"
	];

	require "$tppath/top.php";
	printPages($paths, $tppath);
	require "$tppath/bottom.php";
?>
