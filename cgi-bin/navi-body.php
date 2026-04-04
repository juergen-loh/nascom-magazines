<!-- navi-body.php -->
</head>

<?php

$nl = "&#32;&#10;";
$asTitle = "~";		// ALT-Text von Bildern als TITLE sichtbar machen
$gWidth = 750;

// Globale Funktionen
// ------------------
function BootstrapTier($context = "")
{
	switch ($context) {
//					return "xs";	// Phone
	case "":
	case "Bottom":
					return "sm";	// Tablet
	case "NavTop":
	case "TOC":
	case "Title":
	case "Thumb":
	case "NaviBottom":
					return "md";	// Desktop
//					return "lg";	// Larger Desktops
	default:		exit;
	}
}

function imageInsert($imagepath, $year, $issue, $page, $imagename, $style="", $class="", $append="", $link="", $target="", $scale=1, $noscale=false)
{
	global $magpath, $issuepath, $gWidth, $asTitle;

	$alt = imageDesc($year, $issue, $imagename);
	if (isset($magpath)) {
		list($width, $height, $type, $attr) = getimagesize("$magpath/$issuepath/$imagename");
	} else {
		list($width, $height, $type, $attr) = getimagesize($imagename);
	}
	if ($link != "") {
		echo "<a href=\"$link\"";
		if ($target != "") {
			echo " target=\"$target\"";
		}
		echo ">";
	}
	// nascom journal oder nascom magazines?
	if (isset($magpath)) {
		// nascom magazines
		// ----------------
		// grafiken skalieren auf basis der gescannten seite
		$path_parts = pathinfo($imagename);
		$ext = $path_parts['extension'];
		$scanned = "$magpath/$issuepath/$page.$ext";
		if (!$noscale && file_exists($scanned)) {
			list($iwidth, $iheight, $itype, $iattr) = getimagesize($scanned);
			$factor = $gWidth / $iwidth;
			if ($factor < 1) {
				$width  = (int)($width  * $factor + 0.5);
				$height = (int)($height * $factor + 0.5);
			}
		}
	} else {
		// nascom journal
		// --------------
		if ($year == "80" && $issue <= "03") {
			$width  = (int)($width  * 605 / 946 + 0.5);
			$height = (int)($height * 605 / 946 + 0.5);
		}
	}

	$width  = (int)($width  * $scale + 0.5);
	$height = (int)($height * $scale + 0.5);

	echo "<img";
	if ($style != "") {
		echo " style=\"$style\"";
	}
	echo " class=\"img-fluid";
	if ($class != "") {
		echo " $class";
	}
	echo "\" src=\"$imagepath$imagename\" ";
	$altPos = strpos($alt, $asTitle);
	if ($altPos) {
		$title = substr($alt, $altPos + 1);
		echo "title=\"$title\" ";
		$alt = substr($alt, 0, $altPos);
	}
	echo "alt=\"$alt\" ";
	echo "width=\"$width\" height=\"$height\">";
	if ($link != "") {
		echo "</a>";
	}
	echo "$append\n";	
}

function imagePlain($imagepath, $year, $issue, $page, $imagename, $style="", $class="")
{
	global $magpath, $issuepath;

	$alt = imageDesc($year, $issue, $imagename);
	if (isset($magpath)) {
		list($width, $height, $type, $attr) = getimagesize("$magpath/$issuepath/$imagename");
	} else {
		list($width, $height, $type, $attr) = getimagesize($imagename);
	}
	echo "<img";
	if ($style != "") {
		echo " style=\"$style\"";
	}
	if ($class != "") {
		echo " class=\"$class\"";
	}
	echo " src=\"$imagepath$imagename\" alt=\"$alt\" width=\"$width\" height=\"$height\">";
}

function imageCenter($imagepath, $year, $issue, $page, $imagename, $style="", $class="", $append="")
{
	imageInsert($imagepath, $year, $issue, $page, $imagename, $style, "mx-auto d-block $class", $append);
}

function imageRight($imagepath, $year, $issue, $page, $imagename, $style="", $class="", $append="", $link="", $target="", $scale=1)
{
	echo "<div class=\"text-end\">";
	imageInsert($imagepath, $year, $issue, $page, $imagename, $style, $class, "</div>$append", $link, $target, $scale);
}

function imagelink($imagepath, $imagelink, $imagename, $alt, $class="")
{
	list($width, $height, $type, $attr) = getimagesize($imagename);
	echo "<a href=\"$imagelink\" title=\"$alt\">";
	echo "<img src=\"$imagepath$imagename\" ";
	if ($class != "") {
		echo "class=\"$class\" ";
	}
	echo "alt=\"$alt\" width=\"$width\" height=\"$height\">";
	echo "</a>\n";
}

function figurelink($imagepath, $imagelink, $imagename, $alt, $caption = "&nbsp;")
{
	echo "<figure class=\"figure\">\n\t";
	imagelink($imagepath, $imagelink, $imagename, $alt, "figure-img img-fluid");// rounded");
	echo "\n";
	if ($caption != "") {
		echo "\t<figcaption class=\"figure-caption\">$caption</figcaption>\n";
	}
	echo "</figure>\n";
}

function imageInsertGap($imagepath, $year, $issue, $page, $imagename, $style="", $class="")
{
	// mit einer Zeile Abstand nach dem Bild
	imageInsert($imagepath, $year, $issue, $page, $imagename, $style, $class, "<br><br>");
}

function imageCenterGap($imagepath, $year, $issue, $page, $imagename, $style="", $class="")
{
	// mit einer Zeile Abstand nach dem Bild
	imageCenter($imagepath, $year, $issue, $page, $imagename, $style, $class, "<br>");
}

function imageRightGap($imagepath, $year, $issue, $page, $imagename, $style="", $class="")
{
	// mit einer Zeile Abstand nach dem Bild
	imageRight($imagepath, $year, $issue, $page, $imagename, $style, $class, "<br>");
}

function imageNoscale($imagepath, $year, $issue, $page, $imagename, $style="", $class="")
{
	// unskaliert (magazines)
	imageInsert($imagepath, $year, $issue, $page, $imagename, $style, $class, "", "", "", 1, true);
}

function imageNoscaleGap($imagepath, $year, $issue, $page, $imagename, $style="", $class="")
{
	// unskaliert (magazines), mit einer Zeile Abstand nach dem Bild
	imageInsert($imagepath, $year, $issue, $page, $imagename, $style, $class, "<br><br>", "", "", 1, true);
}

// Journal ------------------------------------------------------------------

function imageInsertJrn($imagename, $style="", $class="")
{
	global $imagepath, $year, $issue, $page;
	imageInsert($imagepath, $year, $issue, $page, $imagename, $style, $class);
}

function imageInsertGapJrn($imagename, $style="", $class="")
{
	global $imagepath, $year, $issue, $page;
	imageInsertGap($imagepath, $year, $issue, $page, $imagename, $style, $class);
}

function imageCenterJrn($imagename, $style="", $class="")
{
	global $imagepath, $year, $issue, $page;
	imageCenter($imagepath, $year, $issue, $page, $imagename, $style, $class);
}

function imageCenterGapJrn($imagename, $style="", $class="")
{
	global $imagepath, $year, $issue, $page;
	imageCenterGap($imagepath, $year, $issue, $page, $imagename, $style, $class);
}

function imageRightJrn($imagename, $style="", $class="")
{
	global $imagepath, $year, $issue, $page;
	imageRight($imagepath, $year, $issue, $page, $imagename, $style, $class);
}

function imageRightGapJrn($imagename, $style="", $class="")
{
	global $imagepath, $year, $issue, $page;
	imageRightGap($imagepath, $year, $issue, $page, $imagename, $style, $class);
}

function imagePlainJrn($imagename, $style="", $class="")
{
	global $imagepath, $year, $issue, $page;
	imagePlain($imagepath, $year, $issue, $page, $imagename, $style, $class);
}

// Magazines ----------------------------------------------------------------

function imageInsertMgz($imagename, $style="", $class="")
{
	global $imagepath, $magpath, $issuepath, $pagepath;
	imageInsert($imagepath, $magpath, $issuepath, $pagepath, $imagename, $style, $class);
}

function imageInsertGapMgz($imagename, $style="", $class="")
{
	global $imagepath, $magpath, $issuepath, $pagepath;
	imageInsertGap($imagepath, $magpath, $issuepath, $pagepath, $imagename, $style, $class);
}

function imageCenterMgz($imagename, $style="", $class="")
{
	global $imagepath, $magpath, $issuepath, $pagepath;
	imageCenter($imagepath, $magpath, $issuepath, $pagepath, $imagename, $style, $class);
}

function imageRightMgz($imagename, $style="", $class="")
{
	global $imagepath, $magpath, $issuepath, $pagepath;
	imageRight($imagepath, $magpath, $issuepath, $pagepath, $imagename, $style, $class);
}

function imageRightGapMgz($imagename, $style="", $class="")
{
	global $imagepath, $magpath, $issuepath, $pagepath;
	imageRightGap($imagepath, $magpath, $issuepath, $pagepath, $imagename, $style, $class);
}

function imageCenterGapMgz($imagename, $style="", $class="")
{
	global $imagepath, $magpath, $issuepath, $pagepath;
	imageCenterGap($imagepath, $magpath, $issuepath, $pagepath, $imagename, $style, $class);
}

function imagePlainMgz($imagename, $style="", $class="")
{
	global $imagepath, $magpath, $issuepath, $pagepath;
	imagePlain($imagepath, $magpath, $issuepath, $pagepath, $imagename, $style, $class);
}

function imageNoscaleGapMgz($imagename, $style="", $class="")
{
	global $imagepath, $magpath, $issuepath, $pagepath;
	imageNoscaleGap($imagepath, $magpath, $issuepath, $pagepath, $imagename, $style, $class);
}

function imageNoscaleMgz($imagename, $style="", $class="")
{
	global $imagepath, $magpath, $issuepath, $pagepath;
	imageNoscale($imagepath, $magpath, $issuepath, $pagepath, $imagename, $style, $class);
}

// --------------------------------------------------------------------------

function InsertArrow($s)
{
/*
// font awesome 4
	echo "<span class=\"fa fa-";
	switch ($s) {
	case "previous-page":	echo "arrow-left";		break;
	case "first-page":		echo "fast-backward";	break;
	case "previous-issue":	echo "backward";		break;
	case "next-issue":		echo "forward";			break;
	case "last-page":		echo "fast-forward";	break;
	case "next-page":		echo "arrow-right";		break;
	}
	echo "\" aria-hidden=true></span>";
*/
/*
// font awesome 5
	$class = $arrow = "";

	switch ($s) {
	case "previous-page":	$arrow = "play";			$class = "mirror-horizontal";	break;
	case "first-page":		$arrow = "fast-forward";	$class = "mirror-horizontal";	break;
	case "previous-issue":	$arrow = "forward";			$class = "mirror-horizontal";	break;
	case "next-issue":		$arrow = "forward";											break;
	case "last-page":		$arrow = "fast-forward";									break;
	case "next-page":		$arrow = "play";											break;
	}

//	echo "<!-- InsertArrow($s) -->";
	echo "<span class=\"$class";
	if ($class != "") {
		echo " ";
	}
	echo "fas fa-$arrow\" aria-hidden=true></span>";
*/
/*
// bootstrap icons
	echo "<img src=\"/cdn/icons/icons/";
	switch ($s) {
	case "previous-page":	echo "chevron-left";			break;
	case "first-page":		echo "chevron-bar-left";		break;
	case "previous-issue":	echo "chevron-double-left";		break;
	case "next-issue":		echo "chevron-double-right";	break;
	case "last-page":		echo "chevron-bar-right";		break;
	case "next-page":		echo "chevron-right";			break;
	}
	echo ".svg\" alt=\"\">";
*/
// bootstrap icons svg
	// https://icons.getbootstrap.com/
	$arrow = "";

	switch ($s) {
	case "previous-page":	$arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-fill svg-arrow-scale-mirror" viewBox="0 0 16 16">
				<path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393"/>
			</svg>';
			break;
	case "first-page":		$arrow =
			'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-backward-fill  svg-arrow-scale" viewBox="0 0 16 16">
				<path d="M.5 3.5A.5.5 0 0 0 0 4v8a.5.5 0 0 0 1 0V8.753l6.267 3.636c.54.313 1.233-.066 1.233-.697v-2.94l6.267 3.636c.54.314 1.233-.065 1.233-.696V4.308c0-.63-.693-1.01-1.233-.696L8.5 7.248v-2.94c0-.63-.692-1.01-1.233-.696L1 7.248V4a.5.5 0 0 0-.5-.5"/>
			</svg>';
			break;
	case "previous-issue":	$arrow =
			'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fast-forward-fill svg-arrow-scale-mirror" viewBox="0 0 16 16">
				<path d="M7.596 7.304a.802.802 0 0 1 0 1.392l-6.363 3.692C.713 12.69 0 12.345 0 11.692V4.308c0-.653.713-.998 1.233-.696z"/>
				<path d="M15.596 7.304a.802.802 0 0 1 0 1.392l-6.363 3.692C8.713 12.69 8 12.345 8 11.692V4.308c0-.653.713-.998 1.233-.696z"/>
			</svg>';
			break;
	case "next-issue":		$arrow =
			'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fast-forward-fill svg-arrow-scale" viewBox="0 0 16 16">
				<path d="M7.596 7.304a.802.802 0 0 1 0 1.392l-6.363 3.692C.713 12.69 0 12.345 0 11.692V4.308c0-.653.713-.998 1.233-.696z"/>
				<path d="M15.596 7.304a.802.802 0 0 1 0 1.392l-6.363 3.692C8.713 12.69 8 12.345 8 11.692V4.308c0-.653.713-.998 1.233-.696z"/>
			</svg>';
			break;
	case "last-page":		$arrow =
			'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-forward-fill svg-arrow-scale" viewBox="0 0 16 16">
				<path d="M15.5 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V8.753l-6.267 3.636c-.54.313-1.233-.066-1.233-.697v-2.94l-6.267 3.636C.693 12.703 0 12.324 0 11.693V4.308c0-.63.693-1.01 1.233-.696L7.5 7.248v-2.94c0-.63.693-1.01 1.233-.696L15 7.248V4a.5.5 0 0 1 .5-.5"/>
			</svg>';
			break;
	case "next-page":		$arrow =
			'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-fill svg-arrow-scale" viewBox="0 0 16 16">
				<path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393"/>
			</svg>';
			break;
	}

	echo "$arrow";
/*
// Unicode
	switch ($s) {
	case "previous-page":	echo "&#x23f4";			break;
	case "first-page":		echo "&#x23ee";		break;
	case "previous-issue":	echo "&#x23ea";		break;
	case "next-issue":		echo "&#x23e9";	break;
	case "last-page":		echo "&#x23ed";		break;
	case "next-page":		echo "&#x23f5";			break;
	}
*/
}

function valignStart($valign)
{
	echo "<!-- vertical-align '$valign' Start --><table style=\"height: 100%; width: 100%\"><tr><td style=\"padding: 0; margin: 0; vertical-align: $valign\">\n";
}
function valignEnd()
{
	echo "<!-- vertical-align End --></td></tr></table>\n";
}

function nowrapStart($style = "")
{
	echo "<!-- nowrap Start --><div class=\"style-nowrap\"";
	if ($style != "") {
		echo " style=\"$style\"";
	}
	echo ">\n";
}
function nowrapEnd()
{
	echo "<!-- nowrap Ende --></div>\n";
}

function invertedSignal($signal)
{
	echo "<!-- inverted signal --><span class=\"style-inverted-signal\">$signal</span>";
}

function DivWithStyle($border, $style = "", $class = "", $id = "")
{
	if ($border == "") {
		$border = "TBLR";	// Top Bottom Left Right
	}
//			echo "<!--$border-->";
	echo "<div";
	if ($class != "") {
		echo " class=\"$class\"";
	}
	if ($id != "") {
		echo " id=\"$id\"";
	}
	echo " style=\"";
	if ($border == "TBLR") {
		echo "border-style: solid; padding: 10px; ";
	} else {
		if (strpos($border, "T") !== FALSE) {	// Top
			echo "border-top-style: solid; padding-top: 10px; ";
		}
		if (strpos($border, "B") !== FALSE) {	// Bottom
			echo "border-bottom-style: solid; padding-bottom: 10px; ";
		}
		if (strpos($border, "L") !== FALSE) {	// Left
			echo "border-left-style: solid; padding-left: 10px; ";
		}
		if (strpos($border, "R") !== FALSE) {	// Right
			echo "border-right-style: solid; padding-right: 10px; ";
		}
	}
	if (strpos($border, "t") !== FALSE) {	// thick
		echo "border-width: thick ; ";
	} else if (strpos($border, "m") !== FALSE) {	// medium
		echo "border-width: medium; ";
	} else {
		echo "border-width: 2px; ";
	}
	if (strpos($border, "r") !== FALSE) {	// round
		echo "border-radius:20px; ";
	}
	if (strpos($border, "w") !== FALSE) {	// white
		echo "border-color: white; ";
	}
//			echo "margin-top: 12px; margin-bottom: 12px; ";
	if ($style != "") {
		echo " $style";
	}
	echo "\">\n";
}

function boxStart($border = "", $style = "", $class = "", $id = "")
{
	echo "<!-- Kasten über ganze Spalte: Start -->";
	DivWithStyle($border, "width: 100%; $style", $class, $id);
}
function boxStartNowrap($border = "", $style = "", $class = "", $id = "")
{
	echo "<!-- Kasten über ganze Spalte: Start -->";
	DivWithStyle($border, "width: 100%; $style", "style-nowrap $class", $id);
}
function boxStartJustify($border = "", $style = "", $class = "", $id = "")
{
	echo "<!-- Kasten über ganze Spalte im Blocksatz: Start -->";
	DivWithStyle($border, "width: 100%; $style", "justify $class", $id);
}
function boxEnd()
{
	echo "<!-- Kasten: Ende -->";
	echo "</div>\n";
}

function box0Start($border = "", $style = "", $class = "")
{
	echo "<!-- Schmaler Kasten: Start -->";
	echo "<table><tr><td style=\"padding: 0; margin: 0\">";
	DivWithStyle($border, $style, $class);
}
function box0End()
{
	echo "<!-- Schmaler Kasten: Ende -->";
	echo "</div>";
	echo "</td></tr></table>\n";
}

function boxPositioningBottomStart()
{
	echo '<!-- Box Positioning Bottom: Start -->';
	echo '<table style="padding: 0; margin: 0; width: 100%; height: 100%">';
	echo '<tr><td style="vertical-align: bottom">';
	echo "\n";
}

function boxPositioningBottomEnd()
{
	echo '<!-- Box Positioning Bottom: End -->';
	echo '</td></tr>';
	echo '</table>';
	echo "\n";
}

function spChar($spChar)
{
	switch ($spChar) {
	case "zwsp":
		echo "&#x200b;";	// zero width space
		break;
	case "starf":
		echo "&starf;";		// filled star
		break;
	case "nbhy":
		echo "&#x2011;";	// non breaking hyphen
		break;
	case "bigbullet":
		echo "&#x25cf;";	// big bullet
		break;
	case "lowast":
		echo "*";
//		echo "&$spChar;";
//		echo "&lowast;";
//		echo "&#9788;";
		break;
	case "circle1":
		echo "&#x2780;";	// dingbat circled sans-serif digit one
		break;
	case "circle2":
		echo "&#x2781;";	// dingbat circled sans-serif digit two
		break;
	case "rarr":
		echo "&rarr;";		// right arrow
		break;
	case "tlarr":
		echo "&lsh;";		// top left arrow
		break;
	case "vrect":
		echo "&#9647;";		// vertical rectangle
		break;
	case "bell":
		echo "&#x237e;";	// bell symbol / klingelsymbol
		break;
	case "lowast_zwsp":
		spChar("zwsp");
		spChar("lowast");
		spChar("zwsp");
		break;
	case "sup0":			// hochgestellte Null (für Uhrzeit)
		echo "&#x2070;";
		break;
	default:
		echo "&$spChar;";
		break;
	}
}

function imageDesc80($issue, $name)
{
	global $nl;

	switch ("$issue $name") {
	case "00 Image-01-1":
	case "01 Image-01-1":
	case "02 Image-01-1":
	case "03 Image-01-1":
	case "04 Image-01-1":
	case "05 Image-01-1":
	case "06 Image-01-1":	return("Nascom");

	case "00 Image-01-3":
	case "01 Image-01-3":
	case "02 Image-01-3":
	case "03 Image-01-3":
	case "04 Image-01-3":
	case "04 Image-03-1":
	case "05 Image-01-3":
	case "06 Image-02-1":	return("Michael Klein");

	case "00 Image-02-7":
	case "01 Image-11-1":
	case "02 Image-16-2":
	case "03 Image-16-2":
	case "04 Image-11-4":
	case "05 Image-07-2":
	case "06 Image-05-2":	return("Kassette");

	case "00 Image-03-1":
	case "00 Image-03-2":
	case "00 Image-04-2":
	case "00 Image-05-1":
	case "00 Image-05-4":
	case "00 Image-06-1":

	case "01 Image-06-2":
	case "01 Image-12-2":

	case "02 Image-04-1":
	case "02 Image-15-1":
	case "02 Image-16-1":

	case "03 Image-14-1":
	case "03 Image-14-2":

	case "04 Image-05-1":
	case "04 Image-05-2":
	case "04 Image-06-1":
	case "04 Image-07-1":
	case "04 Image-07-2":
	case "04 Image-07-3":
	case "04 Image-07-4":
	case "04 Image-07-5":
	case "04 Image-07-6":
	case "04 Image-08-1":
	case "04 Image-08-3":
	case "04 Image-08-4":
	case "04 Image-18-2":

	case "05 Image-08-1":
	case "05 Image-08-2":

	case "06 Image-04-1":
	case "06 Image-04-2":
	case "06 Image-04-3":
	case "06 Image-08-1":
	case "06 Image-24-1":
	case "06 Image-27-1":
	case "06 Image-27-2":
	case "06 Image-32-1":
	case "06 Image-48-1":	return("HEX-Listing");

	case "00 Image-04-1":
	case "00 Image-07-1":

	case "01 Image-05-1":
	case "01 Image-06-1":
	case "01 Image-12-1":
	case "01 Image-12-2":
	case "01 Image-12-3":
	case "01 Image-12-4":
	case "01 Image-12-5":
	case "01 Image-13-1":

	case "02 Image-08-1":
	case "02 Image-09-1":
	case "02 Image-10-1":

	case "04 Image-17-1":
	case "04 Image-18-1":

	case "05 Image-05-2":
	case "05 Image-12-1":
	case "05 Image-13-1":
	case "05 Image-13-3":
	case "05 Image-13-4":
	case "05 Image-14-1":

	case "06 Image-06-4":
	case "06 Image-07-1":
	case "06 Image-07-2":
	case "06 Image-07-3":
	case "06 Image-10-1":
	case "06 Image-11-1":
	case "06 Image-13-1":
	case "06 Image-15-1":
	case "06 Image-16-2":
	case "06 Image-20-2":
	case "06 Image-28-1":
	case "06 Image-28-2":
	case "06 Image-36-1":
	case "06 Image-37-1":
	case "06 Image-38-1":
	case "06 Image-39-1":
	case "06 Image-40-1":
	case "06 Image-41-1":
	case "06 Image-42-1":
	case "06 Image-43-1":
	case "06 Image-44-1":
	case "06 Image-45-1":
	case "06 Image-46-1":
	case "06 Image-47-1":	return("Assembler-Listing");

	case "00 Image-10-1":

	case "01 Image-07-1":
	case "01 Image-07-2":

	case "02 Image-16-3":
	case "03 Image-08-1":
	case "03 Image-09-1":

	case "03 Image-13-1":
	case "03 Image-13-2":

	case "04 Image-11-3":

	case "05 Image-10-1":

	case "06 Image-21-1":
	case "06 Image-22-1":
	case "06 Image-23-1":
	case "06 Image-33-1":
	case "06 Image-34-1":
	case "06 Image-35-1":	return("BASIC-Listing");

	case "00 Image-04-3":
	case "00 Image-06-3":
	case "00 Image-09-1":

	case "02 Image-04-2":
	case "02 Image-04-3":
	case "02 Image-04-4":
	case "02 Image-04-5":
	case "02 Image-04-6":

	case "03 Image-06-1":
	case "03 Image-11-1":

	case "04 Image-09-1":
	case "04 Image-09-2":
	case "04 Image-10-1":
	case "04 Image-10-2":
	case "04 Image-10-3":
	case "04 Image-10-4":
	case "04 Image-11-1":
	case "04 Image-13-1":

	case "05 Image-06-1":
	case "05 Image-06-2":
	case "05 Image-06-3":
	case "05 Image-07-1":
	case "05 Image-09-1":
	case "05 Image-09-2":
	case "05 Image-11-2":
	case "05 Image-14-2":
	case "05 Image-15-1":

	case "06 Image-04-4":
	case "06 Image-05-1":
	case "06 Image-06-1":
	case "06 Image-06-3":
	case "06 Image-09-1":
	case "06 Image-17-1":
	case "06 Image-18-1":
	case "06 Image-19-1":
	case "06 Image-19-2":
	case "06 Image-20-1":
	case "06 Image-26-1":
	case "06 Image-30-1":
	case "06 Image-30-2":	return("Schaltbild");

	case "01 Image-16-1":
	case "03 Image-16-1":
	case "06 Image-52-1":	return("Computergrafik");

	case "02 Image-11-1":
	case "05 Image-13-2":
	case "05 Image-13-5":
	case "06 Image-15-2":	return("Flussdiagramm");

	case "04 Image-14-1":
	case "04 Image-15-1":
	case "04 Image-15-2":
	case "04 Image-15-3":
	case "04 Image-15-4":
	case "06 Image-31-1":	return("Bildschirmfoto");

	// 00
	case "00 Image-01-2":	return("Journal 0/80");
	case "00 Image-05-3":	return("Sprachtabelle");
	case "00 Image-06-2":	return("Tabelle");
	case "00 Image-10-2":	return("Türme von Hanoi");
	case "00 Image-12-1":	return("Anzeige:$nl"."Nascom-2");
	case "00 Image-12-2":	return("Anzeige:$nl"."IMP Normal Papier Drucker");

	// 01
	case "01 Image-01-2":	return("Journal 1/80");
	case "01 Image-02-1":	return("Nascom IMP");
	case "01 Image-02-2":	return("Nascom Micro IMP");
	case "01 Image-04-1":	return("Zustandsfolgediagramm");

	// 02
	case "02 Image-01-2":	return("Journal 2/80");
	case "02 Image-02-1":	return("NASPEN");
	case "02 Image-14-1":
	case "02 Image-14-2":	return("Datenformatierung");

	// 03
	case "03 Image-01-2":	return("Journal 3/80");
	case "03 Image-05-1":	return("Schrittmotor");
	case "03 Image-07-1":	return("Zeitdiagramm");
	case "03 Image-14-3":
	case "03 Image-14-4":	return("Lösungen");

	// 04
	case "04 Image-01-2":	return("Journal 4/80");
	case "04 Image-04-1":
	case "04 Image-04-2":	return("Messegelände Killesberg");
	case "04 Image-11-2":	return("BASIC");
	case "04 Image-19-1":	return("BOOK SHOP");

	// 05
	case "05 Image-01-2":	return("Journal 5/80");
	case "05 Image-03-1":	return("Diagramm");
	case "05 Image-05-1":	return("Fortsetzung folgt...");
	case "05 Image-11-1":	return("Liste der Cursor- und Helligkeitsbefehle");

	// 06
	case "06 Image-01-2":	return("Journal 6/80$nl"."7/80");
	case "06 Image-06-2":	return("Dimensionierung");
	case "06 Image-06-5":	return("Joystick");
	case "06 Image-12-1":	return("Schrittfolge");
	case "06 Image-18-2":	return("Tonhöhentabelle");
	case "06 Image-23-2":	return("Fernschreibzeichen");
	case "06 Image-49-1":	return("MKS &nbsp; Michael Klein - Systemtechnik$nl"."- Vertrieb");
	case "06 Image-49-2":	return("Sonderpreis bis$nl"."15. Januar: 128,-");
	case "06 Image-49-3":	return("Grafikzeichen");
	}
	return "";
}

function imageDesc81($issue, $name)
{
	global $nl, $asTitle;
/*
	global $server;
	if ($server == "t480") {
		echo "<!-- imageDesc81($issue, $name) -->";
	}
*/
	switch ("$issue $name") {
	case "01 Image-01-1":
	case "02 Image-01-1":
	case "02 ../journal/81/02/Image-17-3":
	case "02 Image-17-3":
	case "03 Image-01-1":
	case "04 Image-00-1":	return("Nascom");

	case "01 Image-15-1":	return("MKS &nbsp; Michael Klein - Systemtechnik$nl"."- Vertrieb");

	case "02 Image-02-1":
	case "02 Image-17-1":
	case "04 Image-01-1":
	case "07 Image-02-1":
	case "07 Image-02-1":
	case "09 Image-14-1":	return("Michael Klein");

	case "02 Image-19-1":

	case "03 Image-24-1":

	case "06 Image-01-1":
	case "06 Image-01-1":
	case "06 Image-02-1":
	case "06 Image-02-1":

	case "07 Image-01-1":
	case "07 Image-01-1":
	case "07 journal/81/07/Image-03-1":
	case "07 ../../81/07/Image-03-1":
	case "07 ../81/07/Image-03-1":
	case "07 Image-03-1":

	case "08 Image-01-1":
	case "08 Image-01-1":
	case "08 Image-02-1":
	case "08 Image-02-1":

	case "09 Image-01-1":
	case "09 Image-01-1":
	case "09 Image-02-1":
	case "09 Image-02-1":

	case "10 Image-01-1":
	case "10 Image-01-1":
	case "10 Image-02-1":
	case "10 Image-02-1":

	case "12 Image-01-1":
	case "12 Image-01-1":
	case "12 Image-02-1":
	case "12 Image-02-1":	return("Nascom$nl"."Journal");

	case "06 Image-02-2":
	case "06 Image-03-1":
	case "12 Image-02-2":
	case "12 Image-02-2":	return("Günter Böhm");

	case "12 Image-53-1":	return("Peter Bentz");

	case "06 Image-07-1":
	case "07 Image-17-1":
	case "08 Image-19-1":
	case "09 Image-13-6":
	case "10 Image-24-4":	case "10 24":
	case "10 Image-27-1":
	case "10 Image-27-1":
	case "12 Image-23-2":	case "12 23":
	case "12 Image-28-2":	case "12 28":
	case "12 Image-54-1":	return("NASCOMPL");

	case "01 Image-03-2":
	case "01 Image-04-2":
	case "01 Image-05-1":
	case "01 Image-08-1":
	case "01 Image-09-1":
	case "01 Image-10-1":
	case "01 Image-11-1":
	case "01 Image-11-2":
	case "01 Image-12-1":
	case "01 Image-13-2":
	case "01 Image-13-3":

	case "02 Image-04-1":
	case "02 Image-04-2":
	case "02 Image-05-4":
	case "02 Image-06-1":
	case "02 Image-06-3":
	case "02 Image-07-1":
	case "02 Image-08-2":
	case "02 Image-09-1":
	case "02 Image-14-1":

	case "03 Image-12-1":
	case "03 Image-12-2":
	case "03 Image-12-5":
	case "03 Image-15-1":
	case "03 Image-16-1":
	case "03 Image-18-2":
	case "03 Image-23-1":

	case "04 Image-12-1":
	case "04 Image-28-1":
	case "04 Image-28-2":

	case "06 Image-14-1":
	case "06 Image-14-2":
	case "06 Image-19-1":

	case "07 Image-03-2":
	case "07 Image-10-1":
	case "07 Image-10-2":
	case "07 Image-16-2":
	case "07 Image-18-1":

	case "08 Image-13-2":
	case "08 Image-13-3":
	case "08 Image-16-1":
	case "08 Image-21-1":
	case "08 Image-21-2":
	case "08 Image-21-3":
	case "08 Image-22-1":

	case "09 Image-07-1":
	case "09 Image-22-1":
	case "09 Image-22-2":
	case "09 Image-22-3":

	case "10 Image-07-1":
	case "10 Image-09-2":
	case "10 Image-10-3":
	case "10 Image-12-1":
	case "10 Image-24-2":

	case "12 Image-08-2":
	case "12 Image-08-3":
	case "12 Image-10-1":
	case "12 Image-11-1":
	case "12 Image-12-2":
	case "12 Image-12-4":
	case "12 Image-13-1":
	case "12 Image-13-2":
	case "12 Image-24-1":
	case "12 Image-25-1":
	case "12 Image-38-1":
	case "12 Image-38-2":
	case "12 Image-38-3":
	case "12 Image-38-4":
	case "12 Image-38-5":
	case "12 Image-40-1":
	case "12 Image-40-2":
	case "12 Image-41-1":
	case "12 Image-41-2":
	case "12 Image-41-3":	return("HEX-Listing");

	case "01 Image-13-1":
	case "01 Image-13-4":

	case "02 Image-08-1":

	case "03 Image-02-1":
	case "03 Image-03-1":

	case "04 Image-03-1":
	case "04 Image-05-1":
	case "04 Image-07-1":
	case "04 Image-10-1":

	case "06 Image-06-3":
	case "06 Image-08-1":
	case "06 Image-09-2":
	case "06 Image-09-3":
	case "06 Image-09-4":
	case "06 Image-10-1":

	case "07 Image-12-1":

	case "09 Image-06-1":
	case "09 Image-06-2":

	case "10 Image-06-1":
	case "10 Image-08-2":
	case "10 Image-19-1":
	case "10 Image-23-1":

	case "12 Image-08-1":
	case "12 Image-09-2":
	case "12 Image-12-3":
	case "12 Image-18-1":
	case "12 Image-28-3":
	case "12 Image-30-4":
	case "12 Image-33-1":
	case "12 Image-37-1":
	case "12 Image-43-1":
	case "12 Image-44-1":	return("Schaltbild");

	case "01 Image-07-1":
	case "01 Image-08-3":
	case "01 Image-12-2":
	case "01 Image-12-3":
	case "01 Image-12-4":

	case "02 Image-05-1":
	case "02 Image-05-2":
	case "02 Image-05-3":

	case "03 Image-17-1":
	case "03 Image-18-1":

	case "04 Image-13-1":
	case "04 Image-13-2":
	case "04 Image-13-3":
	case "04 Image-13-4":
	case "04 Image-14-1":
	case "04 Image-14-2":
	case "04 Image-15-1":
	case "04 Image-15-2":
	case "04 Image-16-1":

	case "06 Image-06-1":
	case "06 Image-08-5":
	case "06 Image-08-7":
	case "06 Image-09-1":
	case "06 Image-17-2":
	case "06 Image-18-1":
	case "06 Image-18-2":

	case "07 Image-05-2":
	case "07 Image-06-1":
	case "07 Image-07-1":
	case "07 Image-09-3":
	case "07 Image-14-1":
	case "07 Image-15-1":
	case "07 Image-15-2":
	case "07 Image-16-1":

	case "08 Image-04-1":
	case "08 Image-07-1":
	case "08 Image-07-2":
	case "08 Image-08-1":
	case "08 Image-09-1":
	case "08 Image-10-1":
	case "08 Image-10-2":
	case "08 Image-11-1":
	case "08 Image-12-1":
	case "08 Image-12-2":
	case "08 Image-12-3":
	case "08 Image-13-1":
	case "08 Image-15-3":
	case "08 Image-17-2":
	case "08 Image-18-1":
	case "08 Image-18-2":
	case "08 Image-18-3":
	case "08 Image-18-4":

	case "09 Image-04-1":
	case "09 Image-08-1":
	case "09 Image-08-2":
	case "09 Image-09-1":
	case "09 Image-16-1":
	case "09 Image-16-2":
	case "09 Image-16-3":
	case "09 Image-17-1":
	case "09 Image-17-2":
	case "09 Image-17-3":
	case "09 Image-18-1":
	case "09 Image-18-2":
	case "09 Image-18-3":
	case "09 Image-19-1":
	case "09 Image-19-2":
	case "09 Image-19-3":
	case "09 Image-20-1":
	case "09 Image-20-2":
	case "09 Image-20-3":
	case "09 Image-21-1":
	case "09 Image-21-2":
	case "09 Image-21-3":
	case "09 Image-24-1":
	case "09 Image-24-2":
	case "09 Image-24-3":
	case "09 Image-25-1":

	case "10 Image-08-3":
	case "10 Image-09-1":
	case "10 Image-10-1":
	case "10 Image-10-2":
	case "10 Image-11-1":
	case "10 Image-11-2":
	case "10 Image-12-2":
	case "10 Image-26-1":

	case "12 Image-11-2":
	case "12 Image-12-1":
	case "12 Image-30-1":
	case "12 Image-30-2":
	case "12 Image-34-1":
	case "12 Image-49-4":	return("Assembler-Listing");

	case "01 Image-04-1":
	case "01 Image-06-1":
	case "01 Image-06-2":
	case "01 Image-06-3":
	case "01 Image-06-4":
	case "01 Image-14-1":
	case "02 Image-15-3":	return("Bildschirmfoto");

	case "01 Image-14-2":
	case "02 Image-09-2":
	case "02 Image-13-2":
	case "03 Image-12-4":
	case "06 Image-19-2":
	case "07 Image-04-2":
	case "08 Image-23-1":
	case "09 Image-03-1":
	case "12 Image-43-2":	return("Kassette");

	case "02 Image-06-2":
	case "02 Image-10-1":
	case "02 Image-11-1":
	case "02 Image-12-1":
	case "02 Image-13-1":

	case "03 Image-06-1":
	case "03 Image-07-1":
	case "03 Image-08-1":
	case "03 Image-09-1":
	case "03 Image-20-1":
	case "03 Image-21-1":
	case "03 Image-22-1":

	case "04 Image-28-3":
	case "04 Image-29-1":

	case "06 Image-04-2":
	case "06 Image-05-1":
	case "06 Image-05-3":
	case "06 Image-08-4":

	case "07 Image-08-1":
	case "07 Image-08-3":
	case "07 Image-09-1":
	case "07 Image-11-1":
	case "07 Image-11-2":
	case "07 Image-13-4":

	case "08 Image-14-1":
	case "08 Image-14-2":
	case "08 Image-16-2":
	case "08 Image-16-3":

	case "09 Image-25-1":
	case "09 Image-25-2":

	case "10 Image-09-3":
	case "10 Image-09-4":
	case "10 Image-24-1":
	case "10 Image-24-3":

	case "12 Image-28-1":
	case "12 Image-46-2":
	case "12 Image-47-1":
	case "12 Image-50-1":
	case "12 Image-50-2":
	case "12 Image-51-1":
	case "12 Image-51-2":
	case "12 Image-52-1":
	case "12 Image-52-2":	return("Basic-Listing");

	case "08 Image-04-2":
	case "12 Image-06-1":
	case "12 Image-06-2":	return("Forth-Listing");

	case "01 Image-13-5":
	case "04 Image-08-1":
	case "12 Image-14-1":
	case "12 Image-31-2":
	case "12 Image-36-2":
	case "12 Image-45-1":	return("Layout");

	case "04 Image-08-2":
	case "06 Image-06-2":
	case "12 Image-09-1":
	case "12 Image-13-3":
	case "12 Image-31-1":
	case "12 Image-33-2":
	case "12 Image-36-1":
	case "12 Image-45-2":	return("Bestückungsplan");

	case "04 Image-24-1":
	case "08 Image-17-1":
	case "10 Image-14-1":
	case "10 Image-15-1":	return("Strichcode");

	case "08 Image-24-1":
	case "09 Image-28-1":
	case "10 Image-28-1":
	case "12 Image-55-1":	return("Anzeige MK Systemtechnik");

	case "03 Image-04-1":
	case "12 Image-23-1":	return("Zeitdiagramm");

	// 01
	case "01 Image-01-2":	return("Journal 1/81");
	case "01 Image-02-1":	return("Ihr Michael Klein");
	case "01 Image-03-1":	return("Bildschirmauszug");
	case "01 Image-04-3":	return("Punktematrix");
	case "01 Image-04-4":
	case "01 Image-04-5":	return("Zeichentabelle");
	case "01 Image-08-2":	return("Speichertabelle");

	// 02
	case "02 Image-01-2":	return("Journal 2/81");
	case "02 Image-04-3":	return("Tastatur");
	case "02 Image-15-1":
	case "02 Image-15-2":	return("Zeichenvorrat");
	case "02 Image-17-2":
	case "02 Image-18-1":
	case "02 Image-18-2":	return("Nascom Preisliste");

	// 03
	case "03 Image-01-2":	return("Journal 3/81");
	case "03 Image-09-2":
	case "03 Image-09-3":
	case "03 Image-10-1":
	case "03 Image-10-2":
	case "03 Image-10-3":
	case "03 Image-11-1":	return("Spielfeld");
	case "03 Image-14-1":
	case "03 Image-14-2":	return("Cassettenformat");
	case "03 Image-19-1":	return("Tabelle");

	// 04
	case "04 Image-00-2":	return("Journal 4/81$nl"."&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 5");
	case "04 Image-18-1":
	case "04 Image-18-2":
	case "04 Image-18-3":
	case "04 Image-18-4":
	case "04 Image-18-5":
	case "04 Image-19-1":
	case "04 Image-19-2":
	case "04 Image-19-3":
	case "04 Image-21-5":
	case "04 Image-20-1":
	case "04 Image-20-2":
	case "04 Image-20-3":
	case "04 Image-20-4":
	case "04 Image-21-1":
	case "04 Image-21-2":
	case "04 Image-21-3":
	case "04 Image-21-4":
	case "04 Image-21-5":	return("Syntaxdiagramm");
	case "04 Image-23-1":	return("Zeichentabelle");
	case "04 Image-29-2":	return("Funktionsplot");

	// 06
	case "06 Image-04-1":	return("Diagramm");
	case "06 Image-05-2":	return("Frequenztabelle");

	case "06 Image-07-3":	return(
			"nesische Schriftzeichen"
		.	"Title"
		.	" so konnten die beiden Religionen Sonne und Mond in Antike und Neuzeit vereint werden.$nl"
		.	" alte Basis ist beeindruckend und weiß nicht, dass wir den Regen$nl"
		.	"lassen. Sie kämpft ungehindert darum, den Wagen wie ein Drache$nl"
		.	"halten. Ein Ausflug zum Quellteich ist wie ein Perlennest und Tinte im Regen.");
	case "06 Image-07-4":	return("bonbon");
	case "06 Image-08-2":	return("BUGS BUGS BUGS");
	case "06 Image-08-3":	return("BASIC");
	case "06 Image-16-1":	return("Nascom 80$nl"."Journal");
	case "06 Image-17-1":	return("Formatbeschreibung");
	case "06 Image-20-1":
	case "06 Image-20-1":	return("othello");

	case "06 Image-07-2":	case "06 07":	return("NASCOMPL:$nl"."&gt; HALLO!$nl"."&gt; LIEBE$nl"."&gt; LESER!$nl"."&gt;");
	case "06 Image-11-1":	case "06 11":	return("NASCOMPL:$nl"."Lieber Herr Lotter!$nl"."Wir warten alle$nl"."sehnlichst auf die$nl"."MDCR-Software!!");
	case "06 Image-14-3":	case "06 14":	return("NASCOMPL:$nl"."Wie heißt das eigentlich$nl"."richtig?$nl"."relocierbar, relocating,$nl"."relocatierbar, relokalisierbar$nl"."Bierbar, relocable,$nl"."relokabel, relokatibel,$nl"."verschiebbar, verschieblich$nl"."verschiebel, verschiebsam,$nl"."verschiebing,$nl"."verschiekabel,$nl"."ortsungebunden,$nl"."ortlos oder$nl"."vielortig&nbsp;???$nl"."Am besten einigen$nl"."wir uns auf$nl"."''verschortolatibel''!");
	case "06 Image-20-3":	case "06 20":	return("NASCOMPL:$nl"."Wenn Sie die$nl"."Spielregel$nl"."herausgefunden$nl"."haben, schreiben$nl"."Sie uns bitte!");

	// 07
	case "07 Image-04-1":	return("Befehlssatz");
	case "07 Image-08-2":	return("Hüllkurven");
	case "07 Image-09-2":	return("Enable Register Tabelle");
	case "07 Image-10-3":	return("Einschlaggeräusch");
	case "07 Image-10-4":	return("Registertabelle");
	case "07 Image-13-1":	return("F B H A E");
	case "07 Image-13-2":	return("F B H A E &rarr; A F B H E");
	case "07 Image-13-3":	return("A F B H E &rarr; A B F H E");
	case "07 Image-20-1":	return("Anzeige MIVOC HiFi-Systeme, Solingen");

	case "07 Image-11-3":	case "07 11":	return("NASCOMPL:$nl"."Hoffentlich wird$nl"."der Druck diesmal$nl"."besser!!");
	case "07 Image-13-5":	case "07 13":	return("NASCOMPL:$nl"."IM NÄCHSTEN HEFT:$nl"."SORTIEREN DURCH$nl"."EINFÜGEN");
	case "07 Image-17-2":	case "07 17":	return("NASCOMPL:$nl"."Geschlechtstypen bei Computern");

	// 08
	case "08 Image-02-2":	return("Böhmscher Rundlauf");
	case "08 Image-15-1":	return("Sortiervorgang");
	case "08 Image-20-1":	return("Spielecke");

	case "08 Image-13-4":	case "08 13":	return("NASCOMPL:$nl"."Formatiert sehe ich$nl"."sehr seltsam aus!!");
	case "08 Image-19-2":	case "08 19":	return("NASCOMPL:$nl"."Platinismus");

	// 09
	case "09 Image-15-1":	return("Lageplan Stuttgart Killesberg");
	case "09 Image-15-2":	return("Logo Stuttgart Messe");
	case "09 Image-15-3":
	case "09 Image-15-4":	return("Messehalle");
	case "09 Image-23-1":	return("Pinbelegung");
	case "09 Image-26-1":	return("Pinbelegung AY-3-8910");

	case "09 Image-04-2":	case "09 04":	return("NASCOMPL:$nl"."Hier haben$nl"."wir Platz$nl"."für$nl"."Randnotizen$nl"."gelassen!");
	case "09 Image-07-2":	case "09 07":	return("NASCOMPL:$nl"."Kann ja &rsquo;mal$nl"."passieren");
	case "09 Image-13-7":	case "09 13":	return("NASCOMPL:$nl"."Mein Beitrag muß diesmal$nl"."wegen Platmangels ausfallen.$nl"."Das ist nicht so schlimm.$nl"."Aber daß mich$nl"."ein Leser ''albern''$nl"." findet, bricht$nl"."mir fast die CPU!");

	// 10
	case "10 Image-07-2":
	case "10 Image-07-3":	return("Pixelmatrix");
	case "10 Image-08-1":	return("Zeichentabelle");
	case "10 Image-18-1":	return("NASCOM - MAGNETTASTE");
	case "10 Image-18-2":	return("NASCOM II - Tastatur");
	case "10 Image-20-1":	return("Verdrahtungsplan");
	case "10 Image-21-1":	return("Tabelle der Buchsen- und Steckerbelegungen");
	case "10 Image-22-1":	return("Zeitablauf vereinfacht");

	case "10 Image-06-2":	case "10 06":	return("NASCOMPL:$nl"."ICH GLAUBE,$nl"."DAS INTERESSE$nl"."FÜR WEITERE$nl"."ARTIKEL VON$nl"."HERRN FÖßEL$nl"."KANN MAN$nl"."VORAUSSETZEN!");
	case "10 Image-27-2":	case "10 27":	return("NASCOMPL:$nl"."Computermisshandlung");

	// 12
	case "12 Image-10-1":	return("Tastatur");

	case "12 Image-25-1":
	case "12 Image-25-2":
	case "12 Image-25-3":
	case "12 Image-25-4":
	case "12 Image-25-5":
	case "12 Image-26-1":
	case "12 Image-26-2":
	case "12 Image-26-3":
	case "12 Image-27-1":	return("Foto Plotter");

	case "12 Image-49-1":
	case "12 Image-49-2":
	case "12 Image-49-3":	return("Foto PIO-Bus");

	case "12 Image-27-2":	return("Flussdiagramm");
	case "12 Image-29-1":	return("Anschlussbild");
	case "12 Image-35-1":	return("Blockdiagramm");

	case "12 Image-40-3":	case "12 40":	return("NASCOMPL:$nl"."KEIN$nl"."STRESS$nl"."MEHR BEIM$nl"."TIPPEN!");
	case "12 Image-52-3":	case "12 52":	return("NASCOMPL:$nl"."Wer hat sich bloß$nl"."dieses blöde$nl"."ASHRAM ausgedacht?");
	case "12 Image-54-2":	case "12 54":	return("NASCOMPL:$nl"."Weihnachtliches");
	}
	return "";
}

function imageDesc82($issue, $name)
{
	global $nl;

	switch ("$issue $name") {
	case "01 Image-01-1":
	case "01 Image-01-1":
	case "01 Image-02-1":
	case "02 Image-01-1":
	case "02 Image-01-1":
	case "02 Image-02-1":
	case "03 Image-01-1":
	case "03 Image-01-1":
	case "03 Image-47-3":
	case "05 Image-01-1":
	case "05 Image-01-1":
	case "05 Image-02-1":
	case "06 Image-01-1":
	case "06 Image-01-1":
	case "06 Image-02-1":
	case "07 Image-01-1":
	case "07 Image-01-1":
	case "07 Image-02-1":
	case "09 Image-01-1":
	case "09 Image-01-1":
	case "09 Image-02-1":
	case "10 Image-01-1":
	case "10 Image-01-1":
	case "12 Image-01-1":	return("Nascom$nl"."Journal");

	case "01 Image-17-1":
	case "02 Image-32-1":
	case "02 Image-32-2":
	case "03 Image-52-1":
	case "05 Image-32-1":
	case "06 Image-24-1":
	case "07 Image-60-1":
	case "09 Image-28-1":
	case "10 Image-28-1":	return("Anzeige MK Systemtechnik");

	case "01 Image-02-2":	return("Günter Böhm");

	case "01 Image-35-1":
	case "02 Image-17-4":	case "02 17":
	case "02 Image-30-1":
	case "03 Image-51-1":
	case "05 Image-23-2":	case "05 23":
	case "05 Image-31-1":
	case "06 Image-23-1":
	case "07 Image-59-1":
	case "09 Image-11-4":
	case "10 ../82/10/Image-07-2":
	case "10 Image-07-2":	return("NASCOMPL");

	case "01 Image-04-1":
	case "01 Image-05-4":
	case "01 Image-06-1":
	case "01 Image-07-1":
	case "01 Image-12-1":
	case "01 Image-12-2":
	case "01 Image-13-1":
	case "01 Image-13-2":
	case "01 Image-14-1":
	case "01 Image-14-2":
	case "01 Image-15-1":
	case "01 Image-15-2":
	case "01 Image-16-1":
	case "01 Image-16-2":
	case "01 Image-16-3":
	case "01 Image-20-1":
	case "01 Image-20-2":
	case "01 Image-20-3":
	case "01 Image-21-1":

	case "02 Image-04-1":
	case "02 Image-04-2":
	case "02 Image-05-1":
	case "02 Image-05-2":
	case "02 Image-06-1":
	case "02 Image-06-2":
	case "02 Image-07-1":
	case "02 Image-07-2":
	case "02 Image-08-1":
	case "02 Image-16-4":
	case "02 Image-17-1":
	case "02 Image-17-3":
	case "02 Image-25-2":
	case "02 Image-26-1":
	case "02 Image-26-2":
	case "02 Image-26-3":

	case "03 Image-03-2":
	case "03 Image-22-1":
	case "03 Image-36-1":
	case "03 Image-36-2":
	case "03 Image-37-1":
	case "03 Image-37-2":
	case "03 Image-37-3":
	case "03 Image-38-1":
	case "03 Image-38-2":
	case "03 Image-41-3":
	case "03 Image-41-4":
	case "03 Image-42-1":
	case "03 Image-42-2":
	case "03 Image-43-1":
	case "03 Image-43-2":
	case "03 Image-46-1":
	case "03 Image-46-2":
	case "03 Image-47-1":
	case "03 Image-47-2":
	case "03 Image-49-1":
	case "03 Image-49-2":
	case "03 Image-50-1":
	case "03 Image-50-2":
	case "03 Image-50-3":

	case "05 Image-19-1":

	case "06 Image-04-1":
	case "06 Image-04-2":
	case "06 Image-04-3":
	case "06 Image-05-2":
	case "06 Image-05-3":
	case "06 Image-06-1":
	case "06 Image-07-2":
	case "06 Image-10-1":
	case "06 Image-11-1":
	case "06 Image-11-2":
	case "06 Image-11-3":
	case "06 Image-11-4":
	case "06 Image-11-5":
	case "06 Image-21-1":

	case "07 Image-05-1":
	case "07 Image-09-1":
	case "07 Image-17-2":
	case "07 Image-17-3":
	case "07 Image-18-1":
	case "07 Image-19-3":
	case "07 Image-20-1":
	case "07 Image-23-2":
	case "07 Image-23-3":
	case "07 Image-23-4":
	case "07 Image-24-1":
	case "07 Image-24-2":
	case "07 Image-24-3":
	case "07 Image-25-1":
	case "07 Image-25-2":
	case "07 Image-26-1":
	case "07 Image-26-2":
	case "07 Image-26-3":
	case "07 Image-27-1":
	case "07 Image-28-1":
	case "07 Image-28-2":
	case "07 Image-28-3":
	case "07 Image-29-1":
	case "07 Image-29-2":
	case "07 Image-30-1":
	case "07 Image-34-1":
	case "07 Image-34-2":
	case "07 Image-35-1":
	case "07 Image-35-2":
	case "07 Image-36-1":
	case "07 Image-36-3":
	case "07 Image-37-1":
	case "07 Image-37-2":
	case "07 Image-40-1":
	case "07 Image-40-2":
	case "07 Image-41-1":
	case "07 Image-54-2":
	case "07 Image-54-3":
	case "07 Image-55-1":
	case "07 Image-55-2":
	case "07 Image-56-1":
	case "07 Image-56-2":

	case "09 Image-10-1":

	case "10 Image-19-1":
	case "10 Image-19-2":
	case "10 Image-19-3":
	case "10 Image-20-1":
	case "10 Image-20-2":
	case "10 Image-20-3":
	case "10 Image-21-1":	return("Basic-Listing");

	case "02 Image-17-2":
	case "05 Image-20-3":
	case "05 Image-22-1":
	case "05 Image-22-2":
	case "05 Image-23-1":
	case "06 Image-08-1":
	case "06 Image-08-2":
	case "07 Image-18-2":
	case "07 Image-19-1":
	case "07 Image-45-1":
	case "07 Image-46-1":	return("Pascal-Listing");

	case "07 Image-47-2":
	case "07 Image-47-3":
	case "07 Image-47-4":
	case "07 Image-48-1":
	case "07 Image-48-2":
	case "07 Image-48-3":
	case "07 Image-48-4":
	case "07 Image-48-5":	return("Forth-Listing");

	case "01 Image-08-1":
	case "01 Image-26-1":
	case "01 Image-26-2":
	case "01 Image-27-1":
	case "01 Image-27-2":
	case "01 Image-28-1":
	case "01 Image-28-2":
	case "01 Image-29-1":
	case "01 Image-29-2":

	case "02 Image-27-1":
	case "02 Image-27-2":
	case "02 Image-28-1":
	case "02 Image-28-2":
	case "02 Image-29-1":
	case "02 Image-29-2":

	case "03 Image-12-1":
	case "03 Image-12-2":
	case "03 Image-13-1":
	case "03 Image-13-2":
	case "03 Image-14-1":
	case "03 Image-14-2":
	case "03 Image-15-1":
	case "03 Image-15-2":
	case "03 Image-16-1":
	case "03 Image-16-2":
	case "03 Image-17-1":
	case "03 Image-17-2":
	case "03 Image-18-1":
	case "03 Image-18-2":
	case "03 Image-19-1":
	case "03 Image-19-2":

	case "07 Image-16-1":
	case "07 Image-17-1":
	case "07 Image-31-1":
	case "07 Image-31-2":
	case "07 Image-32-1":
	case "07 Image-32-2":
	case "07 Image-33-1":
	case "07 Image-33-2":

	case "09 Image-11-3":
	case "09 Image-19-1":
	case "09 Image-19-2":
	case "09 Image-20-1":
	case "09 Image-20-2":
	case "09 Image-21-1":
	case "09 Image-21-2":
	case "09 Image-21-3":
	case "09 Image-22-1":
	case "09 Image-22-2":
	case "09 Image-22-3":
	case "09 Image-23-1":
	case "09 Image-23-2":
	case "09 Image-24-1":
	case "09 Image-24-2":
	case "09 Image-24-3":
	case "09 Image-25-1":
	case "09 Image-25-2":
	case "09 Image-25-3":
	case "09 Image-26-1":
	case "09 Image-26-2":
	case "09 Image-27-1":	return("ZEAP Z80 Assembler – Source Listing");

	case "02 Image-15-3":
	case "02 Image-16-1":
	case "09 Image-27-2":	return("ZEAP Z80 Assembler – Symbol Table");

	case "01 Image-06-2":
	case "01 Image-07-2":
	case "01 Image-30-2":
	case "01 Image-31-2":
	case "01 Image-32-1":
	case "01 Image-32-2":
	case "01 Image-33-1":
	case "01 Image-33-2":
	case "01 Image-33-3":

	case "02 Image-09-1":
	case "02 Image-09-2":
	case "02 Image-10-1":
	case "02 Image-10-2":
	case "02 Image-11-1":
	case "02 Image-11-2":
	case "02 Image-12-1":
	case "02 Image-12-2":
	case "02 Image-13-1":
	case "02 Image-13-2":
	case "02 Image-14-1":
	case "02 Image-14-2":
	case "02 Image-15-1":
	case "02 Image-15-2":
	case "02 Image-16-3":
	case "02 Image-19-1":
	case "02 Image-19-2":
	case "02 Image-19-3":
	case "02 Image-23-2":
	case "02 Image-24-1":
	case "02 Image-24-2":
	case "02 Image-24-3":
	case "02 Image-25-1":

	case "03 Image-02-1":
	case "03 Image-03-1":
	case "03 Image-21-4":
	case "03 Image-24-3":
	case "03 Image-25-1":
	case "03 Image-25-2":
	case "03 Image-26-1":
	case "03 Image-26-2":
	case "03 Image-27-1":
	case "03 Image-27-2":
	case "03 Image-28-1":
	case "03 Image-28-2":
	case "03 Image-29-1":
	case "03 Image-29-2":
	case "03 Image-30-1":
	case "03 Image-30-2":
	case "03 Image-45-2":

	case "05 Image-09-1":
	case "05 Image-09-2":
	case "05 Image-10-1":
	case "05 Image-10-2":
	case "05 Image-11-1":
	case "05 Image-11-2":
	case "05 Image-16-1":
	case "05 Image-16-2":
	case "05 Image-16-3":
	case "05 Image-17-1":
	case "05 Image-17-3":
	case "05 Image-17-4":
	case "05 Image-24-1":
	case "05 Image-25-3":
	case "05 Image-26-1":
	case "05 Image-26-2":
	case "05 Image-27-1":
	case "05 Image-27-2":
	case "05 Image-28-1":
	case "05 Image-28-2":
	case "05 Image-29-1":

	case "06 Image-12-1":
	case "06 Image-14-1":
	case "06 Image-15-1":
	case "06 Image-16-1":
	case "06 Image-17-1":
	case "06 Image-18-1":
	case "06 Image-19-1":
	case "06 Image-19-2":

	case "07 Image-11-2":
	case "07 Image-12-1":
	case "07 Image-12-2":
	case "07 Image-21-1":
	case "07 Image-21-2":
	case "07 Image-22-1":
	case "07 Image-22-2":
	case "07 Image-23-1":
	case "07 Image-41-2":
	case "07 Image-42-1":
	case "07 Image-42-2":
	case "07 Image-42-3":
	case "07 Image-43-1":
	case "07 Image-44-2":
	case "07 Image-46-2":
	case "07 Image-47-1":
	case "07 Image-49-1":
	case "07 Image-50-1":
	case "07 Image-51-1":
	case "07 Image-52-1":
	case "07 Image-53-1":
	case "07 Image-54-1":
	case "07 Image-57-1":
	case "07 Image-57-2":	return("Assembler-Listing");

	case "01 Image-08-2":
	case "01 Image-10-1":
	case "01 Image-10-2":
	case "01 Image-11-1":
	case "01 Image-11-3":
	case "01 Image-11-4":
	case "01 Image-24-1":
	case "01 Image-24-2":
	case "01 Image-30-1":

	case "02 Image-29-3":
	case "02 Image-29-4":
	case "03 Image-20-1":
	case "03 Image-21-1":
	case "03 Image-21-2":
	case "03 Image-24-2":
	case "03 Image-31-2":
	case "03 Image-31-3":
	case "03 Image-31-4":
	case "03 Image-32-1":
	case "03 Image-32-2":
	case "03 Image-32-3":
	case "03 Image-32-4":
	case "03 Image-33-1":
	case "03 Image-34-1":
	case "03 Image-34-2":
	case "03 Image-34-3":
	case "03 Image-35-1":
	case "03 Image-35-2":
	case "03 Image-35-3":
	case "03 Image-39-1":
	case "03 Image-40-1":
	case "03 Image-40-2":
	case "03 Image-41-1":
	case "03 Image-41-2":
	case "03 Image-43-3":
	case "03 Image-45-3":

	case "05 Image-17-2":
	case "05 Image-17-5":
	case "05 Image-18-2":
	case "05 Image-29-2":
	case "05 Image-29-3":
	case "05 Image-29-4":
	case "05 Image-29-5":
	case "05 Image-29-6":
	case "05 Image-30-1":
	case "05 Image-30-2":
	case "05 Image-30-3":

	case "06 Image-03-2":
	case "06 Image-06-2":
	case "06 Image-06-3":
	case "06 Image-07-1":
	case "06 Image-21-2":
	case "06 Image-21-3":
	case "06 Image-22-1":

	case "07 Image-13-4":

	case "10 Image-22-2":
	case "10 Image-23-1":	return("HEX-Listing");

	case "02 Image-20-1":
	case "02 Image-20-2":
	case "02 Image-20-3":
	case "02 Image-20-4":
	case "02 Image-20-5":
	case "02 Image-20-6":
	case "02 Image-20-7":
	case "02 Image-21-1":
	case "02 Image-21-2":
	case "02 Image-21-3":
	case "02 Image-21-4":	return("Disketten-Listing");

	case "01 Image-06-3":
	case "01 Image-22-2":

	case "02 Image-08-2":
	case "02 Image-22-1":
	case "02 Image-22-2":
	case "02 Image-22-4":
	case "02 Image-22-5":

	case "03 Image-23-1":
	case "03 Image-24-1":

	case "05 Image-08-1":
	case "05 Image-08-3":
	case "05 Image-14-1":
	case "05 Image-15-1":
	case "06 Image-22-2":
	case "06 Image-22-3":
	case "07 Image-09-2":
	case "07 Image-11-1":
	case "07 Image-13-3":
	case "07 Image-14-1":
	case "09 Image-07-1":
	case "09 Image-18-1":
	case "10 Image-03-1":
	case "10 Image-04-5":
	case "10 Image-05-2":
	case "10 Image-06-2":
	case "10 Image-07-1":
	case "10 Image-22-3":
	case "10 Image-25-1":
	case "10 Image-26-1":
	case "10 Image-26-2":
	case "10 Image-27-4":	return("Schaltbild");

	case "02 Image-08-3":	return("Layout");

	case "07 Image-14-2":
	case "07 Image-14-3":
	case "07 Image-14-4":
	case "07 Image-15-1":
	case "07 Image-15-2":	return("Flussdiagramm");

	case "07 Image-06-1":
	case "07 Image-07-1":
	case "07 Image-07-2":
	case "07 Image-07-3":	return("Bestückungsplan");

	case "09 Image-11-2":
	case "09 Image-13-1":
	case "10 Image-03-2":
	case "10 Image-13-3":
	case "10 Image-13-4":	return("Zeitdiagramm");

	case "10 Image-27-1":
	case "10 Image-27-2":
	case "10 Image-27-3":	return("Mechanik-Zeichnung");

	case "03 Image-20-2":
	case "03 Image-21-3":
	case "03 Image-22-2":
	case "03 Image-22-3":
	case "03 Image-22-4":
	case "09 Image-11-1":
	case "10 Image-04-1":
	case "10 Image-04-2":
	case "10 Image-04-3":
	case "10 Image-04-4":
	case "10 Image-04-6":
	case "10 Image-05-1":
	case "10 Image-05-3":
	case "10 Image-05-4":
	case "10 Image-06-1":	return("Bildschirmfoto");

	// 01
	case "01 Image-05-1":
	case "01 Image-05-2":
	case "01 Image-05-3":	return("Heap-Diagramm");
	case "01 Image-18-1":	return("Nascom Journal");
	case "01 Image-22-1":	return("Character-Generator");
	case "01 Image-34-1":	return("Trauerflor");

	case "01 Image-07-3":	case "01 07":	return("NASCOMPL:$nl"."Dieser Platz$nl"."könnte durch$nl"."einen NASCOMPL$nl"."ausgefüllt werden,$nl"."bleibt aber mit$nl"."Rücksicht auf$nl"."manche Leser$nl"."frei.");
	case "01 Image-11-2":	case "01 11":	return("NASCOMPL:$nl"."Mensch Clemens!$nl"."Das hast Du gut gemacht.$nl"."Wenn ich in deinem$nl"."Alter schon$nl"."programmiert hätte,$nl"."wäre ich sicher$nl"."berühmt!");
	case "01 Image-25-1":	case "01 25":	return("NASCOMPL:$nl"."LISTING AUF DER$nl"."NÄCHSTEN SEITE!");
	case "01 Image-35-2":	case "01 35":	return("NASCOMPL:$nl"."MOTZ1$nl"."MOTZ2$nl"."MOTZ3$nl"."MOTZ4$nl"."MOTZ5$nl"."");

	// 02
	case "02 Image-22-3":	return("PIO-Steuerworte");
	case "02 Image-23-1":	return("Registeranzeige bei NAS-SYS 3");

	case "02 Image-21-2":	case "02 21":	return("NASCOMPL:$nl"."Wußten Sie$nl"."eigentlich schon,$nl"."daß man unter$nl"."gewissen Um-$nl"."ständen für$nl"."eine Speicher-$nl"."erweiterung eine$nl"."Baugenehmigung$nl"."benötigt??");
	case "02 Image-26-4":	case "02 26":	return("NASCOMPL:$nl"."Jetzt$nl"."müßte man$nl"."nur noch$nl"."wissen, welches$nl"."der große$nl"."Zeiger ist!!");
	case "02 Image-30-2":	case "02 30":	return("NASCOMPL:$nl"."Ostereiersuchprogramm");

	// 03
	case "03 Image-31-1":	return("Speicherbereich");
	case "03 Image-45-1":	return("Flussdiagramm");

	case "03 Image-22-5":	case "03 22":	return("NASCOMPL:$nl"."Jeder$nl"."Abonnent$nl"."kann$nl"."Kleinanzeigen$nl"."bis 40 Wörter$nl"."aufgeben!$nl"."$nl"."(Das ist diesmal$nl"."kein Witz!)");
	case "03 Image-35-4":	case "03 35":	return("NASCOMPL:$nl"."Mir$nl"."dreht$nl"."sich$nl"."alles!");
	case "03 Image-51-2":	case "03 51":	return("NASCOMPL:$nl"."Programmiersprache BIRNE");

	// 05
	case "05 Image-02-2":	return("Pinbelegung 2114");
	case "05 Image-08-2":	return("Flachkabel-Anschluss");
	case "05 Image-15-2":
	case "05 Image-15-3":	return("Foto Lichtgriffel");
	case "05 Image-20-1":
	case "05 Image-20-2":	return("Fortran-Listing");
	case "05 Image-24-2":
	case "05 Image-25-1":
	case "05 Image-25-2":	return("Dateimaske");

	case "05 Image-31-2":	case "05 31":	return("NASCOMPL:$nl"."Sex und Computer");

	// 06
	case "06 Image-05-1":	return("Beispiel eines ausgefüllten Postschecks");
	case "06 Image-09-1":	return("Bewegungsdiagramm");
	case "06 Image-09-2":	return("Score-Diagramm");
	case "06 Image-12-2":	return("Illustration of the CRT Screen Format");
	case "06 Image-12-3":	return("Typical 80 x 24 Screen Format Initialization of CRTC");
	case "06 Image-13-1":	return("crtc iNTERNAL rEGISTER aSSIGNMENT");

	case "06 Image-19-3":	case "06 19":	return("NASCOMPL:$nl"."Bei achtzig Zeichen pro Zeile bekommt man in so$nl"."eine Sprechblase doch gewaltig mehr unter als mit$nl"."unserem alten Format!");
	case "06 Image-23-2":	case "06 23":	return("NASCOMPL:$nl"."Reisezeit");

	// 07
	case "07 Image-02-2":	return("Weiterhin viel Spaß mit dem$nl"."Journal$nl"."Ihr Günter Böhm");
	case "07 Image-13-1":	return("Made by DL6UP 1981");
	case "07 Image-13-2":	return("Platine");
	case "07 Image-19-2":	return("Mini-Pilot-Listing");
	case "07 Image-30-2":	return("Busbelegung");
	case "07 Image-36-2":	return("&gt;&lt;");
	case "07 Image-38-1":	return("Bildschirm-Atlas");
	case "07 Image-44-1":	return("Relozier-Adressen");
	case "07 Image-58-1":
	case "07 Image-58-2":	return("Zeichengenerator");

	case "07 Image-05-2":	case "07 05":	return("NASCOMPL:$nl"."Wir kaufen nichts!");
	case "07 Image-08-1":	case "07 08":	return("NASCOMPL:$nl"."KNOBELECKE$nl"."$nl"."auch in dieser$nl"."Ausgabe sind$nl"."wieder eine$nl"."Menge$nl"."Kleinanzeigen$nl"."versteckt.$nl"."Schreiben Sie$nl"."die Anzahl auf$nl"."einen Zettel$nl"."und zeigen Sie$nl"."ihn niemanden!$nl"."$nl"."Kleinanzeigen bis 40 Wörter sind für Abonnenten$nl"."kostenlos!$nl"."");
	case "07 Image-43-2":	case "07 43":	return("NASCOMPL:$nl"."Software-Tip:$nl"."$nl"."Nehmen Sie sich einen$nl"."Tag Urlaub, wenn Sie$nl"."den Zauberwürfel$nl"."eintippen wollen!");
	case "07 Image-59-2":	case "07 59":	return("NASCOMPL:$nl"."Greeting Messages");

	// 09
	case "09 Image-13-2":	return("Blockdiagramm");

	case "09 Image-11-5":	case "09 11":	return("NASCOMPL:$nl"."Früh-Herbst");
	case "09 Image-13-3":	case "09 13":	return("NASCOMPL:$nl"."Kein Grund zur$nl"."Freude! Ich$nl"."bleibe Ihnen$nl"."noch erhalten!");
	
	// 10
	case "10 Image-06-3":	return("Tabelle Steuerworte");
	case "10 Image-07-4":	return("Hallo liebe Leser!");
	case "10 Image-11-1":
	case "10 Image-11-2":	return("Programm-Ausgabe");
	case "10 Image-13-1":	return("SAB 2732");
	case "10 Image-13-2":	return("Anschlüsse 2732");

	case "10 Image-07-3":	case "10 07":	return("NASCOMPL:$nl"."80-BUS$nl"."JOURNAL");
	case "10 Image-23-2":	case "10 23":	return("NASCOMPL:$nl"."Hi Hi Hi Hi Hi$nl"."Hi Hi Hi Hi$nl"."Hi Hi Hi$nl"."Hi Hi Hi!");
	case "10 Image-24-1":	case "10 24":	return("NASCOMPL:$nl"."80 Busserl");
	
	// 12
	case "12 Image-07-1":
	case "12 Image-07-2":	return("Computergrafik");
	case "12 Image-18-1":	return("R.I.P.");
	case "12 Image-23-1":
	case "12 Image-23-2":	return("Foto CLD Minifloppy");
	}
	return "";
}

function imageDesc83($issue, $name)
{
	global $nl;

	switch ("$issue $name") {
	case "01 Image-11-1":	case "01 11":
	case "01 Image-14-2":	case "01 14":
	case "02 Image-16-2":	case "02 16":
	case "02 Image-23-1":	case "02 23":
	case "02 Image-27-1":	case "02 27":
	case "03 Image-02-2":	case "03 02":
	case "03 Image-04-1":	case "03 04":	return("NASCOMPL");

	case "01 Image-01-1":
	case "01 Image-02-1":
	case "02 Image-01-1":
	case "02 Image-02-1":
	case "03 Image-01-1":
	case "03 journal/83/03/Image-02-1":
	case "03 ../../83/03/Image-02-1":
	case "03 ../83/03/Image-02-1":
	case "03 Image-02-1":
	case "04 Image-01-1":
	case "04 Image-02-1":
	case "05 Image-01-1":
	case "05 Image-02-1":
	case "06 Image-01-1":
	case "06 Image-02-1":
	case "07 Image-01-1":
	case "07 Image-02-1":
	case "09 Image-01-1":
	case "09 Image-02-1":
	case "11 Image-01-1":
	case "11 Image-02-1":
	case "12 Image-01-1":
	case "12 Image-02-1":	return("80-Bus$nl"."Journal");

	case "01 Image-28-1":
	case "02 Image-28-1":
	case "03 Image-32-1":
	case "04 Image-28-1":
	case "05 Image-28-1":
	case "06 Image-28-1":
	case "07 Image-51-1":
	case "09 Image-27-1":
	case "11 Image-51-1":
	case "12 Image-27-1":	return("Anzeige Gemini Microcomputer Vertriebs-GmbH");

	case "07 Image-52-1":
	case "09 Image-28-1":
	case "11 Image-52-1":
	case "12 Image-28-1":	return("Anzeige LAMPSON Digitaltechnik");

	case "01 Image-04-1":
	case "01 Image-05-1":
	case "01 Image-11-1":
	case "01 Image-11-2":
	case "01 Image-11-3":
	case "01 Image-11-4":
	case "01 Image-27-3":
	case "02 Image-04-1":
	case "02 Image-04-2":
	case "02 Image-11-1":
	case "02 Image-11-2":
	case "02 Image-12-1":
	case "02 Image-12-2":
	case "02 Image-13-2":
	case "02 Image-14-1":
	case "02 Image-25-1":
	case "02 Image-25-2":
	case "02 Image-25-3":
	case "02 Image-25-4":
	case "03 Image-10-1":
	case "03 Image-10-2":
	case "03 Image-10-3":
	case "03 Image-10-4":
	case "03 Image-10-5":
	case "03 Image-10-6":
	case "03 Image-28-4":
	case "03 Image-29-1":
	case "03 Image-29-2":
	case "03 Image-29-3":
	case "04 Image-03-1":
	case "04 Image-03-3":
	case "04 Image-05-1":
	case "04 Image-05-2":
	case "04 Image-05-3":
	case "04 Image-05-4":
	case "04 Image-06-1":
	case "04 Image-06-2":
	case "04 Image-06-3":
	case "04 Image-07-1":
	case "04 Image-15-1":
	case "04 Image-15-2":
	case "04 Image-15-3":
	case "04 Image-18-3":
	case "04 Image-18-4":
	case "04 Image-18-5":
	case "04 Image-18-6":
	case "04 Image-19-1":
	case "04 Image-19-2":
	case "04 Image-19-3":
	case "04 Image-21-1":
	case "04 Image-21-2":
	case "04 Image-22-1":
	case "04 Image-22-2":
	case "04 Image-22-3":
	case "04 Image-22-4":
	case "04 Image-22-5":
	case "04 Image-22-6":
	case "04 Image-23-1":
	case "05 Image-12-1":
	case "05 Image-14-3":
	case "05 Image-14-4":
	case "05 Image-14-5":
	case "05 Image-14-6":
	case "05 Image-26-1":
	case "05 Image-26-2":
	case "05 Image-26-3":
	case "05 Image-26-4":
	case "05 Image-26-5":
	case "06 Image-15-1":
	case "06 Image-17-1":
	case "07 Image-04-1":
	case "07 Image-05-1":
	case "07 Image-05-2":
	case "07 Image-05-3":
	case "07 Image-25-1":
	case "07 Image-25-2":
	case "07 Image-26-1":
	case "07 Image-26-2":
	case "07 Image-26-3":
	case "07 Image-38-3":
	case "07 Image-38-5":
	case "07 Image-38-6":
	case "07 Image-38-7":
	case "07 Image-39-1":
	case "07 Image-39-2":
	case "07 Image-39-3":
	case "07 Image-40-1":
	case "07 Image-45-1":
	case "07 Image-46-1":
	case "09 Image-23-2":
	case "09 Image-23-3":
	case "09 Image-25-2":
	case "09 Image-25-3":
	case "09 Image-25-4":
	case "09 Image-25-5":
	case "09 Image-26-1":
	case "11 Image-06-1":
	case "11 Image-14-3":
	case "11 Image-15-1":
	case "11 Image-15-2":
	case "11 Image-15-3":
	case "11 Image-18-2":
	case "11 Image-18-3":
	case "11 Image-19-1":	return("HEX-Listing");

	case "01 Image-05-2":
	case "01 Image-05-3":
	case "01 Image-12-1":
	case "01 Image-13-2":
	case "01 Image-13-3":
	case "02 Image-03-1":
	case "02 Image-26-2":
	case "02 Image-26-3":
	case "03 Image-06-1":
	case "03 Image-06-2":
	case "03 Image-06-3":
	case "03 Image-06-4":
	case "03 Image-06-5":
	case "03 Image-06-6":
	case "04 Image-16-1":
	case "04 Image-19-4":
	case "05 Image-14-1":
	case "05 Image-14-2":
	case "05 Image-14-7":
	case "06 Image-12-6":
	case "07 Image-28-2":
	case "07 Image-28-4":	return("Bildschirmfoto");

	case "01 Image-06-1":
	case "01 Image-06-2":
	case "01 Image-07-1":
	case "01 Image-07-2":
	case "01 Image-08-1":
	case "01 Image-08-2":
	case "01 Image-09-1":
	case "01 Image-09-2":
	case "01 Image-10-1":
	case "01 Image-10-2":
	case "01 Image-17-1":
	case "01 Image-17-2":
	case "01 Image-18-1":
	case "01 Image-18-2":
	case "01 Image-19-1":
	case "01 Image-19-2":
	case "01 Image-20-1":
	case "01 Image-20-2":
	case "01 Image-20-3":
	case "03 Image-11-1":
	case "03 Image-11-2":
	case "03 Image-12-1":
	case "03 Image-12-2":
	case "03 Image-13-1":
	case "03 Image-13-2":
	case "03 Image-14-1":
	case "03 Image-14-2":
	case "03 Image-15-1":
	case "03 Image-17-1":
	case "03 Image-17-2":
	case "03 Image-19-1":
	case "03 Image-20-1":
	case "03 Image-20-2":
	case "03 Image-21-1":
	case "03 Image-21-2":
	case "03 Image-23-1":
	case "03 Image-23-2":
	case "03 Image-24-1":
	case "03 Image-24-2":
	case "03 Image-25-1":
	case "03 Image-25-2":
	case "03 Image-26-1":
	case "03 Image-26-2":
	case "03 Image-27-1":
	case "03 Image-27-2":
	case "03 Image-28-1":
	case "04 Image-03-4":
	case "04 Image-04-1":
	case "04 Image-04-2":
	case "04 Image-04-3":
	case "04 Image-06-4":
	case "04 Image-06-5":
	case "04 Image-07-3":
	case "04 Image-08-1":
	case "04 Image-08-2":
	case "04 Image-09-1":
	case "04 Image-09-2":
	case "04 Image-10-1":
	case "04 Image-10-2":
	case "04 Image-10-3":
	case "04 Image-11-1":
	case "04 Image-11-2":
	case "04 Image-11-3":
	case "04 Image-17-1":
	case "04 Image-17-2":
	case "04 Image-17-3":
	case "04 Image-18-1":
	case "04 Image-18-2":
	case "04 Image-24-1":
	case "04 Image-25-1":
	case "04 Image-25-2":
	case "04 Image-25-3":
	case "05 Image-07-2":
	case "05 Image-19-1":
	case "05 Image-19-2":
	case "06 Image-06-1":
	case "06 Image-06-2":
	case "06 Image-09-1":
	case "06 Image-10-1":
	case "06 Image-10-3":
	case "06 Image-11-1":
	case "06 Image-11-2":
	case "06 Image-12-1":
	case "06 Image-12-3":
	case "06 Image-12-4":
	case "06 Image-15-2":
	case "06 Image-15-3":
	case "06 Image-26-4":
	case "06 Image-27-1":
	case "06 Image-27-2":
	case "07 Image-08-1":
	case "07 Image-08-2":
	case "07 Image-09-1":
	case "07 Image-10-1":
	case "07 Image-11-1":
	case "07 Image-11-2":
	case "07 Image-11-3":
	case "07 Image-12-1":
	case "07 Image-12-2":
	case "07 Image-12-4":
	case "07 Image-13-1":
	case "07 Image-13-2":
	case "07 Image-14-1":
	case "07 Image-14-2":
	case "07 Image-15-1":
	case "07 Image-15-2":
	case "07 Image-15-3":
	case "07 Image-16-1":
	case "07 Image-16-2":
	case "07 Image-16-3":
	case "07 Image-17-1":
	case "07 Image-17-2":
	case "07 Image-18-1":
	case "07 Image-18-2":
	case "07 Image-18-3":
	case "07 Image-19-1":
	case "07 Image-19-2":
	case "07 Image-20-1":
	case "07 Image-20-2":
	case "07 Image-21-1":
	case "07 Image-21-2":
	case "07 Image-21-3":
	case "07 Image-22-1":
	case "07 Image-22-1":
	case "07 Image-22-2":
	case "07 Image-37-2":
	case "07 Image-37-3":
	case "07 Image-38-1":
	case "07 Image-46-2":
	case "07 Image-47-1":
	case "07 Image-47-2":
	case "07 Image-48-1":
	case "07 Image-48-2":
	case "07 Image-49-1":
	case "09 Image-10-2":
	case "09 Image-11-1":
	case "09 Image-11-2":
	case "09 Image-12-1":
	case "09 Image-12-2":
	case "09 Image-13-1":
	case "09 Image-15-1":
	case "09 Image-16-1":
	case "09 Image-16-2":
	case "09 Image-17-1":
	case "09 Image-17-2":
	case "11 Image-12-1":
	case "11 Image-12-2":
	case "11 Image-13-1":
	case "11 Image-13-2":
	case "11 Image-14-1":
	case "11 Image-16-1":
	case "11 Image-16-2":
	case "11 Image-17-1":
	case "11 Image-17-2":
	case "11 Image-17-3":
	case "11 Image-18-1":
	case "11 Image-24-3":
	case "11 Image-29-2":
	case "11 Image-29-3":
	case "11 Image-38-1":
	case "11 Image-38-2":
	case "11 Image-39-1":
	case "11 Image-39-2":
	case "12 Image-16-3":
	case "12 Image-16-4":
	case "12 Image-17-1":
	case "12 Image-17-2":
	case "12 Image-18-1":
	case "12 Image-18-2":
	case "12 Image-19-1":
	case "12 Image-19-2":
	case "12 Image-20-1":
	case "12 Image-20-2":
	case "12 Image-21-1":
	case "12 Image-21-2":
	case "12 Image-22-1":
	case "12 Image-22-2":
	case "12 Image-22-3":	return("ZEAP Z80 Assembler – Source Listing");

	case "03 Image-28-2":
	case "03 Image-28-3":
	case "11 Image-14-2":
	case "12 Image-22-4":	return("ZEAP Z80 Assembler – Symbol Table");

	case "01 Image-09-3":
	case "01 Image-12-2":
	case "01 Image-12-3":
	case "01 Image-26-1":
	case "01 Image-27-1":
	case "01 Image-27-2":
	case "03 Image-07-1":
	case "03 Image-07-2":
	case "03 Image-08-1":
	case "03 Image-08-2":
	case "03 Image-09-1":
	case "03 Image-09-2":
	case "03 Image-10-1":
	case "04 Image-12-1":
	case "04 Image-13-2":
	case "05 Image-05-1":
	case "05 Image-10-1":
	case "05 Image-10-2":
	case "05 Image-11-1":
	case "05 Image-11-2":
	case "05 Image-17-1":
	case "05 Image-17-2":
	case "05 Image-18-1":
	case "05 Image-18-2":
	case "05 Image-21-3":
	case "07 Image-06-1":
	case "07 Image-36-1":
	case "07 Image-36-2":
	case "07 Image-37-1":
	case "07 Image-49-2":
	case "07 Image-50-1":
	case "07 Image-50-2":
	case "09 Image-19-2":
	case "09 Image-22-1":
	case "09 Image-22-2":
	case "09 Image-24-1":
	case "09 Image-24-2":
	case "11 Image-20-1":
	case "11 Image-21-1":
	case "11 Image-35-1":
	case "11 Image-35-2":
	case "12 Image-04-1":
	case "12 Image-04-2":
	case "12 Image-14-3":
	case "12 Image-15-1":
	case "12 Image-15-2":
	case "12 Image-16-1":
	case "12 Image-16-2":
	case "12 Image-19-3":	return("Assembler-Listing");

	case "01 Image-13-1":
	case "01 Image-14-1":
	case "02 Image-14-2":
	case "02 Image-15-1":
	case "02 Image-15-2":
	case "02 Image-15-3":
	case "02 Image-20-1":
	case "02 Image-20-2":
	case "02 Image-21-1":
	case "02 Image-21-2":
	case "02 Image-22-1":
	case "02 Image-22-2":
	case "02 Image-23-2":
	case "03 Image-18-1":
	case "04 Image-26-1":
	case "05 Image-06-1":
	case "05 Image-06-2":
	case "05 Image-07-1":
	case "07 Image-22-3":
	case "07 Image-27-1":
	case "07 Image-27-2":
	case "07 Image-28-1":
	case "07 Image-28-3":
	case "11 Image-30-1":
	case "11 Image-30-2":
	case "11 Image-34-3":
	case "11 Image-34-4":	return("Pascal-Listing");

	case "01 Image-15-1":
	case "01 Image-15-2":
	case "02 Image-09-2":
	case "02 Image-10-1":
	case "02 Image-19-1":
	case "03 Image-17-3":
	case "03 Image-22-1":
	case "03 Image-22-2":
	case "04 Image-07-2":
	case "04 Image-12-2":
	case "04 Image-12-3":
	case "04 Image-12-4":
	case "04 Image-13-1":
	case "04 Image-26-3":
	case "05 Image-04-3":
	case "05 Image-20-1":
	case "05 Image-20-2":
	case "05 Image-21-1":
	case "05 Image-22-1":
	case "05 Image-22-2":
	case "05 Image-23-1":
	case "05 Image-23-2":
	case "05 Image-27-1":
	case "05 Image-27-2":
	case "06 Image-12-2":
	case "06 Image-12-5":
	case "07 Image-06-3":
	case "07 Image-06-4":
	case "07 Image-06-5":
	case "07 Image-06-6":
	case "07 Image-07-1":
	case "07 Image-07-5":
	case "07 Image-32-2":
	case "09 Image-05-3":
	case "09 Image-05-4":
	case "09 Image-22-3":
	case "09 Image-23-1":
	case "11 Image-24-1":
	case "11 Image-24-2":
	case "11 Image-26-1":
	case "11 Image-26-2":
	case "11 Image-27-1":
	case "11 Image-27-2":
	case "11 Image-28-1":
	case "11 Image-28-2":
	case "11 Image-29-1":
	case "11 Image-35-3":
	case "11 Image-38-3":
	case "11 Image-40-2":
	case "11 Image-41-1":
	case "11 Image-41-2":
	case "11 Image-41-3":
	case "11 Image-42-1":
	case "11 Image-42-2":
	case "11 Image-42-3":
	case "11 Image-43-1":
	case "11 Image-43-2":
	case "11 Image-46-1":
	case "11 Image-46-2":
	case "11 Image-46-3":
	case "11 Image-47-1":
	case "11 Image-47-2":
	case "11 Image-47-3":
	case "11 Image-48-1":
	case "11 Image-48-2":
	case "11 Image-48-3":
	case "12 Image-04-3":
	case "12 Image-04-4":
	case "12 Image-05-1":
	case "12 Image-05-2":
	case "12 Image-05-4":
	case "12 Image-06-1":
	case "12 Image-06-2":
	case "12 Image-07-1":
	case "12 Image-07-2":
	case "12 Image-08-1":
	case "12 Image-08-2":
	case "12 Image-09-1":
	case "12 Image-09-2":
	case "12 Image-10-1":
	case "12 Image-10-2":
	case "12 Image-11-1":
	case "12 Image-11-2":
	case "12 Image-12-1":
	case "12 Image-12-2":	return("BASIC-Listing");

	case "11 Image-31-1":
	case "11 Image-32-1":
	case "11 Image-32-2":
	case "11 Image-33-1":
	case "11 Image-33-2":
	case "11 Image-34-1":	return("Disketten-Listing");

	case "01 Image-15-3":
	case "02 Image-04-3":
	case "02 Image-06-1":
	case "02 Image-10-2":
	case "02 Image-26-1":
	case "04 Image-23-2":
	case "05 Image-09-1":
	case "05 Image-13-1":
	case "05 Image-17-3":
	case "05 Image-24-1":
	case "05 Image-24-2":
	case "06 Image-05-1":
	case "06 Image-06-3":
	case "06 Image-08-1":
	case "06 Image-16-2":
	case "06 Image-17-2":
	case "06 Image-17-3":
	case "06 Image-20-1":
	case "06 Image-21-1":
	case "06 Image-22-1":
	case "06 Image-22-2":
	case "06 Image-22-3":
	case "06 Image-23-2":
	case "06 Image-23-3":
	case "06 Image-23-4":
	case "06 Image-23-5":
	case "07 Image-26-4":
	case "07 Image-29-1":
	case "07 Image-33-1":
	case "07 Image-40-2":
	case "09 Image-05-2":
	case "09 Image-06-1":
	case "09 Image-07-2":
	case "09 Image-18-2":
	case "09 Image-18-3":
	case "09 Image-21-1":
	case "09 Image-25-1":
	case "11 Image-06-2":
	case "11 Image-07-1":
	case "11 Image-22-1":
	case "11 Image-23-1":
	case "11 Image-25-1":
	case "11 Image-36-2":
	case "11 Image-37-1":
	case "11 Image-49-1":
	case "12 Image-24-1":
	case "12 Image-26-1":	return("Schaltbild");

	case "02 Image-06-2":
	case "09 Image-13-2":
	case "09 Image-13-3":
	case "09 Image-20-1":
	case "09 Image-20-2":
	case "11 Image-50-1":
	case "11 Image-50-2":
	case "12 Image-25-1":
	case "12 Image-25-2":	return("Layout");

	case "02 Image-05-1":
	case "03 Image-05-1":
	case "05 Image-13-2":
	case "06 Image-07-1":
	case "07 Image-29-2":
	case "09 Image-14-1":
	case "09 Image-18-4":
	case "11 Image-36-3":
	case "11 Image-48-4":
	case "12 Image-23-1":	return("Bestückungsplan");

	case "03 Image-16-1":
	case "03 Image-16-2":
	case "03 Image-16-3":
	case "03 Image-16-4":
	case "06 Image-16-1":
	case "09 Image-09-2":
	case "11 Image-36-1":	return("Zeitdiagramm");

	case "09 Image-10-1":
	case "12 Image-14-1":
	case "12 Image-14-2":	return("Floppy-Spur");

	// 01
	case "01 Image-01-2":	return("Druckausgabe von TV-Bildern");

	case "01 Image-16-1":	case "01 16":	return("NASCOMPL:$nl"."mh$nl"."mh$nl"."mh$nl"."$nl"."(Red.:In der nächsten$nl"."Ausgabe darf er wieder$nl"."mehr sagen!)");

	// 02
	case "02 Image-01-2":	return("platinen-layout:$nl"."SPRACH-$nl"."ERKENNUNG");
	case "02 Image-06-2":	return("SPRACHERKENNUNG &nbsp; Lötseite");
	case "02 Image-16-1":	return("Spielecke");

	case "02 Image-07-1":	case "02 07":	return("NASCOMPL:$nl"."Die linke Hand der Redaktion");

	// 03
	case "03 Image-15-2":	return("Pinbelegung");
	case "03 Image-15-3":
	case "03 Image-15-4":	return("Tabelle");

	case "03 Image-01-2":	return("&quot;PÄCK-MÄNN&quot;$nl"."(klingt wie Pac Man und läuft auch so)");

	case "03 Image-11-3":	case "03 11":	return("NASCOMPL:$nl"."Druckfehler");

	// 04
	case "04 Image-16-2":
	case "04 Image-16-3":
	case "04 Image-16-3":
	case "04 Image-16-4":
	case "04 Image-16-5":
	case "04 Image-16-6":
	case "04 Image-16-7":
	case "04 Image-16-8":	return("Labyrinth");

	case "04 Image-01-2":	return("BASIC VARIANTEN");
	case "04 Image-03-2":	return("* zumindest kamen$nl"."auf unser Angebot$nl"."zur Mitgestaltung$nl"."bisher nur 2$nl"."Zuschriften!");

	case "04 Image-03-5":	case "04 03":	return("NASCOMPL:$nl"."Diese Schmalschrift$nl"."spart Zeit und macht$nl"."Platz für viele$nl"."NASCOMPLs. Zudem$nl"."scheint sie die$nl"."Leser nicht zu$nl"."stören!");
	case "04 Image-11-4":	case "04 11":	return("NASCOMPL:$nl"."Ein selbstgezimmertes TOOL-KIT:$nl"."wirksam und$nl"."vor allem$nl"."preiswert!");
	case "04 Image-19-5":	case "04 19":	return("NASCOMPL:$nl"."Ohne die Änderung$nl"."in Zeile 2680$nl"."finde ich hier$nl"."nie wieder$nl"."heraus!!!");
	case "04 Image-20-1":	case "04 20":	return("NASCOMPL:$nl"."Denken Sie rechtzeitig$nl"."an ein Sommergehäuse$nl"."für Ihren$nl"."Rechner!");
	case "04 Image-26-2":	case "04 26":	return("NASCOMPL:$nl"."Wettervorhersage");

	// 05
	case "05 Image-08-1":	return("Stückliste");
	case "05 Image-15-1":	return("Flussdiagramm");

	case "05 Image-01-2":	return("Hardware:$nl"."Floppy-Controller$nl"."RAM/EPROM-Karte$nl"."MDCR-Verbesserung$nl"."Brother Elektronik 8300");

	case "05 Image-04-1":	case "05 04":	return("NASCOMPL:$nl"."Computer-Treff");
	case "05 Image-16-1":	case "05 16":	return("NASCOMPL:$nl"."Mißtrauische$nl"."Leser sollten$nl"."hier den$nl"."Namen und$nl"."die Adress$nl"."weglassen!!");
	case "05 Image-21-2":	case "05 21":	return("NASCOMPL:$nl"."me not good$nl"."speek$nl"."XTAL BAZIK$nl"."Interbretter");

	// 06
	case "06 Image-16-3":
	case "06 Image-16-4":	return("Foto Multimeter");
	case "06 Image-22-4":	return("Inputs");
	case "06 Image-22-5":	return("Outputs");
	case "06 Image-23-1":	return("Verdrahtungsplan");
	case "06 Image-17-2":	return("Fehlerbeseitigung bei der 80x24$nl"."Videokarte &ndash; ECB$nl"."$nl"."Die beiden Abschirmleitungen für$nl"."den Videotakt wurden durch die$nl"."Platinenherstellerfirma irrtümlich mit$nl"."den Durchkontaktierungen verbunden!$nl"."$nl"."Sorry, KS");

	case "06 Image-01-2":	case "06 01":	return("NASCOMPL:$nl"."Preiswertes$nl"."ECB-BUS-$nl"."SYSTEM$nl"."$nl"."CP/M-kompatibel$nl"."mit NASCOM-Software");
	case "06 Image-10-2":	case "06 10":	return("NASCOMPL:$nl"."Cassetten-Legasthenie");
	case "06 Image-26-2":	case "06 26":	return("NASCOMPL:$nl"."PARDON");

	// 07
	case "07 Image-32-1":	return("PROM-Listing");
	case "07 Image-38-4":	return("Speicherauszug");
	case "07 Image-01-2":	return("jede Menge Software$nl"."neue ECB-Karten$nl"."$nl"."ALLES DREHT SICH UM DEN ECB-BUS$nl"."NEUE AUSSICHTEN FÜR DEN 80-BUS$nl"."$nl"."DOPPELHEFT DM 10,-");

	case "07 Image-07-2":	case "07 07":	return("NASCOMPL:$nl"."Übrigens: 'gefinkelt'$nl"."ist ein schönerer$nl"."Ausdruck für$nl"."'ausgetüftelt'!");
	case "07 Image-07-3":	case "07 07":	return("NASCOMPL:$nl"."Hier ''Graph+J''");
	case "07 Image-07-4":	case "07 07":	return("NASCOMPL:$nl"."Leider ist es mir$nl"."nicht gelungen, in$nl"."diesen NASCOMIC$nl"."eine fortlaufende$nl"."Handlung zu bringen!");
	case "07 Image-12-3":	case "07 12":	return("NASCOMPL:$nl"."ICH SOLL DIESEN$nl"."PLATZ FREIHALTEN!");
	case "07 Image-38-2":	case "07 38":	return("NASCOMPL:$nl"."LIEBER ZWEISPALTIG$nl"."ALS ZWIESPÄTLIG!$nl"."(alte Programmierer-$nl"."Regel)");
	case "07 Image-48-3":	case "07 48":	return("NASCOMPL:$nl"."TSCHULDIGUNG!      PARDON$nl"."Original                  Fälschung");

	// 09
	case "09 Image-06-2":
	case "09 Image-07-1":	return("Anschluss-Tabelle");
	case "09 Image-08-1":	return("Steuerwort-Tabelle");
	case "09 Image-08-2":
	case "09 Image-09-1":	return("Kommando-Tabelle");
	case "09 Image-18-1":	return("Pinbelegung PIO Port A");
	case "09 Image-01-2":	return("FLOPPY-$nl"."Höhenflug");

	case "09 Image-05-1":	case "09 05":	return("NASCOMPL:$nl"."In diesem Heft bin ich$nl"."dünn gesät. Aber es$nl"."kommen auch wieder$nl"."bessere Zeiten!");
	case "09 Image-19-1":	case "09 19":	return("NASCOMPL:$nl"."Layout und$nl"."Bestückungsplan$nl"."folgen weiter$nl"."hinten!");
	case "09 Image-26-2":	case "09 26":	return("NASCOMPL:$nl"."Traurige Zeiten");

	// 11
	case "11 Image-01-2":	return("NASCOM C");
	case "11 Image-08-1":
	case "11 Image-08-2":
	case "11 Image-08-3":	return("Blockdiagramm");
	case "11 Image-22-2":	return("Bildschirm");
	case "11 Image-45-1":	return("Kassenbeleg");
	case "11 Image-28-3":	return("Spruch auf einer Cassettenverpackung$nl"."an die Redaktion:$nl"."&quot;Keine Sorge!!!$nl"."Ist kein Klopapier sondern$nl"."Handtuch.&quot; &nbsp; Sehr beruhigend!");
	case "11 Image-34-2":	return("Zur Erklärung, warum eine$nl"."beschädigte Kassettentasche$nl"."von mir verklebt wurde, stand$nl"."darauf &quot;Hat der Hund$nl"."reingebissen.&quot; Einige Zeit$nl"."später bekam ich die gleiche$nl"."Tasche wieder zurückgeschickt$nl"."mit der Bemerkung: &quot;Hab&rsquo;$nl"."es auch versucht. Was$nl"."schmeckt ihm daran?&quot;");

	case "11 Image-11-1":	case "11 11":	return("NASCOMPL:$nl"."So ein Laufwerk$nl"."erspart viel$nl"."Beinarbeit!");
	case "11 Image-15-4":	case "11 15":	return("NASCOMPL:$nl"."War wohl ein schönes$nl"."Stück Arbeit, Helmut?");
	case "11 Image-40-1":	case "11 40":	return("NASCOMPL:$nl"."Geschenke-Tips");
	case "11 Image-43-3":	case "11 43":	return("NASCOMPL:$nl"."Keine Sorge!$nl"."Das Listing da unten$nl"."ist wirklich nur für$nl"."mich zum Sitzen$nl"."da!");

	// 12
	case "12 Image-05-3":	return("Zeichentabelle");

	case "12 Image-08-3":	case "12 08":	return("NASCOMPL:$nl"."Phönix aus der Asche");
	case "12 Image-26-2":	case "12 26":	return("NASCOMPL:$nl"."Bitte tragen Sie sich hier ein,$nl"."falls Sie irgendwelche$nl"."Programme oder Artikel in$nl"."der Schublade haben! Wir$nl"."brauchen dringend$nl"."noch neue Mitarbeiter!");
	}
	return "";
}

function imageDesc84($issue, $name)
{
	global $nl;

	switch ("$issue $name") {
	case "m1 Image-02-1":	return("Günter Böhm");

	case "m1 Image-01-1":
	case "m1 Image-03-1":
	case "01 Image-01-1":
	case "01 Image-02-1":
	case "02 Image-01-1":
	case "02 Image-02-1":
	case "m2 Image-01-1":
	case "03 Image-01-1":
	case "03 Image-02-1":
	case "04 Image-01-1":
	case "04 Image-02-1":	return("80-Bus$nl"."Journal");

	case "01 Image-52-1":
	case "02 Image-52-1":
	case "03 Image-52-1":
	case "04 Image-52-1":	return("Anzeige LAMPSON Digitaltechnik");

	case "04 Image-51-2":	return("Anzeige GRAF-TECH");

	case "01 Image-12-2":
	case "01 Image-15-1":
	case "01 Image-15-2":
	case "01 Image-15-3":
	case "01 Image-16-1":
	case "01 Image-16-2":
	case "01 Image-16-3":
	case "01 Image-17-1":
	case "01 Image-17-2":
	case "01 Image-17-3":
	case "01 Image-18-1":
	case "01 Image-18-2":
	case "01 Image-18-3":
	case "01 Image-24-3":
	case "01 Image-25-1":
	case "01 Image-25-2":
	case "01 Image-26-1":
	case "01 Image-26-2":
	case "01 Image-26-3":
	case "01 Image-26-4":
	case "01 Image-26-5":
	case "02 Image-23-1":
	case "02 Image-24-1":
	case "02 Image-25-1":
	case "02 Image-27-1":
	case "02 Image-28-1":
	case "02 Image-28-2":
	case "02 Image-28-3":
	case "02 Image-28-4":
	case "02 Image-29-1":
	case "02 Image-29-2":
	case "02 Image-33-3":
	case "04 Image-16-5":	return("HEX-Listing");

	case "01 Image-35-4":
	case "01 Image-36-1":
	case "01 Image-46-1":
	case "01 Image-47-2":
	case "01 Image-48-1":
	case "01 Image-48-2":
	case "02 Image-20-1":
	case "02 Image-20-2":
	case "02 Image-21-1":
	case "02 Image-35-3":
	case "02 Image-36-1":
	case "02 Image-36-2":
	case "02 Image-45-1":
	case "03 Image-36-3":
	case "03 Image-36-4":
	case "03 Image-37-1":
	case "03 Image-42-1":
	case "03 Image-42-2":
	case "03 Image-43-1":
	case "03 Image-43-2":
	case "03 Image-45-3":
	case "04 Image-22-2":
	case "04 Image-22-3":
	case "04 Image-23-1":
	case "04 Image-23-2":
	case "04 Image-24-1":
	case "04 Image-25-1":
	case "04 Image-25-2":
	case "04 Image-29-1":
	case "04 Image-29-2":
	case "04 Image-30-1":
	case "04 Image-30-2":
	case "04 Image-44-2":
	case "04 Image-45-1":
	case "04 Image-45-2":
	case "04 Image-46-1":
	case "04 Image-46-2":
	case "04 Image-48-1":	return("Assembler-Listing");

	case "01 Image-11-1":
	case "01 Image-11-2":
	case "01 Image-12-1":
	case "01 Image-14-2":
	case "01 Image-20-1":
	case "01 Image-20-2":
	case "01 Image-21-1":
	case "01 Image-21-2":
	case "01 Image-21-3":
	case "01 Image-22-1":
	case "01 Image-22-2":
	case "01 Image-22-3":
	case "01 Image-23-1":
	case "01 Image-23-2":
	case "01 Image-24-1":
	case "01 Image-24-2":
	case "01 Image-36-2":
	case "01 Image-40-2":
	case "01 Image-41-1":
	case "01 Image-41-2":
	case "01 Image-42-1":
	case "01 Image-42-2":
	case "01 Image-43-1":
	case "01 Image-43-2":
	case "01 Image-44-1":
	case "01 Image-44-2":
	case "01 Image-47-1":
	case "01 Image-49-1":
	case "01 Image-49-2":
	case "01 Image-50-1":
	case "01 Image-50-2":
	case "01 Image-50-3":
	case "02 Image-16-1":
	case "02 Image-16-2":
	case "02 Image-17-1":
	case "02 Image-23-2":
	case "02 Image-33-1":
	case "02 Image-33-2":
	case "02 Image-50-1":
	case "02 Image-51-1":
	case "03 Image-28-3":
	case "03 Image-29-1":
	case "03 Image-29-2":
	case "03 Image-30-1":
	case "03 Image-30-2":
	case "03 Image-31-1":
	case "03 Image-31-2":
	case "03 Image-32-1":
	case "03 Image-32-2":
	case "03 Image-33-1":
	case "03 Image-33-2":
	case "03 Image-34-1":
	case "03 Image-34-2":
	case "03 Image-35-1":
	case "03 Image-35-2":
	case "03 Image-36-2":
	case "03 Image-37-2":
	case "03 Image-37-3":
	case "03 Image-38-1":
	case "03 Image-38-2":
	case "03 Image-39-1":
	case "03 Image-39-2":
	case "03 Image-40-1":
	case "03 Image-40-2":
	case "03 Image-40-3":
	case "03 Image-41-1":
	case "03 Image-41-2":
	case "03 Image-41-3":
	case "03 Image-44-1":
	case "03 Image-44-2":
	case "03 Image-45-1":
	case "03 Image-46-1":
	case "03 Image-46-2":
	case "03 Image-47-1":
	case "03 Image-47-2":
	case "03 Image-50-3":
	case "03 Image-51-1":
	case "04 Image-06-1":
	case "04 Image-06-2":
	case "04 Image-07-1":
	case "04 Image-07-2":
	case "04 Image-07-3":
	case "04 Image-08-1":
	case "04 Image-08-2":
	case "04 Image-09-1":
	case "04 Image-10-1":
	case "04 Image-10-2":
	case "04 Image-11-1":
	case "04 Image-11-2":
	case "04 Image-17-1":
	case "04 Image-18-1":
	case "04 Image-18-2":
	case "04 Image-19-1":
	case "04 Image-19-2":
	case "04 Image-20-1":
	case "04 Image-20-2":
	case "04 Image-21-1":
	case "04 Image-21-2":
	case "04 Image-22-1":
	case "04 Image-26-1":
	case "04 Image-27-1":
	case "04 Image-27-2":
	case "04 Image-31-1":
	case "04 Image-37-1":
	case "04 Image-37-2":
	case "04 Image-38-1":
	case "04 Image-38-2":
	case "04 Image-39-1":
	case "04 Image-40-1":
	case "04 Image-40-2":
	case "04 Image-41-1":
	case "04 Image-41-2":
	case "04 Image-42-1":
	case "04 Image-42-2":	return("ZEAP Z80 Assembler – Source Listing");

	case "03 Image-36-1":
	case "03 Image-41-4":	return("ZEAP Z80 Assembler – Symbol Table");

	case "01 Image-12-3":
	case "01 Image-13-1":
	case "01 Image-13-2":
	case "01 Image-14-1":
	case "01 Image-34-1":
	case "02 Image-10-1":
	case "02 Image-11-1":
	case "02 Image-11-2":
	case "02 Image-18-1":
	case "02 Image-18-2":
	case "02 Image-19-1":
	case "02 Image-19-2":
	case "02 Image-19-3":
	case "02 Image-22-1":
	case "02 Image-25-2":
	case "02 Image-26-1":
	case "02 Image-26-3":
	case "02 Image-26-4":
	case "02 Image-33-4":
	case "02 Image-36-3":
	case "02 Image-37-3":
	case "02 Image-37-4":
	case "02 Image-38-1":
	case "02 Image-38-2":
	case "02 Image-38-3":
	case "02 Image-40-2":
	case "02 Image-40-3":
	case "02 Image-41-1":
	case "02 Image-41-2":
	case "02 Image-41-3":
	case "02 Image-41-4":
	case "02 Image-42-1":
	case "02 Image-42-2":
	case "02 Image-43-1":
	case "02 Image-43-2":
	case "02 Image-44-1":
	case "02 Image-44-2":
	case "02 Image-44-3":
	case "03 Image-45-2":
	case "03 Image-50-1":
	case "03 Image-50-2":	return("BASIC-Listing");

	case "02 Image-39-1":
	case "02 Image-39-2":
	case "02 Image-40-1":
	case "03 Image-48-1":
	case "03 Image-48-2":
	case "04 Image-39-2":
	case "04 Image-42-3":	return("Pascal-Listing");

	case "m2 Image-06-1":
	case "m2 Image-06-2":
	case "m2 Image-07-1":
	case "m2 Image-07-2":
	case "03 Image-07-1":
	case "03 Image-07-2":
	case "03 Image-07-3":
	case "03 Image-08-1":
	case "03 Image-08-2":
	case "03 Image-08-3":
	case "04 Image-04-1":
	case "04 Image-05-1":
	case "04 Image-05-2":
	case "04 Image-05-3":
	case "04 Image-05-4":
	case "04 Image-05-5":
	case "04 Image-05-6":
	case "04 Image-05-7":
	case "04 Image-05-8":	return("Disketten-Listing");

	case "01 Image-14-3":
	case "01 Image-35-3":
	case "02 Image-15-1":
	case "02 Image-15-2":
	case "02 Image-17-2":
	case "02 Image-17-3":
	case "02 Image-37-1":	return("Bildschirmfoto");

	case "01 Image-08-1":
	case "01 Image-09-1":
	case "01 Image-32-1":
	case "01 Image-33-1":
	case "01 Image-33-2":
	case "01 Image-34-2":
	case "01 Image-35-1":
	case "01 Image-38-1":
	case "02 Image-07-1":
	case "02 Image-09-1":
	case "02 Image-29-3":
	case "02 Image-31-1":
	case "02 Image-34-1":
	case "02 Image-45-2":
	case "02 Image-46-5":
	case "02 Image-49-1":
	case "02 Image-51-2":
	case "03 Image-10-2":
	case "03 Image-11-3":
	case "03 Image-13-1":
	case "03 Image-19-1":
	case "03 Image-20-1":
	case "03 Image-21-1":
	case "03 Image-21-2":
	case "03 Image-24-1":
	case "03 Image-28-1":
	case "03 Image-28-2":
	case "03 Image-45-4":
	case "04 Image-12-1":
	case "04 Image-13-1":
	case "04 Image-16-4":
	case "04 Image-44-1":
	case "04 Image-47-1":
	case "04 Image-49-1":
	case "04 Image-50-2":
	case "04 Image-51-1":	return("Schaltbild");

	case "01 Image-06-2":
	case "01 Image-06-3":
	case "02 Image-32-1":
	case "02 Image-32-2":
	case "03 Image-09-2":
	case "03 Image-16-1":	return("Layout");

	case "01 Image-07-1":
	case "01 Image-39-1":
	case "02 Image-08-1":
	case "02 Image-30-1":
	case "02 Image-35-2":
	case "02 Image-46-4":
	case "03 Image-09-1":
	case "03 Image-10-1":
	case "03 Image-11-1":
	case "03 Image-11-2":
	case "03 Image-14-1":
	case "03 Image-15-2":
	case "03 Image-17-1":
	case "03 Image-25-1":
	case "03 Image-26-1":
	case "04 Image-47-2":
	case "04 Image-49-2":
	case "04 Image-50-1":	return("Bestückungsplan");

	case "01 Image-05-1":
	case "01 Image-06-1":
	case "02 Image-35-1":
	case "02 Image-46-3":
	case "03 Image-12-1":
	case "03 Image-12-2":
	case "03 Image-23-1":	return("Stückliste");

	case "01 Image-10-1":
	case "02 Image-46-2":
	case "04 Image-14-1":
	case "04 Image-16-2":	return("Zeitdiagramm");

	// m1
	case "m1 Image-05-1":	return("Noch ein Ausschnitt:");

	case "m1 Image-01-2":	case "m1 01":	return("NASCOMPL:$nl"."MINI-$nl"."AUSGABE");
	case "m1 Image-05-2":	case "m1 03":	return("NASCOMPL:$nl"."* wurde leider auf der Cassette gelöscht.$nl"."Wird im Doppelheft nachgeliefert!");
	case "m1 Image-12-1":	case "m1 12":	return("NASCOMPL:$nl"."HABEN SIE$nl"."EIGENTLICH$nl"."IHR ABO 84$nl"."SCHON$nl"."BEZAHLT??");

	// 01
	case "01 Image-01-2":	return("Grafik-Karte");
	case "01 Image-33-3":	return("Belegung der VG-64 Leiste");
	case "01 Image-40-1":	return("Porttabelle");
	case "01 Image-51-1":	return("Brücken-Tabelle");
	case "01 Image-51-2":	return("Pin-Tabelle");

	case "01 Image-18-4":	case "01 18":	return("NASCOMPL:$nl"."Hab&rsquo; heute gar keine$nl"."rechte Lust, mich zu$nl"."zeigen!");
	case "01 Image-26-6":	case "01 26":	return("NASCOMPL:$nl"."Viel Tool,$nl"."viel Mom!");
	case "01 Image-26-7":	case "01 26":	return("NASCOMPL:$nl"."Mitarbeiter$nl"."dieser$nl"."Ausgabe");
	case "01 Image-35-2":	case "01 35":	return("NASCOMPL:$nl"."Die Kleine kommt mir$nl"."so bekannt vor!");

	// 02
	case "02 Image-01-2":	return("PROGRAMMIERUNG DES GDP$nl"."HARDCOPY DER GRAFIKKARTE$nl"."NEUE CPU-KARTE$nl"."NEUE ECB-KARTEN");
	case "02 Image-11-3":	return("Anschlussbild");
	case "02 Image-12-1":	return("Register Address");
	case "02 Image-12-2":	return("Control Register 1 (Read/Write)");
	case "02 Image-12-3":	return("Control Register 2 (Read/Write)");
	case "02 Image-13-1":	return("Command Register");
	case "02 Image-13-2":	return("Status Register 2 (Read only)");
	case "02 Image-14-1":	return("Commands");
	case "02 Image-14-2":	return("Type of character orientation");
	case "02 Image-14-3":	return("C-Size Register (Read/Write)");
	case "02 Image-14-4":	return("XLP and YLP Registers");
	case "02 Image-37-2":	return("Anweisung");
	case "02 Image-46-1":	return("Frequenztabelle");

	case "02 Image-06-1":	case "02 06":	return("NASCOMPL:$nl"."+ Sammel-BAS=$nl"."Menu für$nl"."Bandpaß, Rechner$nl"."u. Schwingkreis");
	case "02 Image-26-2":	case "02 26":	return("NASCOMPL:$nl"."Ein Cola-Editor$nl"."wäre mir jetzt$nl"."auch sehr$nl"."angenehm!");
	case "02 Image-38-4":	case "02 38":	return("NASCOMPL:$nl"."Von der Wiege bis$nl"."zur Bahre schreibt$nl"."der NASCOM Formulare!");
	case "02 Image-45-3":	case "02 45":	return("NASCOMPL:$nl"."Der Generator$nl"."sollte$nl"."direkt$nl"."am Bus$nl"."betrieben$nl"."werden");

	// m2
	case "m2 Image-05-1":	return("Datenblatt Federleisten");

	case "m2 Image-01-2":	return("NASCOMPL:$nl"."MINI-$nl"."AUSGABE");
	case "m2 Image-08-1":	return("NASCOMPL:$nl"."OHNE IHRE$nl"."BEITRÄGE$nl"."LÄUFT HIER$nl"."NICHTS!!");

	// 03
	case "03 Image-23-2":	return("Technische Daten");

	case "03 Image-01-2":	return("NASCOMPL:$nl"."CP/M läuft!");
	case "03 Image-04-1":	return("Hans Rietveld.");
	case "03 Image-15-1":	case "03 15":	return("NASCOMPL:$nl"."Computer-Treff$nl"."$nl"."Diesmal kein Witz!!");

	// 04
	case "04 Image-04-2":	return("!");
	case "04 Image-14-2":	return("Diskette");
	case "04 Image-16-1":	return("A.C. Characteristics");
	case "04 Image-16-3":	return("Legende");

	case "04 Image-01-2":	return("AUSGABE 4/84");
	case "04 Image-15-1":	case "04 15":	return("NASCOMPL:$nl"."Unser Format$nl"."ist nach wie$nl"."vor ca. 11cm$nl"."pro Spalte$nl"."(vor der Verklei-$nl"."nerung)$nl"."Bitte beachten!");
	case "04 Image-28-1":	case "04 28":	return("NASCOMPL:$nl"."Keine Angst$nl"."vor$nl"."Druckerpuffern!");
	case "04 Image-36-1":	case "04 36":	return("NASCOMPL:$nl"."LAMPSON hat$nl"."nichts dagegen");
	case "04 Image-46-3":	case "04 46":	return("NASCOMPL:$nl"."Nachträglich:$nl"."EIN GESUNDES$nl"."NEUES JAHR!!$nl"."Auf gute$nl"."Zusammenarbeit 1985&nbsp;!");
	}
	return "";
}

function imageDesc85($issue, $name)
{
	global $nl;

	switch ("$issue $name") {
	case "m3 Image-12-2":	return("Anzeige SYSTEC");

	case "m3 Image-09-1":
	case "m3 Image-09-2":
	case "m3 Image-09-3":
	case "m3 Image-09-4":
	case "m3 Image-09-5":
	case "m3 Image-09-6":
	case "m3 Image-09-7":
	case "m3 Image-09-8":
	case "m3 Image-09-9":	return("BASIC-Listing");

	case "m3 Image-04-1":
	case "m3 Image-04-2":
	case "m3 Image-04-3":
	case "m3 Image-04-4":
	case "m3 Image-04-5":
	case "m3 Image-04-6":
	case "m3 Image-04-7":
	case "m3 Image-04-8":	return("Disketten-Listing");

	// m3
	case "m3 Image-03-1":	return("neu!");
	case "m3 Image-07-1":	return("Anordnung Adapterkarte");
	case "m3 Image-12-1":	return("Briefumschlag");

	case "m3 Image-01-1":	return("80-Bus$nl"."Journal");
	case "m3 Image-01-2":	return("NASCOMPL:$nl"."MINI-$nl"."AUSGABE");
	}
	return "";
}

function imageDescInmcNews($issue, $name)
{
	global $nl;

	switch ("$issue $name") {
	// 01
	case "01 Image-00-1":	return "INMC NEWS issue 1";

	// 02
	case "02 Image-00-1":	return "INMC NEWS issue 2";

	// 03
	case "03 Image-00-1":	return "INMC NEWS issue 3";
	case "03 Image-01-1":	return "UNFORTUNATELY";
	case "03 Image-01-2":	return "THIS COULD CONCERN YOU";

	// 04
	case "04 Image-00-1":	return "INMC NEWS issue 4";
	case "04 Image-07-1":	return "NASCOM";
	case "04 Image-10-1":	return "SPECIAL OFFERS";
	case "04 Image-18-1":	return "ADD-ON GRAPHICS REVIEW";
	case "04 Image-21-1":	return "NAS-SYS ONE: a brief Glimpse";
	case "04 Image-30-1":	return "Lawrence";

	// 05
	case "05 Image-00-1":	return "INMC NEWS issue 5";

	// 06
	case "06 Image-00-1":	return "INMC NEWS issue 6";
	case "06 Image-01-1":	return "n m";
	case "06 Image-01-2":	return "news release";
	case "06 Image-02-1":	return "NASPEN";
	case "06 Image-15-1":	return "BOOBS";
	case "06 Image-17-1":	return "Memory maps";
	case "06 Image-23-1":	return "Program hints";

	// 07
	case "07 Image-00-1":	return "INMC NEWS issue 7";
	case "07 Image-01-1":	return "D. R. Hunt";
	case "07 Image-11-1":	return "Impact Matrix Printer";
	case "07 Image-33-1":	return "Book Review";
	case "07 Image-35-1":	return "Library";
	case "07 Image-38-1":	return "NASCOM";
	case "07 Image-38-2":	return "I/O BOARD";
	case "07 Image-38-3":	return "BOARD";
	case "07 Image-38-4":	return "PIO";
	case "07 Image-38-5":	return "CTC";
	case "07 Image-38-6":	return "UART";
	case "07 Image-38-7":	return "NASCOM EXPANDS";
	case "07 Image-38-8":	return "NM";
	}
	return "";
}

function imageDescInmc80News($issue, $name)
{
	global $nl;

	switch ("$issue $name") {
	// 01
	case "01 Image-01-1":	return "INMC 80 NEWS Issue: 1";
	case "01 Image-03-1":	return "Dave Hunt";
	case "01 Image-36-2":	return "WHAT ?";
	case "01 Image-43-2":	return "interface software";
	case "01 Image-46-1":	return "WARNING~8A";
	case "01 Image-16-3":	return "DOTS";
	case "01 Image-18-1":	return "HEX~&gt;?";
	case "01 Image-19-1":	return "Z80 made simple";
	case "01 Image-30-1":	return "4MHZ";
	case "01 Image-31-1":	return "PASCAL Notes";
	case "01 Image-32-1":	return "Z80 Books";
	case "01 Image-34-2":	return "Doctor Dark&rsquo;s Diary";
	case "01 Image-36-2":	return "WHAT ?";
	case "01 Image-42-2":	return "BASIC";
	case "01 Image-43-2":	return "interface software";
	case "01 Image-46-1":	return "WARNING~8A";

	// 02
	case "02 Image-01-1":	return "INMC 80 NEWS Issue: 2";
	case "02 Image-17-1":	return "Doctor Dark&rsquo;s Diary";
	case "02 Image-34-2":	return "BASIC";
	case "02 Image-45-1":	return "IMPERSONAL";
	case "02 Image-46-1":	return "Z80 Books";
	case "02 Image-53-1":	return "interface components";
	case "02 Image-54-2":	return "JOIN US HERE";

	// 03
	case "03 Image-01-1":	return "INMC 80 NEWS Issue: 3";
	case "03 Image-16-1":	return "32K&rarr;48K Expansion";
	case "03 Image-20-1":	return "Doctor Dark&rsquo;s Diary";
	case "03 Image-30-2":	return "IMPERSONAL";
	case "03 Image-32-1":	return "Z80 made simple";
	case "03 Image-39-1":	return "Printers";

	// 04
	case "04 Image-01-1":	return "INMC 80 NEWS Issue: 4";
	case "04 Image-17-1":	return "INMC80";
	case "04 Image-18-1":	return "PASCAL";
	case "04 Image-24-1":	return "NEWBUS";
	case "04 Image-31-1":	return "Basic";
	case "04 Image-33-1":	return "Dr. D&rsquo;s Diary";
	case "04 Image-41-1":	return "1.5 Mbaud";
	case "04 Image-45-1":	return "Z80 Guide";
	case "04 Image-52-1":	return "VIDEO";
	case "04 Image-54-1":	return "Sound &amp; Music";
	case "04 Image-55-1":	return "Add ons";
	case "04 Image-58-1":	return "IMPRINT";
	case "04 Image-60-1":	return "Game Idea";
	case "04 Image-61-1":	return "Z80 Ops";
	case "04 Image-64-1":	return "Strings";
	case "04 Image-68-2":	return "IMPERSONAL";

	// 05
	case "05 Image-01-1":	return "INMC 80 NEWS Issue: 5";
	case "05 Image-02-1":	return "The&lsquo;DH&rsquo;Show";
	case "05 Image-07-1":	return "LETTERS";
	case "05 Image-18-1":	return "CAT";
	case "05 Image-19-1":	return "N1 Graphics";
	case "05 Image-22-1":	return "Sound Board";
	case "05 Image-25-1":	return "sound";
	case "05 Image-30-1":	return "N2 Keyboard";
	case "05 Image-32-1":	return "2K&rsquo;s on an N2";
	case "05 Image-36-1":	return "SUBS";
	case "05 Image-34-1":	return "Disk Review";
	case "05 Image-37-1":	return "Disks &amp; CP/M";
	case "05 Image-40-1":	return "SPEECH";
	case "05 Image-41-1":	return "EPROM PROG.";
	case "05 Image-42-1":	return "Z80 Guide";
	case "05 Image-50-1":	return "BLS PASCAL";
	case "05 Image-53-1":	return "SYS";
	case "05 Image-55-1":	return "PRINT Routine";
	case "05 Image-58-1":	return "Book";
	case "05 Image-59-1":	return "VIDEO ROUTINE";
	case "05 Image-62-2":	return "Multi-load";
	case "05 Image-63-1":	return "G&egrave;t s&ouml;m&egrave; &Scirc;TYL&Egrave;&nbsp;!";
	case "05 Image-66-1":	return "Misc.";
	}
	return "";
}

function imageDesc80BusNews($issue, $name)
{
	global $nl;

	switch ("$issue $name") {
	case "11 Image-01-1":
	case "12 Image-01-1":
	case "13 Image-01-1":
	case "14 Image-01-1":
	case "21 Image-01-1":
	case "22 Image-01-1":
	case "23 Image-01-1":
	case "24 Image-01-1":
	case "25 Image-01-1":
	case "26 Image-01-1":
	case "31 Image-01-1":
	case "32 Image-01-1":
	case "33 Image-01-1":
	case "34 Image-01-1":
	case "35 Image-01-1":
	case "36 Image-01-1":
	case "41 Image-01-1":
	case "42 Image-01-1":

	case "11 Image-02-1":
	case "12 Image-02-1":
	case "13 Image-02-1":
	case "14 Image-02-1":
	case "21 Image-02-1":
	case "22 Image-02-1":
	case "23 Image-02-1":
	case "24 Image-02-1":
	case "25 Image-02-1":
	case "26 Image-02-1":
	case "31 Image-02-1":
	case "32 Image-02-1":
	case "33 Image-02-1":
	case "34 Image-02-1":
	case "35 Image-02-1":
	case "36 Image-02-1":
	case "41 Image-02-1":
	case "42 Image-02-1":	return "80-BUS NEWS";

	case "11 Image-01-2":
	case "12 Image-01-2":
	case "13 Image-01-2":
	case "14 Image-01-2":
	case "21 Image-01-2":
	case "22 Image-01-2":
	case "23 Image-01-2":
	case "24 Image-01-2":
	case "25 Image-01-2":
	case "26 Image-01-2":
	case "31 Image-01-2":
	case "32 Image-01-2":
	case "33 Image-01-2":
	case "34 Image-01-2":
	case "35 Image-01-2":
	case "36 Image-01-2":
	case "41 Image-01-2":
	case "42 Image-01-2":	return " ";

	case "13 Image-45-1":
	case "14 Image-48-1":
	case "22 Image-52-1":
	case "24 Image-53-1":	return "Lawrence";

	case "11 Image-51-1":
	case "11 Image-52-1":
	case "11 Image-53-1":
	case "11 Image-53-2":
	case "11 Image-53-3":
	case "11 Image-54-1":
	case "11 Image-54-2":
	case "11 Image-54-3":
	case "11 Image-55-1":
	case "11 Image-55-2":
	case "12 Image-49-1":
	case "12 Image-49-2":
	case "12 Image-49-3":
	case "12 Image-49-4":
	case "12 Image-50-1":
	case "12 Image-50-2":
	case "12 Image-50-3":
	case "12 Image-50-4":
	case "12 Image-51-1":
	case "12 Image-52-1":
	case "12 Image-53-1":
	case "12 Image-54-1":
	case "12 Image-54-2":
	case "12 Image-54-3":
	case "12 Image-55-1":
	case "12 Image-55-2":
	case "12 Image-55-3":
	case "13 Image-46-1":
	case "13 Image-47-1":
	case "13 Image-47-2":
	case "13 Image-47-3":
	case "13 Image-48-1":
	case "13 Image-49-1":
	case "13 Image-50-1":
	case "13 Image-50-2":
	case "13 Image-50-3":
	case "13 Image-51-1":
	case "14 Image-49-1":
	case "14 Image-49-2":
	case "14 Image-49-3":
	case "14 Image-50-1":
	case "14 Image-50-2":
	case "14 Image-50-3":
	case "14 Image-51-1":
	case "21 Image-55-1":
	case "21 Image-55-2":
	case "21 Image-55-3":
	case "21 Image-56-1":
	case "22 Image-53-1":
	case "22 Image-53-2":
	case "22 Image-53-3":
	case "22 Image-54-1":
	case "22 Image-54-2":
	case "22 Image-54-3":
	case "22 Image-54-4":
	case "22 Image-55-1":
	case "23 Image-58-1":
	case "23 Image-58-2":
	case "23 Image-58-3":
	case "23 Image-59-1":
	case "23 Image-59-2":
	case "24 Image-54-1":
	case "24 Image-55-1":
	case "24 Image-55-2":
	case "24 Image-55-3":	return("Advertising");

	case "11 Image-13-2":
	case "12 Image-09-1":
	case "12 Image-09-2":
	case "12 Image-09-3":
	case "12 Image-09-4":
	case "12 Image-09-5":
	case "12 Image-09-6":
	case "12 Image-20-1":
	case "12 Image-41-2":
	case "14 Image-28-3":
	case "22 Image-10-3":
	case "22 Image-27-1":
	case "22 Image-27-2":
	case "22 Image-28-1":
	case "22 Image-28-2":	return("Hex Dump");

	case "11 Image-46-1":
	case "12 Image-06-2":
	case "12 Image-07-1":
	case "12 Image-13-1":
	case "12 Image-14-1":
	case "12 Image-25-1":
	case "12 Image-31-1":
	case "12 Image-31-2":
	case "12 Image-32-1":
	case "12 Image-32-2":
	case "12 Image-33-1":
	case "12 Image-33-2":
	case "12 Image-34-1":
	case "12 Image-34-2":
	case "12 Image-35-1":
	case "12 Image-35-2":
	case "12 Image-39-1":
	case "12 Image-40-1":
	case "12 Image-41-1":
	case "13 Image-09-1":
	case "13 Image-18-1":
	case "13 Image-20-1":
	case "13 Image-36-1":
	case "13 Image-38-1":
	case "13 Image-39-1":
	case "13 Image-39-2":
	case "13 Image-40-1":
	case "13 Image-41-1":
	case "13 Image-42-1":
	case "14 Image-22-1":
	case "14 Image-25-1":
	case "14 Image-25-2":
	case "14 Image-26-1":
	case "14 Image-26-2":
	case "14 Image-27-1":
	case "14 Image-27-2":
	case "14 Image-28-1":
	case "14 Image-36-1":
	case "14 Image-36-2":
	case "14 Image-37-1":
	case "14 Image-37-2":
	case "14 Image-38-1":
	case "14 Image-38-2":
	case "14 Image-39-1":
	case "14 Image-39-2":
	case "14 Image-40-1":
	case "14 Image-40-3":
	case "14 Image-41-1":
	case "14 Image-41-2":
	case "14 Image-46-1":
	case "14 Image-46-2":
	case "21 Image-19-3":
	case "21 Image-28-1":
	case "22 Image-22-1":
	case "22 Image-40-1":
	case "22 Image-40-2":
	case "22 Image-41-1":
	case "22 Image-48-1":
	case "22 Image-48-2":
	case "23 Image-41-1":
	case "23 Image-41-2":
	case "23 Image-42-1":
	case "23 Image-42-2":
	case "23 Image-43-1":
	case "23 Image-47-1":
	case "23 Image-47-2":
	case "23 Image-48-1":
	case "23 Image-48-2":
	case "23 Image-49-1":
	case "23 Image-49-2":
	case "23 Image-50-1":
	case "24 Image-13-1":
	case "24 Image-14-1":
	case "24 Image-14-2":
	case "24 Image-15-1":
	case "24 Image-15-2":
	case "24 Image-16-1":
	case "24 Image-16-2":
	case "24 Image-37-1":	return("Assembler Listing");

	case "14 Image-28-2":
	case "14 Image-40-2":
	case "14 Image-41-3":
	case "22 Image-41-2":
	case "23 Image-50-2":
	case "23 Image-50-3":	return("Symbol Table");

	case "11 Image-21-1":
	case "11 Image-22-1":
	case "11 Image-23-1":
	case "11 Image-24-1":
	case "14 Image-14-2":
	case "14 Image-15-1":
	case "14 Image-15-2":
	case "14 Image-16-1":
	case "14 Image-16-2":
	case "22 Image-09-1":
	case "22 Image-09-2":
	case "22 Image-10-1":
	case "22 Image-10-2":
	case "23 Image-07-1":
	case "23 Image-07-2":	return("ZEAP Z80 Assembler – Source Listing");

	case "11 Image-24-2":	return("ZEAP Z80 Assembler – Symbol Table");

	case "11 Image-49-2":
	case "11 Image-50-1":
	case "12 Image-07-2":
	case "12 Image-10-1":
	case "12 Image-14-2":
	case "12 Image-21-1":
	case "13 Image-09-2":
	case "13 Image-17-1":
	case "13 Image-17-2":
	case "13 Image-19-1":
	case "13 Image-19-2":
	case "13 Image-20-2":
	case "14 Image-33-1":
	case "14 Image-34-1":
	case "14 Image-35-1":
	case "14 Image-35-2":
	case "21 Image-18-1":
	case "21 Image-18-2":
	case "21 Image-19-1":
	case "21 Image-19-2":
	case "22 Image-41-3":
	case "22 Image-42-1":
	case "22 Image-42-2":
	case "22 Image-47-1":
	case "22 Image-47-2":
	case "23 Image-14-1":
	case "23 Image-17-1":
	case "23 Image-18-1":
	case "23 Image-46-1":	return("BASIC Listing");

	case "13 Image-12-1":
	case "23 Image-43-2":
	case "23 Image-44-1":
	case "23 Image-44-2":
	case "23 Image-45-1":
	case "23 Image-45-2":	return("Pascal Listing");

	case "23 Image-05-4":	return("Screenshot");

	case "11 Image-12-2":
	case "11 Image-20-1":
	case "11 Image-30-1":
	case "11 Image-30-2":
	case "13 Image-04-1":
	case "13 Image-23-1":
	case "13 Image-25-1":
	case "13 Image-26-1":
	case "13 Image-26-2":
	case "13 Image-27-1":
	case "13 Image-27-2":
	case "13 Image-28-1":
	case "13 Image-28-2":
	case "13 Image-28-3":
	case "13 Image-28-4":
	case "13 Image-28-5":
	case "13 Image-34-1":
	case "14 Image-44-1":
	case "14 Image-44-2":
	case "22 Image-08-1":
	case "22 Image-08-2":
	case "22 Image-21-1":
	case "22 Image-21-2":
	case "22 Image-45-1":
	case "23 Image-05-1":
	case "23 Image-05-2":
	case "23 Image-05-3":
	case "23 Image-09-1":
	case "23 Image-09-2":
	case "23 Image-22-1":
	case "24 Image-36-1":	return("Circuit Diagram");

	case "13 Image-36-2":
	case "13 Image-37-1":
	case "22 Image-20-1":	return("Timing Diagram");

	// 11
	case "11 Image-04-1":	return "Dear Ed.";
	case "11 Image-08-1":	return "N2 VIDEO";
	case "11 Image-09-1":	return "DOS";
	case "11 Image-11-1":	return "GROUPS";
	case "11 Image-12-1":	return "64K";
	case "11 Image-13-1":	return "The Dr.";
	case "11 Image-17-1":	return "RTC Board";
	case "11 Image-25-1":	return "CP/M";
	case "11 Image-33-1":	return "books";
	case "11 Image-35-1":	return "Disks";
	case "11 Image-39-1":	return "CB";
	case "11 Image-42-1":	return "Multi-Map";
	case "11 Image-47-1":	return "N1 Graphics";
	case "11 Image-48-1":	return "Really ??";
	case "11 Image-49-1":	return "N2 program";

	// 12
	case "12 Image-06-1":	return("DDT Listing");

	// 14
	case "14 Image-13-1":	return("Diagram I : Schematic Summary Of Connections.");
	case "14 Image-14-1":	return("Table 1: Nascom 2 PIO / Epson MX80 connections..");

	// 21
	case "21 Image-21-1":
	case "21 Image-26-1":	return("Memory Mapping");
	case "21 Image-23-1":	return("Disk Mapping");

	// 22
	case "22 Image-25-1":	return("Screen Mapping");
	}
	return "";
}

function imageDescScorpioNews($issue, $name)
{
	global $nl;

	switch ("$issue $name") {
	case "11 Image-01-1":
	case "12 Image-01-1":
	case "13 Image-01-1":
	case "14 Image-01-1":
	case "21 Image-01-1":
	case "22 Image-01-1":
	case "23 Image-01-1":
	case "24 Image-01-1":
	case "31 Image-01-1":	return "Scorpio News";
	}
	return "";
}

function imageDescMicropower($issue, $name)
{
	global $nl;

	switch ("$issue $name") {
	case "11 Image--1-1":
	case "12 Image--1-1":
	case "13 Image--1-1":
	case "14 Image--1-1":
	case "21 Image--1-1":
	case "22 Image--1-1":
	case "23 Image--1-1":
	case "24 Image--1-1":	return "&micro;P";

	// 11
	case "11 Image--1-2":	return "NASA";

	// 21
	case "21 Image--1-2":	return "Moon Raider";
	}
	return "";
}

function imageDescNascomNewsletter($issue, $name)
{
	global $nl;

	switch ("$issue $name") {
	// 25
	case "25 Image--1-1":	return "Nascom means performance$nl"."Nascom means solutions";

	// 26
	case "26 Image--1-1":	return "Nascom Newsletter$nl"."Volume 2 Number 6";

	// 31
	case "31 Image--1-1":	return "Nascom Newsletter$nl"."Volume 3 Number 1$nl"."April 1983$nl$nl"."The Nascom Network has been up and running since last summer";

	// 32
	case "32 Image-00-1":	return "Nascom Newsletter$nl"."Volume 3 Number 2$nl"."May 1983";

	// 33
	case "33 Image--1-1":	return "Nascom Newsletter$nl"."Volume 3 Number 3$nl"."May 1983";

	// 34
	case "34 Image--1-1":	return "Nascom Newsletter$nl"."Volume 3 Number 4$nl"."December 1983";

	// 35
	case "35 Image--1-1":	return "Nascom Newsletter$nl"."Volume 3 Numbers 5 &amp; 6$nl"."June 1984";
	}
	return "";
}

function imageDescAny($year, $issue, $name)
{
	global $nl;

	global $server;
	if ($server == "t480") {
		echo "<!-- imageDescAny($year, $issue, $name) -->";
	}

	switch ($year) {
	case "80":					return imageDesc80($issue, $name);
	case "81":					return imageDesc81($issue, $name);
	case "82":					return imageDesc82($issue, $name);
	case "83":					return imageDesc83($issue, $name);
	case "84":					return imageDesc84($issue, $name);
	case "85":					return imageDesc85($issue, $name);
	case "inmc-news":			return imageDescInmcNews($issue, $name);
	case "inmc-80-news":		return imageDescInmc80News($issue, $name);
	case "80-bus-news":			return imageDesc80BusNews($issue, $name);
	case "scorpio-news":		return imageDescScorpioNews($issue, $name);
	case "micropower":			return imageDescMicropower($issue, $name);
	case "nascom-newsletter":	return imageDescNascomNewsletter($issue, $name);
	}

	// Nascompl
	if (0) {
	}

	// Inhaltsverzeichnis Nascom Magazines
	if ($year == "" && $issue == "") {
		switch ("$name") {
		// INMC News
		case "inmc-news/01/cover":			return "INMC News, Issue 1";
		case "inmc-news/02/cover":			return "INMC News, Issue 2";
		case "inmc-news/03/cover":			return "INMC News, Issue 3";
		case "inmc-news/04/cover":			return "INMC News, Issue 4";
		case "inmc-news/05/cover":			return "INMC News, Issue 5";
		case "inmc-news/06/cover":			return "INMC News, Issue 6";
		case "inmc-news/07/cover":			return "INMC News, Issue 7";
		// INMC 80 News
		case "inmc-80-news/01/cover":		return "INMC 80 News, Issue 1";
		case "inmc-80-news/02/cover":		return "INMC 80 News, Issue 2";
		case "inmc-80-news/03/cover":		return "INMC 80 News, Issue 3";
		case "inmc-80-news/04/cover":		return "INMC 80 News, Issue 4";
		case "inmc-80-news/05/cover":		return "INMC 80 News, Issue 5";
		// 80-Bus News
		case "80-bus-news/11/cover":		return "80-Bus News, Volume 1, Issue 1";
		case "80-bus-news/12/cover":		return "80-Bus News, Volume 1, Issue 2";
		case "80-bus-news/13/cover":		return "80-Bus News, Volume 1, Issue 3";
		case "80-bus-news/14/cover":		return "80-Bus News, Volume 1, Issue 4";
		case "80-bus-news/21/cover":		return "80-Bus News, Volume 2, Issue 1";
		case "80-bus-news/22/cover":		return "80-Bus News, Volume 2, Issue 2";
		case "80-bus-news/23/cover":		return "80-Bus News, Volume 2, Issue 3";
		case "80-bus-news/24/cover":		return "80-Bus News, Volume 2, Issue 4";
		case "80-bus-news/31/cover":		return "80-Bus News, Volume 3, Issue 1";
		case "80-bus-news/32/cover":		return "80-Bus News, Volume 3, Issue 2";
		case "80-bus-news/33/cover":		return "80-Bus News, Volume 3, Issue 3";
		case "80-bus-news/34/cover":		return "80-Bus News, Volume 3, Issue 4";
		case "80-bus-news/35/cover":		return "80-Bus News, Volume 3, Issue 5";
		case "80-bus-news/41/cover":		return "80-Bus News, Volume 4, Issue 1";
		case "80-bus-news/42/cover":		return "80-Bus News, Volume 4, Issue 2";
		// Scorpio News
		case "scorpio-news/11/cover":		return "Scorpio News, Volume 1, Issue 1";
		case "scorpio-news/12/cover":		return "Scorpio News, Volume 1, Issue 2";
		case "scorpio-news/13/cover":		return "Scorpio News, Volume 1, Issue 3";
		case "scorpio-news/14/cover":		return "Scorpio News, Volume 1, Issue 4";
		case "scorpio-news/21/cover":		return "Scorpio News, Volume 2, Issue 1";
		case "scorpio-news/22/cover":		return "Scorpio News, Volume 2, Issue 2";
		case "scorpio-news/23/cover":		return "Scorpio News, Volume 2, Issue 3";
		case "scorpio-news/24/cover":		return "Scorpio News, Volume 2, Issue 4";
		case "scorpio-news/31/cover":		return "Scorpio News, Volume 3, Issue 1";
		// Micropower
		case "micropower/11/cover":			return "Micropower, Volume 1, Number 1";
		case "micropower/12/cover":			return "Micropower, Volume 1, Number 2";
		case "micropower/13/cover":			return "Micropower, Volume 1, Number 3";
		case "micropower/14/cover":			return "Micropower, Volume 1, Number 4";
		case "micropower/21/cover":			return "Micropower, Volume 2, Number 1";
		case "micropower/22/cover":			return "Micropower, Volume 2, Number 2";
		case "micropower/23/cover":			return "Micropower, Volume 2, Number 3";
		case "micropower/24/cover":			return "Micropower, Volume 2, Number 4";
		// Nascom Newsletter
		case "nascom-newsletter/25/cover":	return "Nascom Newsletter, Volume 2, Number 5";
		case "nascom-newsletter/26/cover":	return "Nascom Newsletter, Volume 2, Number 6";
		case "nascom-newsletter/31/cover":	return "Nascom Newsletter, Volume 3, Number 1";
		case "nascom-newsletter/31/cover":	return "Nascom Newsletter, Volume 3, Number 1";
		case "nascom-newsletter/32/cover":	return "Nascom Newsletter, Volume 3, Number 2";
		case "nascom-newsletter/33/cover":	return "Nascom Newsletter, Volume 3, Number 3";
		case "nascom-newsletter/34/cover":	return "Nascom Newsletter, Volume 3, Number 4";
		case "nascom-newsletter/35/cover":	return "Nascom Newsletter, Volume 3, Number 5";

		case "cover":						return "Cover";
		}
	}

	// Inhaltsverzeichnis Nascom Magazines
	if ($issue == "") {
		switch ("$year $name") {
		case "INMC News logo":
		case "INMC News ../logo":
		case "INMC 80 News logo":
		case "INMC 80 News ../logo":
		case "Nascom Newsletter logo":
		case "Nascom Newsletter ../logo":
		case "80-Bus News logo":
		case "80-Bus News ../logo":
		case "Scorpio News logo":
		case "Scorpio News ../logo":		return($year);
		case "Micropower logo":
		case "Micropower ../logo":			return("&micro;P $year");
		}
	}
	
	// Inhaltsverzeichnis Nascom Journal
	if ($year == "") {
		switch ("$issue $name") {
		// Nascom Journal 1980
		case "0/80 thumb/01":
		case "1/80 thumb/01":
		case "2/80 thumb/01":
		case "3/80 thumb/01":
		case "4/80 thumb/01":
		case "5/80 thumb/01":
		case "6/80 7/80 thumb/01":
		// Nascom Journal 1981
		case "1/81 thumb/01":
		case "2/81 thumb/01":
		case "3/81 thumb/01":
		case "4/81 5 thumb/00":
		case "Juni 1981 &middot; Ausgabe 6 thumb/01":
		case "Juli 1981 &middot; Ausgabe 7 thumb/01":
		case "August 1981 &middot; Ausgabe 8 thumb/01":
		case "September 1981 &middot; Ausgabe 9 thumb/01":
		case "Oktober 1981 &middot; Ausgabe 10 thumb/01":
		case "Dezember 1981 &middot; Ausgabe 11/12 thumb/01":
		// Nascom Journal 1982
		case "Januar 1982 &middot; Ausgabe 1 thumb/01":
		case "Februar 1982 &middot; Ausgabe 2 thumb/01":
		case "März/April 1982 &middot; Ausgabe 3/4 thumb/01":
		case "Mai 1982 &middot; Ausgabe 5 thumb/01":
		case "Juni 1982 &middot; Ausgabe 6 thumb/01":
		case "Juli/August 1982 &middot; Ausgabe 7/8 thumb/01":
		case "September 1982 &middot; Ausgabe 9 thumb/01":
		case "Oktober/November 1982 &middot; Ausgabe 10/11 thumb/01":
		case "12/82 thumb/01":					return "Nascom Journal, $issue";
		// 80-Bus Journal 1983
		case "Januar 1983 &middot; Ausgabe 1 thumb/01":
		case "Februar 1983 &middot; Ausgabe 2 thumb/01":
		case "März 1983 &middot; Ausgabe 3 thumb/01":
		case "April 1983 &middot; Ausgabe 4 thumb/01":
		case "Mai 1983 &middot; Ausgabe 5 thumb/01":
		case "Juni 1983 &middot; Ausgabe 6 thumb/01":
		case "Juli/Aug. 1983 &middot; Ausgabe 7/8 thumb/01":
		case "September 1983 &middot; Ausgabe 9 thumb/01":
		case "November 1983 &middot; Ausgabe 10/11 thumb/01":
		case "Dezember 1983 &middot; Ausgabe 12 thumb/01":
		// 80-Bus Journal 1984
		case "Mitteilungsblatt Nr. 1 &middot; Februar 1984 thumb/01":
		case "Jan/Feb/März 1984 &middot; Ausgabe 1 thumb/01":
		case "April/Mai/Juni 1984 &middot; Ausgabe 2 thumb/01":
		case "Mitteilungsblatt Nr. 2 &middot; August 1984 thumb/01":
		case "Juli/Aug./September 1984 &middot; Ausgabe 3 thumb/01":
		case "Okt./Nov./Dezember 1984 &middot; Ausgabe 4 thumb/01":
		// 80-Bus Journal 1985
		case "Mitteilungsblatt Nr. 3 &middot; Juni 1985 thumb/01":
													return "80-Bus Journal, $issue";
		}
	}

	return("");
}

function imageDesc($year, $issue, $file)
{
	global $server;

	$path_parts = pathinfo($file);
	$name = $path_parts['filename'];
	$dir = $path_parts['dirname'];
	if ($dir != ".") {
		$name = "$dir/$name";
	}
//	echo "<!-- imageDesc($year, $issue, $file) $name $dir -->";

	$desc = imageDescAny($year, $issue, $name);
	if ($desc == "") {
		if ($server == "t480") {
			return("$year $issue $name ($file)\"");	// HTML-Fehler, wenn kein alt-Text vergeben wurde
		}
	}
	return $desc;
}

function externalLink($link, $text="", $delimiter="\n")
{
	global $lang;

	$newText = "";
	$url = "";
	switch ($link) {
	case "&micro;PD7220":			$url = "https://www.datasheetarchive.com/?q=upd7220";							break;
	case "&micro;PD765":			$url = "http://dunfield.classiccmp.org/r/765.pdf";								break;
	case "2114":if ($lang == "en")	$url = "https://$lang.wikipedia.org/wiki/Random-access_memory#SRAM";
				else				$url = "https://$lang.wikipedia.org/wiki/2114_(SRAM)";							break;
	case "2708":					$url = "https://deramp.com/downloads/eprom_programmers/TMS2708.pdf";			break;
	case "2716":					$url = "https://ece-classes.usc.edu/ee459/library/datasheets/2716.pdf";			break;
	case "2732":					$url = "https://www.ndr-nkc.de/download/datenbl/2732.pdf";						break;
	case "2732A":					$url = "https://www.futurlec.com/Memory/2732_Datasheet.shtml";					break;
	case "2764":					$url = "https://dfs.uib.es/GTE/staff/jfont/InstrETT/M2764a.pdf";				break;
	case "2N3819":					$url = "https://www.farnell.com/datasheets/39764.pdf";							break;
	case "4116":					$url = "https://console5.com/techwiki/images/8/85/MK4116.pdf";					break;
	case "4164":					$url = "https://www.mikrocontroller.net/attachment/4092/HYB4164.pdf";			break;
	case "6116":					$url = "https://sites.ecse.rpi.edu/courses/CStudio/data%20sheets/hm6116.pdf";	break;
	case "6502":					$url = "https://$lang.wikipedia.org/wiki/MOS_Technology_6502";					break;
	case "80 Microcomputing":		$url = "https://archive.org/details/80-microcomputing-magazine";				break;
	case "8080":					$url = "https://$lang.wikipedia.org/wiki/Intel_8080";							break;
	case "8085":					$url = "https://$lang.wikipedia.org/wiki/Intel_8085";							break;
	case "A simple technique for static relocation of absolute machine code":	$url = "https://groups.google.com/forum/?hl=de&amp;fromgroups=#!topic/comp.os.cpm/TLHgIi16yTo";	break;
	case "A.F.T. Winfield":			$url = "https://openlibrary.org/authors/OL1347836A/A._F._T._Winfield";			break;
	case "ABC 80":					$url = "https://$lang.wikipedia.org/wiki/ABC_80";								break;
	case "AD7581":					$url = "https://www.analog.com/media/en/technical-documentation/data-sheets/AD7581.pdf";	break;
	case "Algorithmen und Datenstrukturen":	$url = "https://link.springer.com/book/10.1007/978-3-322-80154-8";		break;
	case "Alphatronic PC":			$url = "https://$lang.wikipedia.org/wiki/Triumph_Adler_Alphatronic_PC";			break;
	case "AM819":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/am819.htm";				break;
	case "AM820":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/am820.htm";				break;
	case "AM9511":					$url = "https://ia902902.us.archive.org/24/items/theam9511arithmeticprocessingunit/The%20Am9511%20Arithmetic%20Processing%20Unit_text.pdf";	break;
	case "Anders Hejlsberg":		$url = "https://$lang.wikipedia.org/wiki/Anders_Hejlsberg";						break;
	case "Apple II":				$url = "https://$lang.wikipedia.org/wiki/Apple_II";								break;
	case "AUDIT 5":					$url = "https://www.pinterest.de/pin/479633429036464222/";						break;
	case "AVC":						$url = "https://80bus.co.uk.mirror.jloh.de/pages/nascom/avc_model_b_issue_a.htm";	break;
	case "AY-3-8910":				$url = "https://$lang.wikipedia.org/wiki/AY-3-8910";							break;
	case "BAS":						$url = "https://$lang.wikipedia.org/wiki/Fernsehsignal#BAS-Signal";				break;
	case "BASF 6106":				$url = "https://retrocmp.de/fdd/basf/6106/b6106_b.htm";							break;
	case "BASF 6138":				$url = "https://oldcomputers-ddns.org/public/pub/manuals/basf6138_bw.pdf";		break;
	case "Lunar LEM Rocket":		$url = "https://www.atariarchives.org/basicgames/showpage.php?page=106";		break;
	case "Basic-Interpreter":		$url = "https://openlibrary.org/works/OL15388892W/Basic-Interpreter";			break;
	case "Bernd Ploss":				$url = "?"/*"https://www.eah-jena.de/scitec/personen/bernd-ploss"*/;			break;
	case "Blue Label Software Pascal":	$url = "https://de.wikipedia.org/wiki/Turbo_Pascal#Geschichte";				break;
	case "c&rsquo;t 2/1985":		$url = "https://www.kultboy.com/index.php?site=kult/kultmags&km=show&id=13276";	break;
	case "c&rsquo;t 3/1985, Seite 76":	$url = "https://archive.org/details/ct-magazine-8503/page/n57/mode/2up";	break;
	case "c&rsquo;t 4/1987":		$url = "https://www.kultboy.com/index.php?site=kult/kultmags&km=show&id=12410";	break;
	case "c&rsquo;t 9/1986":		$url = "https://www.kultboy.com/index.php?site=kult/kultmags&km=show&id=12403";	break;
	case "c&rsquo;t Text-Terminal":	$url = "https://julianehehl.de/test-ndr/mc1.htm#b3";							break;
	case "c&rsquo;t":				$url = "https://ct.de/";														break;
	case "Car_race.nas":			$url = "http://www.nascomhomepage.com/games/Car_race.nas";						break;
	case "Chip":					$url = "https://www.chip.de/";													break;
	case "Circle Generators for Display Devices":	$url = "https://people.csail.mit.edu/bkph/papers/Circle_Generators_OPT.pdf";	break;
	case "Climax":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm837.htm";				break;
	case "CNY17-2":					$url = "https://www.vishay.com/docs/83606/cny17.pdf";							break;
	case "Compression ASM":			$url = "http://www.nascomhomepage.com/pdf/compass.pdf";							break;
	case "Computer Gesellschaft Konstanz":	$url = "https://$lang.wikipedia.org/wiki/Computer_Gesellschaft_Konstanz";	break;
	case "COMPUTER, Vol 13-1, January 1980, pp68-79":	$url = "https://pub.sergev.org/pub/doc/An-Implementation-Guide-to-a-Proposed-Standard-for-Floating-Point-Arithmetic.pdf";	break;
	case "Computermonitor":			$url = "https://$lang.wikipedia.org/wiki/Computermonitor";						break;
	case "Computermuseum Burgrieden":	$url = "http://kath-rottal.homeunix.org/Computermuseum/Lehrsysteme/Kontron%20Z%2080%20Kit/index.html";	break;
	case "Computing Today, October 1979, Page 64":	$url = "https://archive.org/details/computing-today-1979/ComputingToday197910/page/64/mode/2up";	break;
	case "Computing Today, October 1979, Page 66":	$url = "https://archive.org/details/computing-today-1979/ComputingToday197910/page/66/mode/2up";	break;
	case "Computing Today, February 1980, Page 24":	$url = "https://archive.org/details/computing-today-1980/ComputingToday198002/page/24/mode/2up";	break;
	case "Computing Today, October 1982, Page 46":	$url = "https://archive.org/details/computing-today-1982/ComputingToday198210/page/46/mode/2up";	break;
	case "CP/M Plus":				$url = "https://$lang.wikipedia.org/wiki/CP/M#CP/M-Plus";						break;
	case "CP/M":					$url = "https://$lang.wikipedia.org/wiki/CP/M";									break;
	case "CQ-DL":					$url = "https://www.darc.de/nachrichten/amateurfunkmagazin-cq-dl";				break;
	case "DAI":						$url = "https://$lang.wikipedia.org/wiki/DAI_(Computer)";						break;
	case "Data General Nova":		$url = "https://en.wikipedia.org/wiki/Data_General_Nova";						break;
	case "David L. Heiserman":		$url = "https://openlibrary.org/authors/OL766144A/Heiserman_David_L.";			break;
	case "dBASE II":				$url = "https://$lang.wikipedia.org/wiki/DBASE#dBASE_II";						break;
	case "DC2SU":					$url = "https://hamcall.net/call/DC2SU";										break;
	case "DD6ES":					$url = "https://hamcall.net/call/DD6ES";										break;
	case "DEC GT40":				$url = "https://en.wikipedia.org/wiki/DEC_GT40";								break;
	case "DEC VT180":				$url = "https://$lang.wikipedia.org/wiki/VT180";								break;
	case "DF3DT":					$url = "https://hamcall.net/call/DF3DT";										break;
	case "DF4BS":					$url = "https://hamcall.net/call/DF4BS";										break;
	case "DF4BT":					$url = "https://hamcall.net/call/DF4BT";										break;
	case "DF4GI":					$url = "https://hamcall.net/call/DF4GI";										break;
	case "DF7SQ":					$url = "https://hamcall.net/call/DF7SQ";										break;
	case "DG1BF":					$url = "? https://hamcall.net/call/DG1BF";										break;
	case "Dieter Werner auf mikrocontroller.net":	$url = "https://www.mikrocontroller.net/topic/55718#433032";	break;
	case "DK7UF":					$url = "? https://hamcall.net/call/DK7UF";										break;
	case "DL5EBP":					$url = "https://hamcall.net/call/DL5EBP";										break;
	case "DL6UP":					$url = "? https://www.qrzcq.com/call/DL6UP";									break;
	case "Dr. Dobb's Journal":								$url = "https://archive.org/details/dr_dobbs_journal";									break;
	case "Dr. Dobb's Journal, Volume 3, Issue 2, Page 10":	$url = "https://archive.org/details/dr_dobbs_journal_vol_03/page/n67/mode/2up";			break;
	case "Dr. Dobb's Journal, Volume 3, Issue 5, Page 21":	$url = "https://archive.org/details/dr_dobbs_journal_vol_03/page/n215/mode/2up";		break;
	case "Dr. Dobb's Journal, Volume 4, Issue 10, Page 33":	$url = "https://archive.org/details/dr_dobbs_journal_vol_04_201803/page/n447/mode/2up";	break;
	case "Dr. Dobb's Journal, Volume 8, Issue 9, Page 120":	$url = "https://archive.org/details/dr_dobbs_journal_vol_08/page/550/mode/2up";			break;
	case "ECB 85":					$url = "https://$lang.wikipedia.org/wiki/ECB85";								break;
	case "ECB":						$url = "https://$lang.wikipedia.org/wiki/Europe_Card_Bus";	$newText = "Einfach-Europaformat-Computer-Baugruppe";	break;
	case "EF9366":					$url = "https://www.datasheetarchive.com/?q=ef9366";							break;
	case "Einplatinencomputer":		$url = "https://$lang.wikipedia.org/wiki/Einplatinencomputer";					break;
	case "ELCOMP":					$url = "https://www.kultboy.com/ELCOMP-Zeitschrift/347/";						break;
	case "ELCOMP 6/79":				$url = "https://www.kultboy.com/magazin/7123/";									break;
	case "ELCOMP 2/81":				$url = "https://www.kultboy.com/index.php?site=kult/kultmags&km=show&id=7137";	break;
	case "ELCOMP 2/81, Seite 20":	$url = "https://archive.org/details/elcomp_1981_02/page/20/mode/2up";			break;
	case "ELCOMP 4/81":				$url = "https://www.kultboy.com/index.php?site=kult/kultmags&km=show&id=7139";	break;
	case "ELCOMP 4/81, Seite 8":	$url = "https://archive.org/details/elcomp_1981_04/page/8/mode/2up";			break;
	case "Elektor":					$url = "https://www.elektormagazine.de/";										break;
	case "Elektor, April 1977, Seite 36":		$url = "https://www.elektormagazine.de/magazine/elektor-197704/56183";	break;
	case "Elektor, April 1982, Seite 30":		$url = "https://www.elektormagazine.de/magazine/elektor-198204/46459";	break;
	case "Elektor, Dezember 1981, Seite 61":	$url = "https://www.elektormagazine.de/magazine/elektor-198112/46415";	break;
	case "Elektor, Februar 1978, Seite 20":		$url = "https://www.elektormagazine.de/magazine/elektor-197802/56371";	break;
	case "Elektor, Januar 1979, Seite 48":		$url = "https://www.elektormagazine.de/magazine/elektor-197901/56575";	break;
	case "Elektor, Mai 1982, Seite 45":			$url = "https://www.elektormagazine.de/magazine/elektor-198205/46477";	break;
	case "Elektor, Mai 1983, Seite 34":			$url = "https://www.elektormagazine.de/magazine/elektor-198305/46682";	break;
	case "Elektor, November 1977, Seite 41":	$url = "https://www.elektormagazine.de/magazine/elektor-197711/56337";	break;
	case "Elektor, Oktober 1982, Seite 66":		$url = "https://www.elektormagazine.de/magazine/elektor-198210/46621";	break;
	case "Elektor, September 1980, Seite 26":	$url = "https://www.elektormagazine.de/magazine/elektor-198009/46145";	break;
	case "Elektronik":				$url = "https://www.componeers.net/medien/elektronik/";							break;
	case "Elektronikladen":			$url = "https://elmicro.com/info/";												break;
	case "ELZET80":					$url = "https://www.elzet80.de/";												break;
	case "Emdos.cas":				$url = "http://www.nascomhomepage.com/cpm/Emdos.cas";							break;
	case "EMUF":					$url = "https://$lang.wikipedia.org/wiki/EMUF";									break;
	case "Epson MX-80F/T":			$url = "https://$lang.wikipedia.org/wiki/Datei:EpsonMX80FT_02_mod02_res.jpg";	break;
	case "Euler.cas":				$url = "http://www.nascomhomepage.com/zeap/Euler.cas";							break;
	case "EV814":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm814.htm";				break;
	case "Exidy Sorcerer":			$url = "https://en.wikipedia.org/wiki/Exidy_Sorcerer";							break;
	case "Fachhochschule Köln":		$url = "https://www.th-koeln.de/";												break;
	case "FDC9229":					$url = "https://www.cpcwiki.eu/imgs/9/97/FDC9229BT_Datasheet.pdf";				break;
	case "Fernmeldeamt":			$url = "https://$lang.wikipedia.org/wiki/Fernmeldeamt_(Deutsche_Bundespost)";	break;
	case "Fernmeldehandwerker":		$url = "https://$lang.wikipedia.org/wiki/Fernmeldehandwerker";					break;
	case "Fernsehtechnik ohne Ballast":	$url = "http://www.ukwfm.de/antiquariat/feb.html";							break;
	case "FidoNet":					$url = "https://fido.de/";														break;
	case "Filter.cas":				$url = "http://www.nascomhomepage.com/mbasic/Filter.cas";						break;
	case "FORTH for Microcomputers":$url = "https://dl.acm.org/citation.cfm?id=987508.987510";						break;
	case "Funkschau":				$url = "https://www.radiomuseum.org/lf/b/funkschau/";							break;
	case "Fädeltechnik":			$url = "https://$lang.wikipedia.org/wiki/F%C3%A4deltechnik";					break;
	case "G3FHL":					$url = "https://www.qrzcq.com/call/G3FHL";										break;
	case "G3XIG":					$url = "https://hamcall.net/call/G3XIG";										break;
	case "G6ADF":					$url = "https://hamcall.net/call/G6ADF";										break;
	case "Gary A. Kildall":			$url = "https://www.digitalresearch.biz/Gary.Kildall.htm";						break;
	case "General Instrument AY-3-8910":	$url = "https://en.wikipedia.org/wiki/General_Instrument_AY-3-8910";	break;
	case "GM801":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm801.htm";				break;
	case "GM802":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm802.htm";				break;
	case "GM803":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm803.htm";				break;
	case "GM804":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm804.htm";				break;
	case "GM805":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm805.htm";				break;
	case "GM806":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm806.htm";				break;
	case "GM807":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm807.htm";				break;
	case "GM808":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm808.htm";				break;
	case "GM809":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm809.htm";				break;
	case "GM810":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm810.htm";				break;
	case "GM811":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm811.htm";				break;
	case "GM812":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm812.htm";				break;
	case "GM813":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm813.htm";				break;
	case "GM815":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm815.htm";				break;
	case "GM816":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm816.htm";				break;
	case "GM818":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm818.htm";				break;
	case "GM821":					$url = "https://nascom.wordpress.com/gemini/hardware/gm821-parallel-keyboard/";	break;
	case "GM822":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm822.htm";				break;
	case "GM824":					$url = "https://nascom.wordpress.com/gemini/hardware/gm824-a-d/";				break;
	case "GM825":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm825.htm";				break;
	case "GM827":					$url = "https://nascom.wordpress.com/gemini/hardware/gm827-87-key-parallel-keyboard/";	break;
	case "GM829":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm829.htm";				break;
	case "GM832":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm832.htm";				break;
	case "GM833":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm833.htm";				break;
	case "GM836":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm836.htm";				break;
	case "GM837":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm837.htm";				break;
	case "GM839":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm839.htm";				break;
	case "GM848":					$url = "https://nascom.wordpress.com/gemini/hardware/g848-serial-card/";		break;
	case "GM849":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm849.htm";				break;
	case "GM851":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm851.htm";				break;
	case "GM852":					$url = "https://nascom.wordpress.com/gemini/hardware/gm852-keyboard/";			break;
	case "GM853":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm853.htm";				break;
	case "GM860":					$url = "https://nascom.wordpress.com/gemini/hardware/gm860-eprom-programmer/";	break;
	case "GM862":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm862.htm";				break;
	case "GM863":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm863.htm";				break;
	case "GM870":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm870.htm";				break;
	case "GM880":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm880.htm";				break;
	case "GM886":					$url = "https://nascom.wordpress.com/gemini/hardware/gm886-high-performance-cpu/";	break;
	case "Google über Nascom":		$url = "https://www.google.de/search?q=nascom+computer";						break;
	case "Greg":					$url = "? https://www.lemis.com/grog/Albums/Computers/Kontron-kit.php";			break;
	case "Gummersbach":				$url = "https://www.f10.th-koeln.de/";											break;
	case "Harzretro":				$url = "https://www.computersammler.de/sammlung/einplatinen-und-lerncomputer/kontron-z80-kit/";	break;
	case "Henelec":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm805.htm";				break;
	case "HiSOFT":					$url = "https://hisoft.co.uk/gp/about-hisoft/1/pgid/4/";						break;
	case "HM7611":					$url = "https://www.retrotechnology.com/restore/hm7602.pdf";					break;
	case "Hobbytronic":				$url = "https://$lang.wikipedia.org/wiki/Hobbytronic";							break;
	case "HOCO Floppy Controller":	$url = "https://forum.classic-computing.de/forum/index.php?thread/11561-hoco-floppy-controller/";	break;
	case "HSA-88B":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm847.htm";				break;
	case "HTML":					$url = "https://$lang.selfhtml.org/";											break;
	case "i8255":					$url = "https://$lang.wikipedia.org/wiki/Intel_8255";							break;
	case "IBM 3270":				$url = "https://$lang.wikipedia.org/wiki/IBM_3270";								break;
	case "IBM 3740":				$url = "https://en.wikipedia.org/wiki/IBM_3740";								break;
	case "IBM System/34":			$url = "https://en.wikipedia.org/wiki/IBM_System/34";							break;
	case "ICL7106":					$url = "https://www.renesas.com/en/document/dst/icl7106-icl7107-icl7107s-datasheet";	break;
	case "IMP":						$url = "https://80bus.co.uk.mirror.jloh.de/pages/nascom/imp.htm";				break;
	case "Indische Finsternis":		$url = "http://www.sonnenfinsternis.org/sofi1980t/index.htm";					break;
	case "INVASION.NAS":			$url = "http://www.nascomhomepage.com/games/INVASION.NAS";						break;
	case "Ing. Büro W. Kanis GmbH":	$url = "https://kanis.de/ueber-das-unternehmen/";								break;
	case "IO828":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/io828.htm";				break;
	case "IO830":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/io830.htm";				break;
	case "Gilvázi István":			$url = "https://web.archive.org/web/2/https://innova.rs/hu/gilvazi-istvan/";	break;
	case "ITOH 8510":				$url = "https://www.atarimagazines.com/v4n10/citoh8510sep+.jpg";				break;
	case "IVC":						$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm812.htm";				break;
	case "Janich &amp; Klass":		$url = "https://www.janichklass.com/die-firma/firmengeschichte/";				break;
	case "Jonny":					$url = "https://www.robotrontechnik.de/html/forum/thwb/showtopic.php?threadid=13028";	break;
	case "JRT-Pascal":				$url = "https://en.wikipedia.org/wiki/JRT_Pascal_(programming_language)";		break;
	case "Jürgen Loh":				$url = "https://jloh.de/";														break;
	case "Karlheinz":				$url = "https://web.archive.org/web/2/https://www.o49-werl.de/component/contact/contact/12-kontakte/12?Itemid=301";	break;
	case "Kilobaud Microcomputing Magazine (February 1981)":			$url =  "https://archive.org/details/kilobaudmagazine-1981-02";	break;
	case "Kilobaud Microcomputing Magazine (February 1981), page 76":	$url =  "https://archive.org/details/kilobaudmagazine-1981-02/page/n76/mode/2up";	break;
	case "Kilobaud Microcomputing Magazine (March 1981)":				$url =  "https://archive.org/details/kilobaudmagazine-1981-03";	break;
	case "Kilobaud Microcomputing Magazine (March 1981), page 44":		$url =  "https://archive.org/details/kilobaudmagazine-1981-03/page/n41/mode/2up";	break;
	case "Kilobaud Microcomputing Magazine, February 1981, Page 76":	$url = "https://archive.org/details/kilobaudmagazine-1981-02/page/n75/mode/2up";	break;
	case "Kilobaud Microcomputing Magazine, March 1981, Page 44":		$url = "https://archive.org/details/kilobaudmagazine-1981-03/page/n41/mode/2up";	break;
	case "Kontron Z80-KIT":			$url = "https://rolf-becker.de/Lehrcomputer.html";								break;
	case "Kontron":					$url = "https://www.kontron.com/de";											break;
	case "Kornkraft Genossenschaft":$url = "https://bio-region-niederrhein.com/ueber-uns-2/karte/";					break;
	case "Ldgold.cas":				$url = "http://www.nascomhomepage.com/mbasic/Ldgold.cas";						break;
	case "Lichtgriffel":			$url = "https://$lang.wikipedia.org/wiki/Lichtgriffel";							break;
	case "Conway's Game of Life":
			if ($lang == "en")		$url = "https://$lang.wikipedia.org/wiki/Conway's_Game_of_Life";
			else					$url = "https://$lang.wikipedia.org/wiki/Conways_Spiel_des_Lebens";				break;
	case "LilBeans":				$url = "http://www.21d.de/LilBeans/";											break;
	case "LM324":					$url = "https://www.ti.com/lit/ds/symlink/lm124-n.pdf";							break;
	case "LM741":					$url = "https://www.ti.com/lit/ds/symlink/lm741.pdf";							break;
	case "LO 15":					$url = "https://archiv.widerstandsraeume.de/radikal-persoenlich/objekte/blattschreiber-lo-15/";	break;
	case "Lolly.nas":				$url = "http://www.nascomhomepage.com/games/Lolly.nas";							break;
	case "Mailbox":					$url = "https://$lang.wikipedia.org/wiki/Mailbox_%28Computer%29";				break;
	case "maloche.cas":				$url = "http://www.nascomhomepage.com/mbasic/maloche.cas";						break;
	case "Mamallapuram":			$url = "https://$lang.wikipedia.org/wiki/Mamallapuram";							break;
	case "MAP80 256K RAM":			$url = "https://80bus.co.uk.mirror.jloh.de/pages/map80/MAP80_256.htm";			break;
	case "MAP80 CPU":				$url = "https://80bus.co.uk.mirror.jloh.de/pages/map80/MAP80_CPU.htm";			break;
	case "MAP80 MPI":				$url = "https://80bus.co.uk.mirror.jloh.de/pages/map80/MAP80_MPI.htm";			break;
	case "MAP80 VFC":				$url = "https://80bus.co.uk.mirror.jloh.de/pages/map80/MAP80_VFC.htm";			break;
	case "Mastering Machine Code On Your ZX81":	$url = "https://archive.org/details/masteringmachinecodeonyourzx81";	break;
	case "Maxell MD2-HD":			$url = "https://www.flickr.com/photos/celesteh/19477993894";					break;
	case "MB8877A":					$url = "https://archive.org/details/MB8866Datasheet";							break;
	case "mc 2/1981":				$url = "https://archive.org/details/mc-1981-02/mode/2up";						break;
	case "mc 2/1981, Seite 26":		$url = "https://archive.org/details/mc-1981-02/page/n25/mode/2up";				break;
	case "mc 2/1981, Seite 28":		$url = "https://archive.org/details/mc-1981-02/page/n27/mode/2up";				break;
	case "mc 4/1981, Seite 26":		$url = "https://archive.org/details/mc-1981-04/page/n25/mode/2up";				break;
	case "mc 4/1981, Seite 75":		$url = "https://archive.org/details/mc-1981-04/page/n69/mode/2up";				break;
	case "mc 3/1982":				$url = "https://www.kultboy.com/index.php?site=kult/kultmags&km=show&id=14080";	break;
	case "mc 4/1982":				$url = "https://www.kultboy.com/index.php?site=kult/kultmags&km=show&id=14081";	break;
	case "mc 10/1982, Seite 74":	$url = "https://web.archive.org/web/2/https://hschuetz.selfhost.eu/mc-zeitschriften/1982/mc-1982-10.pdf#page=74";		break;
	case "mc 1/1983, Seite 38":		$url = "https://web.archive.org/web/2/https://hschuetz.selfhost.eu/mc-zeitschriften/1983/mc-1983-01.pdf#page=36";		break;
	case "mc 1/1983, Seite 42":		$url = "https://web.archive.org/web/2/https://hschuetz.selfhost.eu/mc-zeitschriften/1983/mc-1983-01.pdf#page=40";		break;
	case "mc 3/1983, Seite 31":		$url = "https://web.archive.org/web/2020/https://hschuetz.selfhost.eu/mc-zeitschriften/1983/mc-1983-03.pdf#page=29";		break;
	case "mc 8/1983, Seite 68":		$url = "https://web.archive.org/web/2/https://hschuetz.selfhost.eu/mc-zeitschriften/1983/mc-1983-08.pdf#page=66";		break;
	case "mc 9/1983, Seite 70":		$url = "https://web.archive.org/web/2/https://hschuetz.selfhost.eu/mc-zeitschriften/1983/mc-1983-09.pdf#page=68";		break;
	case "mc 5/1984, Seite 74":		$url = "https://web.archive.org/web/2/https://hschuetz.selfhost.eu/mc-zeitschriften/1984/mc-1984-05.pdf#page=74";		break;
	case "mc 9/1984, Seite 86":		$url = "https://web.archive.org/web/2022/https://hschuetz.selfhost.eu/mc-zeitschriften/1984/mc-1984-09.pdf#page=86";		break;
	case "mc 10/1984, Seite 61":	$url = "https://web.archive.org/web/2/https://hschuetz.selfhost.eu/mc-zeitschriften/1984/mc-1984-10.pdf#page=61";		break;
	case "mc 11/1984, Seite 84":	$url = "https://web.archive.org/web/2/https://hschuetz.selfhost.eu/mc-zeitschriften/1984/mc-1984-11.pdf#page=84";		break;
	case "mc 12/1984, Seite 81":	$url = "https://web.archive.org/web/2022/https://hschuetz.selfhost.eu/mc-zeitschriften/1984/mc-1984-12.pdf#page=81";		break;
	case "mc 2/1985, Seite 102":	$url = "https://web.archive.org/web/2/https://hschuetz.selfhost.eu/mc-zeitschriften/1985/mc-1985-02.pdf#page=102";	break;
	case "mc 1/1987, Seite 59":		$url = "https://web.archive.org/web/2/https://hschuetz.selfhost.eu/mc-zeitschriften/1987/mc-1987-01.pdf#page=57";	break;
	case "mc 2/1987":				$url = "https://www.kultboy.com/index.php?site=kult/kultmags&km=show&id=12541";	break;
	case "mc 2/1987, Seite 64":		$url = "https://web.archive.org/web/2/https://hschuetz.selfhost.eu/mc-zeitschriften/1987/mc-1987-02.pdf#page=42";	break;
	case "mc 3/1987":				$url = "https://archive.org/details/mc-1987-03-kwr/mode/2up";					break;
	case "mc 3/1987, Seite 92":		$url = "https://archive.org/details/mc-1987-03-kwr/page/n57/mode/2up";			break;
	case "mc";						$url = "https://$lang.wikipedia.org/wiki/Mc_%28Zeitschrift%29";					break;
	case "mc-CP/M":					$url = "https://www.auram.de/cms3/pages/computer/mc-cpm.php";					break;
	case "MC6845":					$url = "https://en.wikipedia.org/wiki/Motorola_6845";							break;
	case "MDCR-Manual":				$url = "http://www.nascomhomepage.com/pdf/mdcr.pdf";							break;
	case "Merseyside Nascom Users Group":	$url = "http://www.nascomhomepage.com/pdf/nasproginfo.pdf";				break;
	case "Michael Bach":			$url = "https://michaelbach.de/";												break;
	case "Michael Klein":			$url = "https://web.archive.org/web/20131024195335/http://networks.de/index.php?option=com_content&amp;view=article&amp;id=12&amp;Itemid=62";	break;
	case "Microshell":				$url = "http://www.z80.eu/microshell.html";										break;
	case "Mike Strange":			$url = "https://www.yourtotalevent.com/";										break;
	case "Mikrocomputer Hard- und Softwarepraxis":	$url = "https://archive.org/details/mikrocomputer-hard-und-softwarepraxis-rolf-dieter-klein-1981";	break;
	case "Mikrocomputer Hard- und Softwarepraxis, Seite 102":	$url = "https://archive.org/details/mikrocomputer-hard-und-softwarepraxis-rolf-dieter-klein-1981/page/102/mode/2up";	break;
	case "Mikrocomputer Hard- und Softwarepraxis, Seite 179":	$url = "https://archive.org/details/mikrocomputer-hard-und-softwarepraxis-rolf-dieter-klein-1981/page/179/mode/2up";	break;
	case "Mikrocomputer Hard- und Softwarepraxis, Seite 20":	$url = "https://archive.org/details/mikrocomputer-hard-und-softwarepraxis-rolf-dieter-klein-1981/page/20/mode/2up";	break;
	case "Mikrocomputer Hard- und Softwarepraxis, Seite 89":	$url = "https://archive.org/details/mikrocomputer-hard-und-softwarepraxis-rolf-dieter-klein-1981/page/89/mode/2up";	break;
	case "Mimi":					$url = "https://nascom.wordpress.com/gemini/hardware/g801-mimi/";				break;
	case "Mini Palette":			$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/io830.htm";				break;
	case "MK Systemtechnik":		$url = "http://web.archive.org/web/20131024180436/http://networks.de/index.php?option=com_content&amp;view=article&amp;id=13&amp;Itemid=60";	break;
	case "MK50816":					$url = "https://www.datasheetarchive.com/?q=mk50816";			 				break;
	case "Modern Microprocessor System Design":	$url = "https://archive.org/details/modern-microprocessor-system-design";	break;
	case "Modern Microprocessor System Design, page 225":	$url = "https://archive.org/details/modern-microprocessor-system-design/page/225/mode/2up";	break;
	case "Monitor":					$url = "https://$lang.wikipedia.org/wiki/Maschinencode-Monitor";				break;
	case "MP826":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/mp826.htm";				break;
	case "MS-DOS":					$url = "https://$lang.wikipedia.org/wiki/MS-DOS";								break;
	case "Nanocomputer":			$url = "https://www.homecomputermuseum.de/sammlung/detailansicht?tx_compges_computer%5Baction%5D=show&tx_compges_computer%5Bcomputer%5D=333&tx_compges_computer%5Bcontroller%5D=Computer&cHash=779929b2ceff1387291136baf72ef620";	break;
	case "Nascom / Gemini / 80 Bus (Mirror)":	$url = "https://80bus.co.uk.mirror.jloh.de/";						break;
	case "Nascom Basic Book 1":		$url = "http://www.nascomhomepage.com/pdf/Nascom%20Basic%20Book%201.PDF";		break;
	case "Nascom Computers User Group":	$url = "https://groups.io/g/Nascom-Computers";								break;
	case "Nascom Home Page (Mirror)":	$url = "https://nascomhomepage.com.mirror.jloh.de/";						break;
	case "Nascom Home Page":		$url = "http://www.nascomhomepage.com/";										break;
	case "ntz":						$url = "https://www.fachzeitungen.de/zeitschrift-magazin-ntz-informations-und-kommunikationstechnik";	break;
	case "OASIS":					$url = "https://en.wikipedia.org/wiki/OASIS_operating_system";					break;
	case "OCR":						$url = "https://$lang.wikipedia.org/wiki/Texterkennung";						break;
	case "OMTI 5510":				$url = "https://forum.classic-computing.de/forum/index.php?thread/17936-omti-5510-bios-gesucht/&postID=201722#post201722";	break;
	case "Optical character recognition":	$url = "https://en.wikipedia.org/wiki/Optical_character_recognition";	break;
	case "Osborne 1":				$url = "https://$lang.wikipedia.org/wiki/Osborne_1";							break;
	case "OTHELLO.NAS":				$url = "http://www.nascomhomepage.com/games/OTHELLO.NAS";						break;
	case "Pascal MicroEngine":		$url = "https://en.wikipedia.org/wiki/Pascal_MicroEngine";						break;
	case "Pascal/MT+":				$url = "https://en.wikipedia.org/wiki/Pascal/MT%2B";							break;
	case "PDP-11":					$url = "https://en.wikipedia.org/wiki/PDP-11";									break;
	case "PDP-7":					$url = "https://en.wikipedia.org/wiki/PDP-7";									break;
	case "Personal Computer World":								$url = "https://www.worldradiohistory.com/Personal_Computer_World.htm";														break;
	case "Personal Computer World, April 1979, page 76":		$url = "https://worldradiohistory.com/UK/Personal-Computer-World/70s/PCW-1979-04-S-OCR.pdf#page=76";						break;
	case "Personal Computer World, April 1980, page 93":		$url = "https://worldradiohistory.com/UK/Personal-Computer-World/80s/PCW-1980-04-S-OCR.pdf#page=95";						break;
	case "Personal Computer World, August 1982, page 134":		$url = "https://worldradiohistory.com/UK/Personal-Computer-World/80s/PCW-1982-08-S-OCR.pdf#page=136";						break;
	case "Personal Computer World, December 1978, page 64":		$url = "https://worldradiohistory.com/UK/Personal-Computer-World/70s/Personal-Computer-World-1978-12-S-OCR.pdf#page=64";	break;
	case "Personal Computer World, December 1979":				$url = "https://worldradiohistory.com/UK/Personal-Computer-World/70s/PCW-1979-12-S-OCR.pdf";								break;
	case "Personal Computer World, December 1980, page 59":		$url = "https://worldradiohistory.com/UK/Personal-Computer-World/80s/PCW-1980-12-S-OCR.pdf#page=61";						break;
	case "Personal Computer World, February 1981, page 136":	$url = "https://worldradiohistory.com/UK/Personal-Computer-World/80s/PCW-1981-02-S-OCR.pdf#page=138";						break;
	case "Personal Computer World, February 1983, page 174":	$url = "https://worldradiohistory.com/UK/Personal-Computer-World/80s/PCW-1983-02-S-OCR.pdf#page=176";						break;
	case "Personal Computer World, Issue 1, 1978":				$url = "https://worldradiohistory.com/UK/Personal-Computer-World/70s/Personal-Computer-World-Vol.1-No.1-S-OCR.pdf";			break;
	case "Personal Computer World, Issue 1, 1978, page 20":		$url = "https://worldradiohistory.com/UK/Personal-Computer-World/70s/Personal-Computer-World-Vol.1-No.1-S-OCR.pdf#page=22";	break;
	case "Personal Computer World, Issue 1, 1978, page 57":		$url = "https://worldradiohistory.com/UK/Personal-Computer-World/70s/Personal-Computer-World-Vol.1-No.1-S-OCR.pdf#page=59";	break;
	case "Personal Computer World, Issue 1, 1978, page 57":		$url = "https://worldradiohistory.com/UK/Personal-Computer-World/70s/Personal-Computer-World-Vol.1-No.1-S-OCR.pdf#page=59";	break;
	case "Personal Computer World, Issue 1, 1978, page 58":		$url = "https://worldradiohistory.com/UK/Personal-Computer-World/70s/Personal-Computer-World-Vol.1-No.1-S-OCR.pdf#page=60";	break;
	case "Personal Computer World, Issue 2, 1978, page 54":		$url = "https://worldradiohistory.com/UK/Personal-Computer-World/70s/Personal-Computer-World-Vol.1-No.2-S-OCR.pdf#page=56";	break;
	case "Personal Computer World, Issue 2, 1978, page 55":		$url = "https://worldradiohistory.com/UK/Personal-Computer-World/70s/Personal-Computer-World-Vol.1-No.2-S-OCR.pdf#page=57";	break;
	case "Personal Computer World, January 1982, page 135":		$url = "https://worldradiohistory.com/UK/Personal-Computer-World/80s/PCW-1982-01-S-OCR.pdf#page=137";						break;
	case "Personal Computer World, July 1980, page 42":			$url = "https://worldradiohistory.com/UK/Personal-Computer-World/80s/PCW-1980-07-S-OCR.pdf#page=44";						break;
	case "Personal Computer World, July 1980, page 85":			$url = "https://worldradiohistory.com/UK/Personal-Computer-World/80s/PCW-1980-07-S-OCR.pdf#page=87";						break;
	case "Personal Computer World, July 1982, page 100":		$url = "https://worldradiohistory.com/UK/Personal-Computer-World/80s/PCW-1982-07-S-OCR.pdf#page=102";						break;
	case "Personal Computer World, June 1980, page 60":			$url = "https://worldradiohistory.com/UK/Personal-Computer-World/80s/PCW-1980-06-S-OCR.pdf#page=62";						break;
	case "Personal Computer World, March 1981, page 116":		$url = "https://worldradiohistory.com/UK/Personal-Computer-World/80s/PCW-1981-03-S-OCR.pdf#page=122";						break;
	case "Personal Computer World, May 1980, page 77":			$url = "https://worldradiohistory.com/UK/Personal-Computer-World/80s/PCW-1980-05-S-OCR.pdf#page=79";						break;
	case "Personal Computer World, May 1981, page 81":			$url = "https://worldradiohistory.com/UK/Personal-Computer-World/80s/PCW-1981-05-S-OCR.pdf#page=83";						break;
	case "Personal Computer World, October 1980, page 48":		$url = "https://worldradiohistory.com/UK/Personal-Computer-World/80s/PCW-1980-10-S-OCR.pdf#page=50";						break;
	case "Personal Computer World, October 1980, page 82":		$url = "https://worldradiohistory.com/UK/Personal-Computer-World/80s/PCW-1980-10-S-OCR.pdf#page=84";						break;
	case "Personal Computer World, September 1982, page 115":	$url = "https://worldradiohistory.com/UK/Personal-Computer-World/80s/PCW-1982-09-S-OCR.pdf#page=117";						break;
	case "Personal Computer World, September 1982, page 163":	$url = "https://worldradiohistory.com/UK/Personal-Computer-World/80s/PCW-1982-09-S-OCR.pdf#page=165";						break;
	case "Personal Computer World, September 1982, page 274":	$url = "https://worldradiohistory.com/UK/Personal-Computer-World/80s/PCW-1982-09-S-OCR.pdf#page=276";						break;
	case "PET 2001":				$url = "https://$lang.wikipedia.org/wiki/PET_2001";								break;
	case "Pilot":					$url = "https://$lang.wikipedia.org/wiki/PILOT";								break;
	case "Piranha.nas":				$url = "http://www.nascomhomepage.com/games/Piranha.nas";						break;
	case "Pluto":					$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/io828.htm";				break;
	case "Programmierung des Z80":	$url = "http://www.z80.info/zaks.html";											break;
	case "R. Loeliger":				$url = "https://openlibrary.org/authors/OL1655329A/R._G._Loeliger";				break;
	case "RAM&nbsp;A":				$url = "https://80bus.co.uk.mirror.jloh.de/pages/nascom/rama.htm";				break;
	case "RAM&nbsp;B":				$url = "https://80bus.co.uk.mirror.jloh.de/pages/nascom/ramb.htm";				break;
	case "PICO Computer":			$url = "https://tupel.jloh.de/pico/";											break;
	case "ROBOT INTELLIGENCE with experiments":	$url = "https://openlibrary.org/works/OL4090255W/Robot_intelligence_..._with_experiments";	break;
	case "Rolf":					$url = "https://rolf-becker.de/Lehrcomputer.html";								break;
	case "Rolf-Dieter Klein":		$url = "https://openlibrary.org/authors/OL1221691A/Rolf-Dieter_Klein";			break;
	case "RPB Taschenbuch 154":		$url = "https://www.radiomuseum.org/lf/b/kw-amateurbildfunk-sstv-und-fax-radio-praktiker-buecherei-rpb-nr-154_edition1/";	break;
	case "Sahara-Finsternis":		$url = "http://www.sonnenfinsternis.org/sofi1973t/index.htm";					break;
	case "SANYO DM8112CX":			$url = "https://www.flickr.com/photos/23826245@N00/2259904187";					break;
	case "Scientific American, Issue 223":	$url = "https://web.stanford.edu/class/sts145/Library/life.pdf";		break;
	case "Seagate ST-251":			$url = "https://theretroweb.com/harddrives/202";								break;
	case "SENSO":					$url = "https://$lang.wikipedia.org/wiki/Senso_%28Spiel%29";					break;
	case "Sharp MZ-80K":			$url = "https://www.homecomputermuseum.nl/en/collectie/sharp/sharp-mz-80k/";	break;
	case "Sharp MZ80":				$url = "https://en.wikipedia.org/wiki/Sharp_MZ";								break;
	case "Siemens T&nbsp;37":		$url = "https://en.wikipedia.org/wiki/Teleprinter#/media/File:Siemens_t37h_without_cover.jpg";	break;
	case "Siemens T&nbsp;68":		$url = "https://stb-betzwieser.de/aktuelles/ausstellung/kategorien-1/siemenst68.php";	break;
	case "Spaceii.nas":				$url = "http://www.nascomhomepage.com/games/Spaceii.nas";						break;
	case "Space Potatoes":			$url = "https://archive.org/details/80-microcomputing-magazine-1981-08/page/n101/mode/2up";	break;
	case "Startrek.cas":			$url = "http://www.nascomhomepage.com/mbasic/Startrek.cas";						break;
	case "Sternwarte Wien":			$url = "https://www.vhs.at/de/e/planetarium";									break;
	case "Superbrain":				$url = "https://$lang.wikipedia.org/wiki/Intertec_Superbrain";					break;
	case "SVC":						$url = "https://80bus.co.uk.mirror.jloh.de/pages/gemini/gm832.htm";				break;
	case "Swinghs.cas":				$url = "http://www.nascomhomepage.com/mbasic/Swinghs.cas";						break;
	case "Swords.cas":				$url = "http://www.nascomhomepage.com/mbasic/Swords.cas";						break;
	case "TANDY Lineprinter VI":	$url = "https://colorcomputerarchive.com/repo/Documents/Manuals/Hardware/Line%20Printer%20IV%20(Tandy).pdf";	break;
	case "TANDY Lineprinter VIII":	$url = "http://dunfield.classiccmp.org/printer/h/lpviii.jpg";					break;
	case "TEAC FD-55F":				$url = "https://classic.technology/teac-fd-55-series/";							break;
	case "Technics RS-M250":		$url = "https://www.radiomuseum.org/r/technics_stereo_cassette_deck_rs_m_25.html";	break;
	case "Technics":				$url = "https://$lang.wikipedia.org/wiki/Technics";								break;
	case "Technische Informatik":	$url = "https://www.th-koeln.de/studium/technische-informatik-bachelor-campus-gummersbach_3502.php";	break;
	case "TECO":					$url = "https://$lang.wikipedia.org/wiki/TECO_%28Texteditor%29";				break;
	case "Tektronix 4051":			$url = "https://en.wikipedia.org/wiki/Tektronix_405x";							break;
	case "Telekom":					$url = "https://www.telekom.de/";												break;
	case "TeleVideo 950":			$url = "https://terminals-wiki.org/wiki/index.php/TeleVideo_950";				break;
	case "Terminal":				$url = "https://$lang.wikipedia.org/wiki/Terminal_(Computer)";					break;
	case "Texas Instruments":		$url = "https://www.ti.com";													break;
	case "Tforth.nas":				$url = "http://www.nascomhomepage.com/lang/Tforth.nas";							break;
	case "The complete FORTH":		$url = "https://openlibrary.org/works/OL5598529W/The_complete_FORTH";			break;
	case "Threaded Interpretive Languages":	$url = "https://archive.org/details/R.G.LoeligerThreadedInterpretiveLanguagesTheirDesignAndImplementationByteBooks1981/mode/2up";	break;
	case "Tietokonemuseo":			$url = "https://www.tietokonemuseo.net/other-interesting-stuff/kontron-zilog-z80-kit-antti-isannainen/";	break;
	case "TL497":					$url = "https://www.ti.com/lit/ds/symlink/tl494.pdf";							break;
	case "TMS5100":					$url = "https://www.datasheetarchive.com/?q=tms5100";							break;
	case "TMS9929":					$url = "https://www.datasheetarchive.com/?q=tms9929";							break;
	case "Triumph-Adler P4":		$url = "https://forum.classic-computing.de/forum/index.php?thread/16182-alphatronic-p4/";	break;
	case "TRS-80":					$url = "https://$lang.wikipedia.org/wiki/TRS-80";								break;
	case "TRS-80 Model III":		$url = "https://$lang.wikipedia.org/wiki/TRS-80#TRS-80_Model_III";				break;
	case "UCSD Pascal":				$url = "https://$lang.wikipedia.org/wiki/UCSD_Pascal";							break;
	case "UFOJAGD.CAS":				$url = "http://www.nascomhomepage.com/zeap/UFOJAGD.CAS";						break;
	case "Video Genie":				$url = "https://en.wikipedia.org/wiki/Video_Genie";								break;
	case "Vobis":					$url = "https://$lang.wikipedia.org/wiki/Vobis#Geschichte";						break;
	case "Volkshochschule":			$url = "https://www.volkshochschule.de/";										break;
	case "Vom Umgang mit CP/M":		$url = "http://myoldmac.net/Sellpicts/books/APPLE-CPM-umgang--B-Pol.jpg";		break;
	case "Vorschaubild":			$url = "https://$lang.wikipedia.org/wiki/Vorschaubild";							break;
	case "WD1793":					$url = "https://www.retrotechnology.com/herbs_stuff/WD179X.PDF";				break;
	case "WD2793":					$url = "http://bitsavers.informatik.uni-stuttgart.de/components/ti/_dataBooks/TMS279X_Floppy_Disk_Formatter_Jun84.pdf";	break;
	case "Weinheimer UKW-Tagung":	$url = "https://ukw-tagung.org/";												break;
	case "Wikipedia über Nascom":	$url = "https://$lang.wikipedia.org/wiki/Nascom";								break;
	case "Wikipedia":				$url = "https://$lang.wikipedia.org/";											break;
	case "Windows 3.0":				$url = "https://$lang.wikipedia.org/wiki/Microsoft_Windows_3.0";				break;
	case "Xyl":						$url = "https://www.urbandictionary.com/define.php?term=xyl";					break;
	case "Z-80-Applikationsbuch":	$url = "https://d-nb.info/831222980";											break;
	case "Z80 CPU":					$url = "https://www.zilog.com/docs/z80/um0080.pdf";								break;
	case "Z80 CTC":					$url = "https://www.zilog.com/docs/z80/ps0181.pdf";								break;
	case "Z80 DART":				$url = "https://datasheet.datasheetarchive.com/originals/scans/Scans-97/DSAIHSC00072076.pdf";	break;
	case "Z80 DMA":					$url = "https://www.zilog.com/docs/z80/ps0179.pdf";								break;
	case "Z80 PIO":					$url = "https://www.zilog.com/docs/z80/ps0180.pdf";								break;
	case "Z80 SIO":					$url = "https://www.zilog.com/docs/z80/ps0183.pdf";								break;
	case "Z80":						$url = "https://$lang.wikipedia.org/wiki/Zilog_Z80";							break;
	case "Z80-KIT":					$url = "https://tupel.jloh.de/z80-kit/";										break;
	case "Z80-KIT Anwenderhandbuch":$url = "https://2jo.de/robotron/Kontron/KONz80.pdf";							break;
	case "Zaphod Beeblebrox":		$url = "https://$lang.wikipedia.org/wiki/Zaphod_Beeblebrox";					break;
	case "Zilog":					$url = "https://www.zilog.com/";												break;
	default:						$url = "externalLink($link, $text)";											break;
	}
	if ($url != "") {
		if ($url[0] == '?') {
			// url ungültig / veraltet
			echo $link;
		} else {
			echo "<!-- External Link -->";
			echo "<a href=\"$url\"";

			echo ' title="';
			if ($lang == "en") {
				echo 'External Link';
			} else {
				echo 'Externer Link';
			}
			if ($text != "" || $newText != "") {
				echo ': ';
				if ($newText != "") {
					echo $newText;
				} else {
					echo $link;
				}
			}
			echo '"';

			echo ' target="_blank"';
//			https://mathiasbynens.github.io/rel-noopener/
//			echo ' rel="noopener"';
			echo ' rel="noreferrer"';
			echo '>';
			if ($text == "") {
				echo $link;
			} else {
				echo $text;
			}
			echo "</a><!-- /External Link -->$delimiter";
		}
	} else {
		if ($text != "") {
			echo "<a href=\"$text\"></a>$text$delimiter";
		} else {
			echo "<a href=\"$link\"></a>$link$delimiter";
		}
	}
}

function hline($width, $border="")
{
	echo "<!-- Linie"/* über ganze Spalte*/." -->";
	echo "<div class=\"hline\" style=\"width: $width; margin:auto; ";
	if (strpos($border, "2") !== FALSE) {	// 2px
		echo	" border-top:2px";
	} else {
		echo	" border-top:1px";
	}
	if (strpos($border, "o") !== FALSE) {	// dotted
		echo	" dotted";
	} else if (strpos($border, "d") !== FALSE) {	// dashed
		echo	" dashed";
	} else {
		echo	" solid";
	}
	echo		" #000; padding: 0; margin-top: 3px; margin-bottom: 3px\">";
	echo "</div>\n";
}

function bottomGap()
{
	echo "<br>";
}

?>
<body>
	<nav class="navbar navbar-expand-<?php echo BootstrapTier("NavTop"); ?> navbar-light bg-light style-navbar-top" id="top">
	<div class="container-fluid">
<?php
//		echo "\t<img src=\"$gHtmlRoot/nascom/journal/pixel.gif\" alt=\"\">\n";
		if (is_file("$document_root/favicon.ico")) {
			echo "\t\t<a class=\"navbar-brand\" href=\"https://jloh.de/\">\n";
			echo "\t\t\t<img src=\"$gHtmlRoot/favicon.ico\" width=\"32\" height=\"32\" alt=\"JL\" title=\"Homepage von Jürgen Loh\">\n";
			echo <<<HEREDOC
		</a>
		<button
			class="navbar-toggler"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent"
			aria-expanded="false"
			aria-label="Toggle navigation"
		>
			<span class="navbar-toggler-icon"></span>
		</button>

HEREDOC;
		}
?>
		<div class="collapse navbar-collapse robots-nocontent" id="navbarSupportedContent">
			<ul class="navbar-nav <?php echo BootstrapTier("NavTop"); ?>-auto">
<?php
				function addNav($dir, $text, $str = "")
				{
					global $document_root;
					global $gHtmlRoot;

					$request = addslashes(getenv('REQUEST_URI'));
					$item_dir = "$document_root/$dir";
/*
					echo "<!--\n";
					echo "document_root	$document_root\n";
					echo "item_dir $item_dir\n";
					echo "text     $text\n";
					echo "request  $request\n";
					echo "dir      $dir\n";
					echo "str      $str\n";
					echo "gHtmlRoot	$gHtmlRoot\n";
					echo "getcwd   ".getcwd()."\n";
					echo "-->\n";
*/
					// Für https://tupel.jloh.de/pvt/ahnen/
					if (!is_dir($item_dir)) {
						$item_dir = "../htdocs/".$item_dir;
//						echo "<!-- item_dir $item_dir -->\n";
					}

					if (is_dir($item_dir)) {
						echo "\t\t\t\t<li class=\"nav-item\">\n";
						echo "\t\t\t\t\t<a class=\"nav-link";
						if ($request == "/$dir/"
						||	strpos($request, "/$str/") === 0
						||	$request == "/" && $dir == ""
						) {
							echo " active";
						}
						echo "\" href=\"$gHtmlRoot/$dir";
						if ($dir != "") {
							echo "/";
						}
						echo "\">$text</a>\n";
						echo "\t\t\t\t</li>\n";
					}
				}

				addNav("z80-kit", "Z80-KIT");
				addNav("nascom/1", "Nascom 1");
				addNav("nascom", "Nascom Journal", "nascom/journal");
				addNav("nascom/magazines/issues", "Nascom Magazines", "nascom/magazines");
				addNav("pico", "PICO");
				addNav("cpm-plus", "CP/M");
				addNav("", "Tupel BBS");

				function navBottom($dir, $desc)
				{
					global $gHtmlRoot;
					global $document_root;

					$result = "";
					$item_dir = "$document_root/$dir";
//					$result .= "<!--item_dir $item_dir-->";
					if (is_dir($item_dir)) {
						$result .=
							"\t\t"
						.	'<a class="sm-fill nav-link" href="'."$gHtmlRoot/"
						.	$dir
						.	'/">'
						.	$desc
						.	'</a>'
						.	"\n";
					}
					return $result;
				}
?>
			</ul>
		</div>
	</div>
	</nav>

<?php
	echo "\t<div class=\"container\"";
	echo " style=\"max-width: $gWidth"."px;";
	echo " color: #000;";
	echo " padding: 0 15px 0;";
	echo " background-color: #FFF\">\n";
?>

<!--********************************************************************************-->

<!-- /navi-body.php / $Date: 2026-04-04 13:02:13 +0200 (Sa, 04. Apr 2026) $ -->
