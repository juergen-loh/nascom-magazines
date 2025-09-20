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
	include "$tppath/top.php";

	$path = "$ipath/11";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/12";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/13";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/14";	include "$path/content.php";	include "$tppath/gap.php";

	$path = "$ipath/21";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/22";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/23";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/24";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/25";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/26";	include "$path/content.php";	include "$tppath/gap.php";

	$path = "$ipath/31";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/32";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/33";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/34";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/35";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/36";	include "$path/content.php";	include "$tppath/gap.php";

	$path = "$ipath/41";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/42";	include "$path/content.php";

	include "$tppath/bottom.php"
?>
