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
	require "$tppath/top.php";

	$path = "$ipath/01";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/02";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/03";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/04";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/05";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/06";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/07";	require "$path/content.php";

	require "$tppath/bottom.php"
?>
