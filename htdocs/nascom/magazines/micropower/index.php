<?php
	$title = "Micropower";
	if (!isset($tppath)) $tppath = "..";
	if (!isset($pre)) $pre = "";
	if (!isset($post)) $post = "";
	$desc = "Micropower was an "
	.	"<a href=\"$pre../issues/#micropower\">English Nascom magazine</a>, "
	.	"published between 1981 and 1982, in parallel to "
	.	"<a href=\"$pre../inmc-80-news/$post\">INMC 80 News</a> and "
	.	"<a href=\"$pre../80-bus-news/$post\">80-Bus News</a>."
	.	"</p>\n<p>"
	.	"Micropower became the "
	.	"<a href=\"$pre../nascom-newsletter/$post\">Nascom Newsletter</a> with the original issue numbers.";
	$bottom = "Micropower became the "
	.	"<a href=\"$pre../nascom-newsletter/$post\">Nascom Newsletter</a> with the original issue numbers.";
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
	];

	require "$tppath/top.php";
	printPages($paths, $tppath);
	require "$tppath/bottom.php";
?>
