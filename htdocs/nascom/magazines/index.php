<?php
	$tail = "";
	$title = "Nascom Magazines";
	$tppath = ".";
	$desc =
		'This is an overall table of contents of '
	.	'<a href="issues/">English Nascom magazines</a>, '
	.	"published between 1979 and 1989.</p>\n\t<p>"
	.	'There is also an <a href="../journal/text/">overall table of contents</a> of '
	.	'<a href="../">German Nascom publications</a>.';
	$bottom =
		"80-BUS publications spanned nearly 12 years from simple Z80 computers to the rise "
	.	"of IBM PC compatibles. Here ends the 8 bit era.";

	include "$tppath/top.php";

	$path = "./inmc-news/01";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./inmc-news/02";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./inmc-news/03";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./inmc-news/04";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./inmc-news/05";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./inmc-news/06";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./inmc-news/07";			include "$path/content.php";	include "$tppath/gap.php";

	$path = "./inmc-80-news/01";		include "$path/content.php";	include "$tppath/gap.php";
	$path = "./inmc-80-news/02";		include "$path/content.php";	include "$tppath/gap.php";
	$path = "./inmc-80-news/03";		include "$path/content.php";	include "$tppath/gap.php";
	$path = "./inmc-80-news/04";		include "$path/content.php";	include "$tppath/gap.php";
	$path = "./inmc-80-news/05";		include "$path/content.php";	include "$tppath/gap.php";

	$path = "./micropower/11";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./micropower/12";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./micropower/13";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./micropower/14";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./micropower/21";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./micropower/22";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./micropower/23";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./micropower/24";			include "$path/content.php";	include "$tppath/gap.php";

	$path = "./80-bus-news/11";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./80-bus-news/12";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./80-bus-news/13";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./80-bus-news/14";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./80-bus-news/21";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./80-bus-news/22";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./80-bus-news/23";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./80-bus-news/24";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./80-bus-news/25";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./80-bus-news/26";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./80-bus-news/31";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./80-bus-news/32";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./80-bus-news/33";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./80-bus-news/34";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./80-bus-news/35";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./80-bus-news/36";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./80-bus-news/41";			include "$path/content.php";	include "$tppath/gap.php";
	$path = "./80-bus-news/42";			include "$path/content.php";	include "$tppath/gap.php";

	$path = "./nascom-newsletter/25";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./nascom-newsletter/26";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./nascom-newsletter/31";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./nascom-newsletter/32";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./nascom-newsletter/33";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./nascom-newsletter/34";	include "$path/content.php";	include "$tppath/gap.php";
	$path = "./nascom-newsletter/35";	include "$path/content.php";	include "$tppath/gap.php";

	$path = "./scorpio-news/11";		include "$path/content.php";	include "$tppath/gap.php";
	$path = "./scorpio-news/12";		include "$path/content.php";	include "$tppath/gap.php";
	$path = "./scorpio-news/13";		include "$path/content.php";	include "$tppath/gap.php";
	$path = "./scorpio-news/14";		include "$path/content.php";	include "$tppath/gap.php";
	$path = "./scorpio-news/21";		include "$path/content.php";	include "$tppath/gap.php";
	$path = "./scorpio-news/22";		include "$path/content.php";	include "$tppath/gap.php";
	$path = "./scorpio-news/23";		include "$path/content.php";	include "$tppath/gap.php";
	$path = "./scorpio-news/24";		include "$path/content.php";	include "$tppath/gap.php";
	$path = "./scorpio-news/31";		include "$path/content.php";

	include "$tppath/bottom.php";
?>
