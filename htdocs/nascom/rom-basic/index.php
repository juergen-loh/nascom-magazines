<?php
	require			( "../../SetIncludePath.php");
	SetIncludePath	( "../..");
//	$include_path	= "../../../cgi-bin";
	$gHtmlRoot		= "../..";
	require "$include_path/global.php";

	$pages = array(
		"../magazines/80-bus-news/23/27.html"
	,	"../magazines/80-bus-news/23/28.html"
	,	"../magazines/80-bus-news/23/29.html"
	,	"../magazines/80-bus-news/23/30.html"
	,	"../magazines/80-bus-news/23/31.html"
	,	"../magazines/80-bus-news/23/32.html"
	,	"../magazines/80-bus-news/23/33.html"
	,	"../magazines/80-bus-news/23/34.html"
	,	"../magazines/80-bus-news/23/35.html"

	,	"../magazines/80-bus-news/24/23.html"
	,	"../magazines/80-bus-news/24/24.html"
	,	"../magazines/80-bus-news/24/25.html"
	,	"../magazines/80-bus-news/24/26.html"
	,	"../magazines/80-bus-news/24/27.html"
	,	"../magazines/80-bus-news/24/28.html"
	,	"../magazines/80-bus-news/24/29.html"
	,	"../magazines/80-bus-news/24/30.html"
	,	"../magazines/80-bus-news/24/31.html"
	,	"../magazines/80-bus-news/24/32.html"
	,	"../magazines/80-bus-news/24/33.html"
	,	"../magazines/80-bus-news/24/34.html"

	,	"../magazines/80-bus-news/25/31.html"
	,	"../magazines/80-bus-news/25/32.html"
	,	"../magazines/80-bus-news/25/33.html"
	,	"../magazines/80-bus-news/25/34.html"
	,	"../magazines/80-bus-news/25/35.html"
	,	"../magazines/80-bus-news/25/36.html"
	,	"../magazines/80-bus-news/25/37.html"
	,	"../magazines/80-bus-news/25/38.html"

	,	"../magazines/80-bus-news/26/31.html"
	,	"../magazines/80-bus-news/26/32.html"
	,	"../magazines/80-bus-news/26/33.html"
	,	"../magazines/80-bus-news/26/34.html"
	,	"../magazines/80-bus-news/26/35.html"
	,	"../magazines/80-bus-news/26/36.html"
	,	"../magazines/80-bus-news/26/37.html"
	,	"../magazines/80-bus-news/26/38.html"

	,	"../magazines/80-bus-news/31/23.html"
	,	"../magazines/80-bus-news/31/24.html"
	,	"../magazines/80-bus-news/31/25.html"
	,	"../magazines/80-bus-news/31/26.html"
	,	"../magazines/80-bus-news/31/27.html"
	,	"../magazines/80-bus-news/31/28.html"
	,	"../magazines/80-bus-news/31/29.html"
	,	"../magazines/80-bus-news/31/30.html"
	,	"../magazines/80-bus-news/31/31.html"
	,	"../magazines/80-bus-news/31/32.html"
	,	"../magazines/80-bus-news/31/33.html"
	,	"../magazines/80-bus-news/31/34.html"

	,	"../magazines/80-bus-news/32/23.html"
	,	"../magazines/80-bus-news/32/24.html"
	,	"../magazines/80-bus-news/32/25.html"
	,	"../magazines/80-bus-news/32/26.html"
	,	"../magazines/80-bus-news/32/27.html"
	,	"../magazines/80-bus-news/32/28.html"
	,	"../magazines/80-bus-news/32/29.html"
	,	"../magazines/80-bus-news/32/30.html"

	,	"../magazines/80-bus-news/33/23.html"
	,	"../magazines/80-bus-news/33/24.html"
	,	"../magazines/80-bus-news/33/25.html"
	,	"../magazines/80-bus-news/33/26.html"
	,	"../magazines/80-bus-news/33/27.html"
	,	"../magazines/80-bus-news/33/28.html"
	,	"../magazines/80-bus-news/33/29.html"
	,	"../magazines/80-bus-news/33/30.html"
	);

	httpLastModified(array_merge(get_included_files(), $pages, array($navi_head_php, $navi_body_php, $navi_footer_php)), $lastModified);
	$nascom = true;
	require "$navi_head_php";
?>
	<meta name="keywords" content="Nascom ROM Basic 4.7, Microsoft BASIC, Nascom Computer, Nascom 1, Nascom 2">
	<title>Nascom ROM Basic</title>
	<!-- $Date: 2026-05-01 16:23:20 +0200 (Fr, 01. Mai 2026) $ / <?php echo "lastModified: $lastModified"; ?> -->
	<link rel="stylesheet" type="text/css" href="../magazines/80-bus-news/style.css">
<?php require "$navi_body_php"; ?>

<?php
//---------------------------------------------------------------------------

$lang = "en";
$RomBasicComplete = true;

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
	global $RomBasicClass;
	if ($RomBasicClass != "") {
		DoublePageChange();
	}
}

//---------------------------------------------------------------------------

	$count = count($pages);
	for ($i = 0; $i < $count; $i++) {
		require $pages[$i];
	}

//---------------------------------------------------------------------------

echo "</div>";
?>
<br>
<?php /*	bottomGap();	*/ ?>
<?php	require "$navi_footer_php";	?>
