<?php
	$tail = "";
	$title = "INMC News";
	$tppath = "..";
	$desc = 'INMC News was an '
	.	'<a href="../issues/">English Nascom magazine</a>, '
	.	'published between 1978 and 1980. '
	.	'It was the original magazine to support the Nascom product range.'
	.	"</p>\n<p>"
	.	"After Nascom&rsquo;s financial difficulties, INMC News was re-born as a magazine called <a href=\"../inmc-80-news/\">INMC 80 News</a>.";
	$bottom = "After Nascom&rsquo;s financial difficulties, INMC News was re-born as a magazine called <a href=\"../inmc-80-news/\">INMC 80 News</a>.";
	$path = ".";
	$pict = "logo.jpeg";
	include "$tppath/top.php";

	$path = "./01";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./02";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./03";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./04";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./05";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./06";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./07";	include "$path/content.php";

	include "$tppath/bottom.php"
?>
