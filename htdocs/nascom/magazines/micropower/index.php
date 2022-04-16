<?php
	$title = "Micropower";
	if (!isset($tppath)) $tppath = "..";
	if (!isset($pre)) $pre = "";
	if (!isset($post)) $post = "";
	$desc = "Micropower was an "
	.	"<a href=\"$pre../issues/\">English Nascom magazine</a>, "
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
	include "$tppath/top.php";

	$path = "$ipath/11";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/12";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/13";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/14";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/21";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/22";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/23";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/24";	include "$path/content.php";

	include "$tppath/bottom.php"
?>
