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

	require "$tppath/top.php";

	$path = "$ipath/inmc-news/01";			require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/inmc-news/02";			require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/inmc-news/03";			require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/inmc-news/04";			require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/inmc-news/05";			require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/inmc-news/06";			require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/inmc-news/07";			require "$path/content.php";	require "$tppath/gap.php";

	$path = "$ipath/inmc-80-news/01";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/inmc-80-news/02";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/inmc-80-news/03";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/inmc-80-news/04";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/inmc-80-news/05";		require "$path/content.php";	require "$tppath/gap.php";

	$path = "$ipath/micropower/11";			require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/micropower/12";			require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/micropower/13";			require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/micropower/14";			require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/micropower/21";			require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/micropower/22";			require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/micropower/23";			require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/micropower/24";			require "$path/content.php";	require "$tppath/gap.php";

	$path = "$ipath/80-bus-news/11";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/80-bus-news/12";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/80-bus-news/13";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/80-bus-news/14";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/80-bus-news/21";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/80-bus-news/22";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/80-bus-news/23";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/80-bus-news/24";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/80-bus-news/25";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/80-bus-news/26";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/80-bus-news/31";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/80-bus-news/32";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/80-bus-news/33";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/80-bus-news/34";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/80-bus-news/35";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/80-bus-news/36";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/80-bus-news/41";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/80-bus-news/42";		require "$path/content.php";	require "$tppath/gap.php";

	$path = "$ipath/nascom-newsletter/25";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/nascom-newsletter/26";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/nascom-newsletter/31";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/nascom-newsletter/32";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/nascom-newsletter/33";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/nascom-newsletter/34";	require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/nascom-newsletter/35";	require "$path/content.php";	require "$tppath/gap.php";

	$path = "$ipath/scorpio-news/11";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/scorpio-news/12";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/scorpio-news/13";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/scorpio-news/14";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/scorpio-news/21";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/scorpio-news/22";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/scorpio-news/23";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/scorpio-news/24";		require "$path/content.php";	require "$tppath/gap.php";
	$path = "$ipath/scorpio-news/31";		require "$path/content.php";

	require "$tppath/bottom.php";
?>
