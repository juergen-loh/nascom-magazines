<?php
	require			( "../../SetIncludePath.php");
	SetIncludePath	( "../..");
//	$include_path	= "../../../cgi-bin";
	$gHtmlRoot		= "../..";
	require "$include_path/global.php";
	httpLastModified(array_merge(get_included_files(), array($navi_head_php, $navi_body_php, $navi_footer_php)), $lastModified);
	$nascom = true;
	include "$navi_head_php";
?>
	<meta name="keywords" content="Nascom ROM Basic 4.7, Microsoft BASIC, Nascom Computer, Nascom 1, Nascom 2">
	<title>Nascom ROM Basic</title>
	<!-- $Date: 2026-04-26 19:37:10 +0200 (So, 26. Apr 2026) $ / <?php echo "$lastModified"; ?> -->
	<link rel="stylesheet" type="text/css" href="../magazines/80-bus-news/style.css">
<?php include "$navi_body_php"; ?>

<?php
//---------------------------------------------------------------------------

$lang = "en";
$RomBasicComplete = true;
$RomBasicClass = "";

//---------------------------------------------------------------------------

function DoublePageStart($class)
{
	global $RomBasicClass, $lang;
	if ($RomBasicClass == "") {
		echo "<div class=\"$class\" lang=\"$lang\">\n";
		$RomBasicClass = $class;
	}
}

function DoublePageChange()
{
	hLine("100%", "2");
}

function DoublePageEnd()
{
	DoublePageChange();
}

//---------------------------------------------------------------------------

include "../magazines/80-bus-news/23/27.html";
include "../magazines/80-bus-news/23/28.html";
include "../magazines/80-bus-news/23/29.html";
include "../magazines/80-bus-news/23/30.html";
include "../magazines/80-bus-news/23/31.html";
include "../magazines/80-bus-news/23/32.html";
include "../magazines/80-bus-news/23/33.html";
include "../magazines/80-bus-news/23/34.html";
include "../magazines/80-bus-news/23/35.html";

include "../magazines/80-bus-news/24/23.html";
include "../magazines/80-bus-news/24/24.html";
include "../magazines/80-bus-news/24/25.html";
include "../magazines/80-bus-news/24/26.html";
include "../magazines/80-bus-news/24/27.html";
include "../magazines/80-bus-news/24/28.html";
include "../magazines/80-bus-news/24/29.html";
include "../magazines/80-bus-news/24/30.html";
include "../magazines/80-bus-news/24/31.html";
include "../magazines/80-bus-news/24/32.html";
include "../magazines/80-bus-news/24/33.html";
include "../magazines/80-bus-news/24/34.html";

include "../magazines/80-bus-news/25/31.html";
include "../magazines/80-bus-news/25/32.html";
include "../magazines/80-bus-news/25/33.html";
include "../magazines/80-bus-news/25/34.html";
include "../magazines/80-bus-news/25/35.html";
include "../magazines/80-bus-news/25/36.html";
include "../magazines/80-bus-news/25/37.html";
include "../magazines/80-bus-news/25/38.html";

include "../magazines/80-bus-news/26/31.html";
include "../magazines/80-bus-news/26/32.html";
include "../magazines/80-bus-news/26/33.html";
include "../magazines/80-bus-news/26/34.html";
include "../magazines/80-bus-news/26/35.html";
include "../magazines/80-bus-news/26/36.html";
include "../magazines/80-bus-news/26/37.html";
include "../magazines/80-bus-news/26/38.html";

include "../magazines/80-bus-news/31/23.html";
include "../magazines/80-bus-news/31/24.html";
include "../magazines/80-bus-news/31/25.html";
include "../magazines/80-bus-news/31/26.html";
include "../magazines/80-bus-news/31/27.html";
include "../magazines/80-bus-news/31/28.html";
include "../magazines/80-bus-news/31/29.html";
include "../magazines/80-bus-news/31/30.html";
include "../magazines/80-bus-news/31/31.html";
include "../magazines/80-bus-news/31/32.html";
include "../magazines/80-bus-news/31/33.html";
include "../magazines/80-bus-news/31/34.html";

include "../magazines/80-bus-news/32/23.html";
include "../magazines/80-bus-news/32/24.html";
include "../magazines/80-bus-news/32/25.html";
include "../magazines/80-bus-news/32/26.html";
include "../magazines/80-bus-news/32/27.html";
include "../magazines/80-bus-news/32/28.html";
include "../magazines/80-bus-news/32/29.html";
include "../magazines/80-bus-news/32/30.html";

include "../magazines/80-bus-news/33/23.html";
include "../magazines/80-bus-news/33/24.html";
include "../magazines/80-bus-news/33/25.html";
include "../magazines/80-bus-news/33/26.html";
include "../magazines/80-bus-news/33/27.html";
include "../magazines/80-bus-news/33/28.html";
include "../magazines/80-bus-news/33/29.html";
include "../magazines/80-bus-news/33/30.html";

echo "</div>";
?>
<br>
<?php /*	bottomGap();	*/ ?>
<?php	include "$navi_footer_php";	?>
