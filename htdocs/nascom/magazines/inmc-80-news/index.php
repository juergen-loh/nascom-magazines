<?php
	$title = "INMC 80 News";
	if (!isset($tppath)) $tppath = "..";
	if (!isset($pre)) $pre = "";
	if (!isset($post)) $post = "";
	$desc = "INMC-80 News was an "
	.	"<a href=\"$pre../issues/\">English Nascom magazine</a>, "
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
	include "$tppath/top.php";

	$path = "$ipath/01";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/02";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/03";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/04";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/05";	include "$path/content.php";

	include "$tppath/bottom.php"
?>
