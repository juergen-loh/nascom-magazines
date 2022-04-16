<?php
	$title = "INMC News";
	if (!isset($tppath)) $tppath = "..";
	if (!isset($pre)) $pre = "";
	if (!isset($post)) $post = "";
	$desc = "INMC News was an "
	.	"<a href=\"$pre../issues/\">English Nascom magazine</a>, "
	.	"published between 1978 and 1980. "
	.	"It was the original magazine to support the Nascom product range."
	.	"</p>\n<p>"
	.	"After Nascom&rsquo;s financial difficulties, INMC News was re-born as a magazine called "
	.	"<a href=\"$pre../inmc-80-news/$post\">INMC 80 News</a>.";
	$bottom = "After Nascom&rsquo;s financial difficulties, INMC News was re-born as a magazine called "
	.	"<a href=\"$pre../inmc-80-news/$post\">INMC 80 News</a>.";
	if (isset($ipath)) $path = $ipath; else $path = $ipath = ".";
	$pict = "logo.jpeg";
	include "$tppath/top.php";

	$path = "$ipath/01";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/02";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/03";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/04";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/05";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/06";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "$ipath/07";	include "$path/content.php";

	include "$tppath/bottom.php"
?>
