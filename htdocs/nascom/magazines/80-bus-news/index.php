<?php
	$title = "80-Bus News";
	if (!isset($tppath)) $tppath = "..";
	if (!isset($pre)) $pre = "";
	if (!isset($post)) $post = "";
	$desc = "80-Bus News was an "
	.	"<a href=\"$pre../issues/#80-bus-news\">English Nascom magazine</a>, "
	.	"published between 1982 and 1985. "
	.	"It was the successor of "
	.	"<a href=\"$pre../inmc-80-news/$post\">INMC 80 News</a>."
	.	"</p>\n<p>"
	.	"80-Bus News changed once again and became "
	.	"<a href=\"$pre../scorpio-news/$post\">Scorpio News</a>.";
	$bottom = "80-Bus News changed once again and became "
	.	"<a href=\"$pre../scorpio-news/$post\">Scorpio News</a>.";
	if (isset($ipath)) $path = $ipath; else $path = $ipath = ".";
	$pict = "logo.jpeg";
	$paths = array(
		"$ipath/11"
	,	"$ipath/12"
	,	"$ipath/13"
	,	"$ipath/14"

	,	"$ipath/21"
	,	"$ipath/22"
	,	"$ipath/23"
	,	"$ipath/24"
	,	"$ipath/25"
	,	"$ipath/26"

	,	"$ipath/31"
	,	"$ipath/32"
	,	"$ipath/33"
	,	"$ipath/34"
	,	"$ipath/35"
	,	"$ipath/36"

	,	"$ipath/41"
	,	"$ipath/42"
	);
	require "$tppath/top.php";

	$path = "$ipath/11";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/12";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/13";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/14";	require "$path/content.php";	require "$tppath/gap.php";

	$path = "$ipath/21";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/22";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/23";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/24";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/25";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/26";	require "$path/content.php";	require "$tppath/gap.php";

	$path = "$ipath/31";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/32";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/33";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/34";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/35";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/36";	require "$path/content.php";	require "$tppath/gap.php";

	$path = "$ipath/41";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/42";	require "$path/content.php";

	require "$tppath/bottom.php"
?>
