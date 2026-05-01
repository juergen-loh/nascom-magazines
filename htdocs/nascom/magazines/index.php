<?php
	$title = "Nascom Magazines";
	if (!isset($tppath)) $tppath = ".";
	if (!isset($pre)) $pre = "";
	if (!isset($post)) $post = "";
	$desc =
		"This is an overall table of contents of "
	.	"<a href=\"$pre"."issues/\">English Nascom magazines</a>, "
	.	"published between 1978 and 1989."
	.	"</p>\n\t<p>"
	.	"There is also an "
	.	"<a href=\"$pre../journal/$post\">overall table of contents</a> of "
	.	"<a href=\"$pre../\">German Nascom publications</a>.";
	$bottom =
		"80-BUS publications spanned nearly 12 years from simple Z80 computers "
	.	"to the rise of IBM PC compatibles. Here ends the 8 bit era.";
	if (!isset($ipath)) $ipath = ".";

	$paths = array(
		"$ipath/inmc-news/01"
	,	"$ipath/inmc-news/02"
	,	"$ipath/inmc-news/03"
	,	"$ipath/inmc-news/04"
	,	"$ipath/inmc-news/05"
	,	"$ipath/inmc-news/06"
	,	"$ipath/inmc-news/07"

	,	"$ipath/inmc-80-news/01"
	,	"$ipath/inmc-80-news/02"
	,	"$ipath/inmc-80-news/03"
	,	"$ipath/inmc-80-news/04"
	,	"$ipath/inmc-80-news/05"

	,	"$ipath/micropower/11"
	,	"$ipath/micropower/12"
	,	"$ipath/micropower/13"
	,	"$ipath/micropower/14"
	,	"$ipath/micropower/21"
	,	"$ipath/micropower/22"
	,	"$ipath/micropower/23"
	,	"$ipath/micropower/24"

	,	"$ipath/80-bus-news/11"
	,	"$ipath/80-bus-news/12"
	,	"$ipath/80-bus-news/13"
	,	"$ipath/80-bus-news/14"
	,	"$ipath/80-bus-news/21"
	,	"$ipath/80-bus-news/22"
	,	"$ipath/80-bus-news/23"
	,	"$ipath/80-bus-news/24"
	,	"$ipath/80-bus-news/25"
	,	"$ipath/80-bus-news/26"
	,	"$ipath/80-bus-news/31"
	,	"$ipath/80-bus-news/32"
	,	"$ipath/80-bus-news/33"
	,	"$ipath/80-bus-news/34"
	,	"$ipath/80-bus-news/35"
	,	"$ipath/80-bus-news/36"
	,	"$ipath/80-bus-news/41"
	,	"$ipath/80-bus-news/42"

	,	"$ipath/nascom-newsletter/25"
	,	"$ipath/nascom-newsletter/26"
	,	"$ipath/nascom-newsletter/31"
	,	"$ipath/nascom-newsletter/32"
	,	"$ipath/nascom-newsletter/33"
	,	"$ipath/nascom-newsletter/34"
	,	"$ipath/nascom-newsletter/35"

	,	"$ipath/scorpio-news/11"
	,	"$ipath/scorpio-news/12"
	,	"$ipath/scorpio-news/13"
	,	"$ipath/scorpio-news/14"
	,	"$ipath/scorpio-news/21"
	,	"$ipath/scorpio-news/22"
	,	"$ipath/scorpio-news/23"
	,	"$ipath/scorpio-news/24"
	,	"$ipath/scorpio-news/31"
	);

	require "$tppath/top.php";
	printPages($paths, $tppath);
	require "$tppath/bottom.php";
?>
