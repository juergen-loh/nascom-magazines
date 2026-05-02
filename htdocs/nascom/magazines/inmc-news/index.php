<?php
	$title = "INMC News";
	if (!isset($tppath)) $tppath = "..";
	if (!isset($pre)) $pre = "";
	if (!isset($post)) $post = "";
	$desc = "INMC News was an "
	.	"<a href=\"$pre../issues/#inmc-news\">English Nascom magazine</a>, "
	.	"published between 1978 and 1980. "
	.	"It was the original magazine to support the Nascom product range."
	.	"</p>\n<p>"
	.	"After Nascom&rsquo;s financial difficulties, INMC News was re-born as a magazine called "
	.	"<a href=\"$pre../inmc-80-news/$post\">INMC 80 News</a>.";
	$bottom = "After Nascom&rsquo;s financial difficulties, INMC News was re-born as a magazine called "
	.	"<a href=\"$pre../inmc-80-news/$post\">INMC 80 News</a>.";
	if (isset($ipath)) $path = $ipath; else $path = $ipath = ".";
	$pict = "logo.jpeg";

	$paths = [
		"$ipath/01"
	,	"$ipath/02"
	,	"$ipath/03"
	,	"$ipath/04"
	,	"$ipath/05"
	,	"$ipath/06"
	,	"$ipath/07"
	];

	require "$tppath/top.php";
	printPages($paths, $tppath);
	require "$tppath/bottom.php";
?>
