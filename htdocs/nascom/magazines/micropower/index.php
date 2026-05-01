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
	require "$tppath/top.php";

	$path = "$ipath/11";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/12";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/13";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/14";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/21";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/22";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/23";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/24";	require "$path/content.php";

	require "$tppath/bottom.php"
?>
