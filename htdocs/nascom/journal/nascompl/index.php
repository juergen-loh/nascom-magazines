<?php
	require			( "../../../SetIncludePath.php");
	SetIncludePath	( "../../..");
//	$include_path	= "../../../../cgi-bin";
	$gHtmlRoot		= "../../..";
	require "$include_path/global.php";
//	$width = 700;
	httpLastModified(array_merge(get_included_files(), array($navi_head_php, $navi_body_php, $navi_footer_php)), $lastModified);
	$nascom = true;
	include "$navi_head_php";
?>
	<meta name="keywords" content="NASCOMPL, Nascom Journal, 80-Bus Journal, Nascom Computer">
	<title>NASCOMPL</title>
	<!-- $Date: 2024-12-29 12:50:24 +0100 (So, 29. Dez 2024) $ / <?php echo "$lastModified"; ?> -->

<?php
//	echo "\t<style type=\"text/css\">a:hover { background:#fff; color: #000000; }</style>\n";

	include "$navi_body_php";

function nascomplInsert($year, $issue, $page, $file)
{
//	imagelink("", "../$year/$issue/$page/", "../$year/$issue/$file", "NASCOMPL");

	$size = 200;
	$space = (int) ($size / 10);
	$alt = imageDesc($year, $issue, $page, $file);
	
	$imagename = "../$year/$issue/$file";
	list($width, $height, $type, $attr) = getimagesize($imagename);
	if ($width > $height) {
		$newWidth = $size;
		$newHeight = (int) (($height * $size) / $width);
	} else {
		$newWidth = (int) (($width * $size) / $height);
		$newHeight = $size;
	}
	$limit="width=$newWidth height=$newHeight";
	if ((int) $year <= 82) {
		$magazine = "Nascom Journal";
	} else {
		$magazine = "80-Bus Journal";
	}

	echo "<a href=\"../$year/$issue/$page/text/#nascompl\" ";
	echo "title=\"NASCOMPL im $magazine ", $issue == "m1" ? "M1" : (int) $issue, "/$year auf Seite ", (int) $page;
	echo "\">";
	echo "<img src=\"$imagename\" alt=\"$alt\" $limit style=\"margin-top:$space","px; margin-right:$space","px; vertical-align: middle;\">";
	echo "</a>";

	echo "\n";
}

	echo "<h1 id=\"head\">\n\t";
	imageInsert("", "82", "10", "07", "../82/10/Image-07-2.jpeg");
	echo "\n</h1>\n"
?>
<p>
	NASCOMPL hieß das Maskottchen des
	<a href="#nascomp-im-nascom-journal">Nascom Journals</a>
	und des
	<a href="#nascomp-im-80-bus-journal">80-Bus Journals</a>.
	Mit seinen
	Kommentaren lockerte es die manchmal doch allzu trockene Materie etwas auf.
	Hier sind alle veröffentlichten NASCOMPL versammelt.
</p>
<?php
//	$nl = "&#32;&#10;";
	echo "<div class=\"noHover\" style=\"text-align: justify\">\n\n";
	echo "<h2 id=\"nascomp-im-nascom-journal\">NASCOMPL im Nascom Journal</h2>\n";

	nascomplInsert("81", "06", "07", "Image-07-2.jpeg");
	nascomplInsert("81", "06", "11", "Image-11-1.jpeg");
	nascomplInsert("81", "06", "14", "Image-14-3.jpeg");
	nascomplInsert("81", "06", "20", "Image-20-3.jpeg");
	nascomplInsert("81", "07", "11", "Image-11-3.jpeg");
	nascomplInsert("81", "07", "13", "Image-13-5.jpeg");
	nascomplInsert("81", "07", "17", "Image-17-2.jpeg");
	nascomplInsert("81", "08", "13", "Image-13-4.jpeg");
	nascomplInsert("81", "08", "19", "Image-19-2.jpeg");
	nascomplInsert("81", "09", "04", "Image-04-2.jpeg");
	nascomplInsert("81", "09", "07", "Image-07-2.jpeg");
	nascomplInsert("81", "09", "13", "Image-13-7.jpeg");
	nascomplInsert("81", "10", "06", "Image-06-2.jpeg");
	nascomplInsert("81", "10", "24", "Image-24-4.jpeg");
	nascomplInsert("81", "10", "27", "Image-27-2.jpeg");
	nascomplInsert("81", "12", "23", "Image-23-2.jpeg");
	nascomplInsert("81", "12", "28", "Image-28-2.jpeg");
	nascomplInsert("81", "12", "40", "Image-40-3.jpeg");
	nascomplInsert("81", "12", "52", "Image-52-3.jpeg");
	nascomplInsert("81", "12", "54", "Image-54-2.jpeg");
	nascomplInsert("82", "01", "07", "Image-07-3.jpeg");
	nascomplInsert("82", "01", "11", "Image-11-2.jpeg");
	nascomplInsert("82", "01", "25", "Image-25-1.jpeg");
	nascomplInsert("82", "01", "35", "Image-35-2.jpeg");
	nascomplInsert("82", "02", "17", "Image-17-4.jpeg");
	nascomplInsert("82", "02", "21", "Image-21-2.jpeg");
	nascomplInsert("82", "02", "26", "Image-26-4.jpeg");
	nascomplInsert("82", "02", "30", "Image-30-2.jpeg");
	nascomplInsert("82", "03", "22", "Image-22-5.jpeg");
	nascomplInsert("82", "03", "35", "Image-35-4.jpeg");
	nascomplInsert("82", "03", "51", "Image-51-2.jpeg");
	nascomplInsert("82", "05", "23", "Image-23-2.jpeg");
	nascomplInsert("82", "05", "31", "Image-31-2.jpeg");
	nascomplInsert("82", "06", "19", "Image-19-3.jpeg");
	nascomplInsert("82", "06", "23", "Image-23-2.jpeg");
	nascomplInsert("82", "07", "05", "Image-05-2.jpeg");
	nascomplInsert("82", "07", "08", "Image-08-1.jpeg");
	nascomplInsert("82", "07", "43", "Image-43-2.jpeg");
	nascomplInsert("82", "07", "59", "Image-59-2.jpeg");
	nascomplInsert("82", "09", "11", "Image-11-5.jpeg");
	nascomplInsert("82", "09", "13", "Image-13-3.jpeg");
	nascomplInsert("82", "10", "07", "Image-07-3.jpeg");
	nascomplInsert("82", "10", "23", "Image-23-2.jpeg");
	nascomplInsert("82", "10", "24", "Image-24-1.jpeg");

	echo "<br><br>\n\n<!-- Linie über ganze Spalte --><table style=\"width: 100%\"><tr><td style=\"height: 4px\"></td></tr><tr><td style=\"border-top:1px solid #000\"><p style=\"font-size:1px\">&nbsp;</p></td></tr><tr><td style=\"height: 2px\"></td></tr></table>\n";
	echo "<h2 id=\"nascomp-im-80-bus-journal\">NASCOMPL im 80-Bus Journal</h2>\n";

	nascomplInsert("83", "01", "11", "Image-11-1.jpeg");
	nascomplInsert("83", "01", "14", "Image-14-2.jpeg");
	nascomplInsert("83", "01", "16", "Image-16-1.jpeg");
	nascomplInsert("83", "02", "07", "Image-07-1.jpeg");
	nascomplInsert("83", "02", "16", "Image-16-2.jpeg");
	nascomplInsert("83", "02", "23", "Image-23-1.jpeg");
	nascomplInsert("83", "02", "27", "Image-27-1.jpeg");
	nascomplInsert("83", "03", "02", "Image-02-2.jpeg");
	nascomplInsert("83", "03", "04", "Image-04-1.jpeg");
	nascomplInsert("83", "03", "11", "Image-11-3.jpeg");
	nascomplInsert("83", "04", "03", "Image-03-5.jpeg");
	nascomplInsert("83", "04", "11", "Image-11-4.jpeg");
	nascomplInsert("83", "04", "19", "Image-19-5.jpeg");
	nascomplInsert("83", "04", "20", "Image-20-1.jpeg");
	nascomplInsert("83", "04", "26", "Image-26-2.jpeg");
	nascomplInsert("83", "05", "04", "Image-04-1.jpeg");
	nascomplInsert("83", "05", "16", "Image-16-1.jpeg");
	nascomplInsert("83", "05", "21", "Image-21-2.jpeg");
//	nascomplInsert("83", "06", "01", "Image-01-2.jpeg");
	nascomplInsert("83", "06", "10", "Image-10-2.jpeg");
	nascomplInsert("83", "06", "26", "Image-26-2.jpeg");
	nascomplInsert("83", "07", "07", "Image-07-2.jpeg");
	nascomplInsert("83", "07", "07", "Image-07-3.jpeg");
	nascomplInsert("83", "07", "07", "Image-07-4.jpeg");
	nascomplInsert("83", "07", "12", "Image-12-3.jpeg");
	nascomplInsert("83", "07", "38", "Image-38-2.jpeg");
	nascomplInsert("83", "07", "48", "Image-48-3.jpeg");
	nascomplInsert("83", "09", "05", "Image-05-1.jpeg");
	nascomplInsert("83", "09", "19", "Image-19-1.jpeg");
	nascomplInsert("83", "09", "26", "Image-26-2.jpeg");
	nascomplInsert("83", "11", "11", "Image-11-1.jpeg");
	nascomplInsert("83", "11", "15", "Image-15-4.jpeg");
	nascomplInsert("83", "11", "40", "Image-40-1.jpeg");
	nascomplInsert("83", "11", "43", "Image-43-3.jpeg");
	nascomplInsert("83", "12", "08", "Image-08-3.jpeg");
	nascomplInsert("83", "12", "26", "Image-26-2.jpeg");
//	nascomplInsert("84", "m1", "01", "Image-01-2.jpeg");
	nascomplInsert("84", "m1", "03", "Image-05-2.jpeg");
//	nascomplInsert("84", "m1", "12", "Image-12-1.jpeg");
	nascomplInsert("84", "01", "18", "Image-18-4.jpeg");
	nascomplInsert("84", "01", "26", "Image-26-6.jpeg");
	nascomplInsert("84", "01", "26", "Image-26-7.jpeg");
	nascomplInsert("84", "01", "35", "Image-35-2.jpeg");
	nascomplInsert("84", "02", "06", "Image-06-1.jpeg");
	nascomplInsert("84", "02", "26", "Image-26-2.jpeg");
	nascomplInsert("84", "02", "38", "Image-38-4.jpeg");
	nascomplInsert("84", "02", "45", "Image-45-3.jpeg");
//	nascomplInsert("84", "m2", "01", "Image-01-2.jpeg");
//	nascomplInsert("84", "m2", "08", "Image-08-1.jpeg");
//	nascomplInsert("84", "03", "01", "Image-01-2.jpeg");
	nascomplInsert("84", "03", "15", "Image-15-1.jpeg");
	nascomplInsert("84", "04", "15", "Image-15-1.jpeg");
	nascomplInsert("84", "04", "28", "Image-28-1.jpeg");
	nascomplInsert("84", "04", "36", "Image-36-1.png");
//	nascomplInsert("84", "04", "46", "Image-46-3.jpeg");
//	nascomplInsert("85", "m3", "01", "Image-01-2.jpeg");

//	echo "\n</p></td></tr></table>\n";
	echo "<br><br>\n\n";

	echo "</div>\n";
//	echo "</td></tr></table>\n";

	include "$navi_footer_php";
?>
