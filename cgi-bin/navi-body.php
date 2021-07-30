<!-- navi-body.php -->
</head>

<?php

$nl = "&#32;&#10;";
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

function imageinsert($imagepath, $year, $issue, $page, $imagename, $style="", $class="", $append="", $link="", $target="", $scale=1, $noscale=false)
{
	global $magpath, $issuepath, $gWidth;
	$alt = imageDesc($year, $issue, $page, $imagename);
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
	// nascom journal oder magazines?
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
	echo "\" src=\"$imagepath$imagename\" alt=\"$alt\" width=\"$width\" height=\"$height\">";
	if ($link != "") {
		echo "</a>";
	}
	echo "$append\n";	
}

function imagePlain($imagepath, $year, $issue, $page, $imagename, $style="", $class="")
{
	global $magpath, $issuepath;
	$alt = imageDesc($year, $issue, $page, $imagename);
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
//	echo "<div style=\"margin: 0 auto\">";
	imageinsert($imagepath, $year, $issue, $page, $imagename, $style, "mx-auto d-block $class", $append);
//	echo "</div>";
}

function imageRight($imagepath, $year, $issue, $page, $imagename, $style="", $class="", $append="", $link="", $target="", $scale=1)
{
//	echo "<div style=\"margin-left:auto; margin-right:0\">";
	echo "<div class=\"text-end\">";
	imageinsert($imagepath, $year, $issue, $page, $imagename, $style, $class, "</div>$append", $link, $target, $scale);
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

function imageinsertGap($imagepath, $year, $issue, $page, $imagename, $style="", $class="")
{
	// mit einer Zeile Abstand nach dem Bild
	imageinsert($imagepath, $year, $issue, $page, $imagename, $style, $class, "<br><br>");
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
	imageinsert($imagepath, $year, $issue, $page, $imagename, $style, $class, "", "", "", 1, true);
}

function imageNoscaleGap($imagepath, $year, $issue, $page, $imagename, $style="", $class="")
{
	// unskaliert (magazines), mit einer Zeile Abstand nach dem Bild
	imageinsert($imagepath, $year, $issue, $page, $imagename, $style, $class, "<br><br>", "", "", 1, true);
}

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
// font awesome 5
	echo "<span class=\"fas fa-";
	switch ($s) {
	case "previous-page":	echo "arrow-left";		break;
	case "first-page":		echo "fast-backward";	break;
	case "previous-issue":	echo "backward";		break;
	case "next-issue":		echo "forward";			break;
	case "last-page":		echo "fast-forward";	break;
	case "next-page":		echo "arrow-right";		break;
	}
	echo "\" aria-hidden=true></span>";
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

function DivWithStyle($border, $style = "", $class = "")
{
	if ($border == "") {
		$border = "TBLR";	// Top Bottom Left Right
	}
//			echo "<!--$border-->";
	echo "<div";
	if ($class != "") {
		echo " class=\"$class\"";
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

function boxStart($border = "", $style = "", $class = "")
{
	echo "<!-- Kasten über ganze Spalte: Start -->";
	DivWithStyle($border, "width: 100%; $style", $class);
}
function boxStartNowrap($border = "", $style = "", $class = "")
{
	echo "<!-- Kasten &uuml;ber ganze Spalte: Start -->";
	DivWithStyle($border, "width: 100%; $style", "style-nowrap $class");
}
function boxStartJustify($border = "", $style = "", $class = "")
{
	echo "<!-- Kasten &uuml;ber ganze Spalte im Blocksatz: Start -->";
	DivWithStyle($border, "width: 100%; $style", "justify $class");
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
//				echo "&$spChar;";
//				echo "&lowast;";
//				echo "&#9788;";
		break;
	case "circle1":
		echo "&#x2780;";	// 	dingbat circled sans-serif digit one
		break;
	case "circle2":
		echo "&#x2781;";	// 	dingbat circled sans-serif digit two
		break;
	case "lowast_zwsp":
		spChar("zwsp");
		spChar("lowast");
		spChar("zwsp");
		break;
	default:
		echo "&$spChar;";
		break;
	}
}

function imageDesc80($issue, $page, $file)
{
	global $nl;

	switch ("$issue $page $file") {
	case "00 01 Image-01-1.gif":
	case "01 01 Image-01-1.gif":
	case "02 01 Image-01-1.gif":
	case "03 01 Image-01-1.gif":
	case "04 01 Image-01-1.jpeg":
	case "05 01 Image-01-1.jpeg":
	case "06 01 Image-01-1.jpeg": return("Nascom");

	case "06 49 Image-49-1.jpeg": return("MKS &nbsp; Michael Klein - Systemtechnik$nl"."- Vertrieb");

	case "00 01 Image-01-3.gif":
	case "01 01 Image-01-3.gif":
	case "02 01 Image-01-3.gif":
	case "03 01 Image-01-3.gif":
	case "04 01 Image-01-3.jpeg":
	case "04 03 Image-03-1.jpeg":
	case "05 01 Image-01-3.jpeg":
	case "06 02 Image-02-1.jpeg": return("Michael Klein");

	case "00 01 Image-01-2.gif": return("Journal 0/80");

	case "01 01 Image-01-2.gif": return("Journal 1/80");
	case "01 02 Image-02-1.gif": return("Nascom IMP");

	case "02 01 Image-01-2.gif": return("Journal 2/80");

	case "03 01 Image-01-2.gif": return("Journal 3/80");

	case "04 01 Image-01-2.jpeg": return("Journal 4/80");
	case "04 04 Image-04-2.jpeg": return("Messegelände Killesberg");
	case "04 19 Image-19-1.jpeg": return("BOOK SHOP");

	case "05 01 Image-01-2.jpeg": return("Journal 5/80");
	case "05 05 Image-05-1.jpeg": return("Fortsetzung folgt...");

	case "06 01 Image-01-2.jpeg": return("Journal 6/80$nl"."7/80");
	case "06 49 Image-49-2.jpeg": return("Sonderpreis bis$nl"."15. Januar: 128,-");
	}
	return "";
}

function imageDesc81($issue, $page, $file)
{
	global $nl;

	switch ("$issue $page $file") {
	case "01 01 Image-01-1.jpeg":
	case "02 01 Image-01-1.jpeg":
	case "02 17 ../journal/81/02/Image-17-3.jpeg":
	case "02 17 Image-17-3.jpeg":
	case "03 01 Image-01-1.jpeg":
	case "04 00 Image-00-1.jpeg": return("Nascom");

	case "01 15 Image-15-1.jpeg": return("MKS &nbsp; Michael Klein - Systemtechnik$nl"."- Vertrieb");

	case "02 02 Image-02-1.jpeg":
	case "02 17 Image-17-1.jpeg":
	case "04 01 Image-01-1.jpeg":
	case "07 02 Image-02-1.jpeg":
	case "07 02 Image-02-1.png":  return("Michael Klein");

	case "02 19 Image-19-1.jpeg":
	case "03 24 Image-24-1.jpeg":
	case "06 01 Image-01-1.jpeg":
	case "06 01 Image-01-1.png":
	case "06 02 Image-02-1.jpeg":
	case "06 02 Image-02-1.png":
	case "07 01 Image-01-1.jpeg":
	case "07 01 Image-01-1.png":
	case "07 03 journal/81/07/Image-03-1.jpeg":
	case "07 03 ../../81/07/Image-03-1.jpeg":
	case "07 03 ../81/07/Image-03-1.jpeg":
	case "07 03 Image-03-1.jpeg":
	case "08 01 Image-01-1.jpeg":
	case "08 01 Image-01-1.png":
	case "08 02 Image-02-1.jpeg":
	case "08 02 Image-02-1.png":
	case "09 01 Image-01-1.jpeg":
	case "09 01 Image-01-1.png":
	case "09 02 Image-02-1.jpeg":
	case "09 02 Image-02-1.png":
	case "10 01 Image-01-1.jpeg":
	case "10 01 Image-01-1.png":
	case "10 02 Image-02-1.jpeg":
	case "10 02 Image-02-1.png":
	case "12 01 Image-01-1.jpeg":
	case "12 01 Image-01-1.png":
	case "12 02 Image-02-1.jpeg":
	case "12 02 Image-02-1.png": return("Nascom$nl"."Journal");

	case "06 03 Image-03-1.jpeg":
	case "12 02 Image-02-2.jpeg":
	case "12 02 Image-02-2.png": return("Günter Böhm");

	case "06 07 Image-07-1.jpeg":
	case "07 17 Image-17-1.jpeg":
	case "08 19 Image-19-1.jpeg":
	case "09 13 Image-13-6.jpeg":
	case "10 24 Image-24-4.jpeg":
	case "10 27 Image-27-1.jpeg":
	case "10 27 Image-27-1.png":
	case "12 23 Image-23-2.jpeg":
	case "12 28 Image-28-2.jpeg":
	case "12 54 Image-54-1.jpeg": return("NASCOMPL");

	case "01 01 Image-01-2.jpeg": return("Journal 1/81");
	case "01 02 Image-02-1.jpeg": return("Ihr Michael Klein");

	case "02 01 Image-01-2.jpeg": return("Journal 2/81");

	case "03 01 Image-01-2.jpeg": return("Journal 3/81");

	case "04 00 Image-00-2.jpeg": return("Journal 4/81$nl"."&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 5");

	case "06 07 Image-07-2.jpeg": return("NASCOMPL:$nl"."&gt; HALLO!$nl"."&gt; LIEBE$nl"."&gt; LESER!$nl"."&gt;");
	case "06 08 Image-08-2.jpeg": return("BUGS BUGS BUGS");
	case "06 08 Image-08-3.jpeg": return("BASIC");
	case "06 11 Image-11-1.jpeg": return("NASCOMPL:$nl"."Lieber Herr Lotter!$nl"."Wir warten alle$nl"."sehnlichst auf die$nl"."MDCR-Software!!");
	case "06 14 Image-14-3.jpeg": return("NASCOMPL:$nl"."Wie heißt das eigentlich$nl"."richtig?$nl"."relocierbar, relocating,$nl"."relocatierbar, relokalisierbar$nl"."Bierbar, relocable,$nl"."relokabel, relokatibel,$nl"."verschiebbar, verschieblich$nl"."verschiebel, verschiebsam,$nl"."verschiebing,$nl"."verschiekabel,$nl"."ortsungebunden,$nl"."ortlos oder$nl"."vielortig&nbsp;???$nl"."Am besten einigen$nl"."wir uns auf$nl"."''verschortolatibel''!");
	case "06 20 Image-20-1.jpeg":
	case "06 20 Image-20-1.png":  return("othello");
	case "06 20 Image-20-3.jpeg":
	case "06 20 Image-20-3.png":  return("NASCOMPL:$nl"."Wenn Sie die$nl"."Spielregel$nl"."herausgefunden$nl"."haben, schreiben$nl"."Sie uns bitte!");

	case "07 11 Image-11-3.jpeg": return("NASCOMPL:$nl"."Hoffentlich wird$nl"."der Druck diesmal$nl"."besser!!");
	case "07 13 Image-13-5.jpeg": return("NASCOMPL:$nl"."IM NÄCHSTEN HEFT:$nl"."SORTIEREN DURCH$nl"."EINFÜGEN");
	case "07 17 Image-17-2.jpeg": return("NASCOMPL:$nl"."Geschlechtstypen bei Computern");

	case "08 13 Image-13-4.jpeg": return("NASCOMPL:$nl"."Formatiert sehe ich$nl"."sehr seltsam aus!!");
	case "08 19 Image-19-2.jpeg": return("NASCOMPL:$nl"."Platinismus");
	case "08 20 Image-20-1.jpeg": return("Spielecke");

	case "09 04 Image-04-2.jpeg": return("NASCOMPL:$nl"."Hier haben$nl"."wir Platz$nl"."für$nl"."Randnotizen$nl"."gelassen!");
	case "09 07 Image-07-2.jpeg": return("NASCOMPL:$nl"."Kann ja &rsquo;mal$nl"."passieren");
	case "09 13 Image-13-7.jpeg": return("NASCOMPL:$nl"."Mein Beitrag muß diesmal$nl"."wegen Platmangels ausfallen.$nl"."Das ist nicht so schlimm.$nl"."Aber daß mich$nl"."ein Leser ''albern''$nl"." findet, bricht$nl"."mir fast die CPU!");

	case "10 06 Image-06-2.jpeg": return("NASCOMPL:$nl"."ICH GLAUBE,$nl"."DAS INTERESSE$nl"."FÜR WEITERE$nl"."ARTIKEL VON$nl"."HERRN FÖßEL$nl"."KANN MAN$nl"."VORAUSSETZEN!");
	case "10 27 Image-27-2.jpeg":
	case "10 27 Image-27-2.png":  return("NASCOMPL:$nl"."Computermisshandlung");

	case "12 40 Image-40-3.jpeg": return("NASCOMPL:$nl"."KEIN$nl"."STRESS$nl"."MEHR BEIM$nl"."TIPPEN!");
	case "12 52 Image-52-3.jpeg": return("NASCOMPL:$nl"."Wer hat sich bloß$nl"."dieses blöde$nl"."ASHRAM ausgedacht?");
	case "12 54 Image-54-2.jpeg": return("NASCOMPL:$nl"."Weihnachtliches");
	}
	return "";
}

function imageDesc82($issue, $page, $file)
{
	global $nl;

	switch ("$issue $page $file") {
	case "01 01 Image-01-1.jpeg":
	case "01 01 Image-01-1.png":
	case "01 02 Image-02-1.jpeg":
	case "02 01 Image-01-1.jpeg":
	case "02 01 Image-01-1.png":
	case "02 02 Image-02-1.jpeg":
	case "03 01 Image-01-1.jpeg":
	case "03 01 Image-01-1.png":
	case "03 47 Image-47-3.jpeg":
	case "05 01 Image-01-1.jpeg":
	case "05 01 Image-01-1.png":
	case "05 02 Image-02-1.jpeg":
	case "06 01 Image-01-1.jpeg":
	case "06 01 Image-01-1.png":
	case "06 02 Image-02-1.jpeg":
	case "07 01 Image-01-1.jpeg":
	case "07 01 Image-01-1.png":
	case "07 02 Image-02-1.jpeg":
	case "09 01 Image-01-1.jpeg":
	case "09 01 Image-01-1.png":
	case "09 02 Image-02-1.jpeg":
	case "10 01 Image-01-1.jpeg":
	case "10 01 Image-01-1.png":
	case "12 01 Image-01-1.jpeg": return("Nascom$nl"."Journal");

	case "01 02 Image-02-2.jpeg": return("Günter Böhm");

	case "01 35 Image-35-1.jpeg":
	case "02 17 Image-17-4.jpeg":
	case "02 30 Image-30-1.jpeg":
	case "03 51 Image-51-1.jpeg":
	case "05 23 Image-23-2.jpeg":
	case "05 31 Image-31-1.jpeg":
	case "06 23 Image-23-1.jpeg":
	case "07 59 Image-59-1.jpeg":
	case "09 11 Image-11-4.jpeg":
	case "10 07 ../82/10/Image-07-2.jpeg":
	case "10 07 Image-07-2.jpeg": return("NASCOMPL");

	case "01 07 Image-07-3.jpeg": return("NASCOMPL:$nl"."Dieser Platz$nl"."könnte durch$nl"."einen NASCOMPL$nl"."ausgefüllt werden,$nl"."bleibt aber mit$nl"."Rücksicht auf$nl"."manche Leser$nl"."frei.");
	case "01 11 Image-11-2.jpeg": return("NASCOMPL:$nl"."Mensch Clemens!$nl"."Das hast Du gut gemacht.$nl"."Wenn ich in deinem$nl"."Alter schon$nl"."programmiert hätte,$nl"."wäre ich sicher$nl"."berühmt!");
	case "01 18 Image-18-1.jpeg": return("Nascom Journal");
	case "01 25 Image-25-1.jpeg": return("NASCOMPL:$nl"."LISTING AUF DER$nl"."NÄCHSTEN SEITE!");
	case "01 35 Image-35-2.jpeg": return("NASCOMPL:$nl"."MOTZ1$nl"."MOTZ2$nl"."MOTZ3$nl"."MOTZ4$nl"."MOTZ5$nl"."");

	case "02 21 Image-21-2.jpeg": return("NASCOMPL:$nl"."Wußten Sie$nl"."eigentlich schon,$nl"."daß man unter$nl"."gewissen Um-$nl"."ständen für$nl"."eine Speicher-$nl"."erweiterung eine$nl"."Baugenehmigung$nl"."benötigt??");
	case "02 26 Image-26-4.jpeg": return("NASCOMPL:$nl"."Jetzt$nl"."müßte man$nl"."nur noch$nl"."wissen, welches$nl"."der große$nl"."Zeiger ist!!");
	case "02 30 Image-30-2.jpeg": return("NASCOMPL:$nl"."Ostereiersuchprogramm");

	case "03 22 Image-22-5.jpeg": return("NASCOMPL:$nl"."Jeder$nl"."Abonnent$nl"."kann$nl"."Kleinanzeigen$nl"."bis 40 Wörter$nl"."aufgeben!$nl"."$nl"."(Das ist diesmal$nl"."kein Witz!)");
	case "03 35 Image-35-4.jpeg": return("NASCOMPL:$nl"."Mir$nl"."dreht$nl"."sich$nl"."alles!");
	case "03 51 Image-51-2.jpeg": return("NASCOMPL:$nl"."Programmiersprache BIRNE");

	case "05 31 Image-31-2.jpeg": return("NASCOMPL:$nl"."Sex und Computer");

	case "06 19 Image-19-3.jpeg": return("NASCOMPL:$nl"."Bei achtzig Zeichen pro Zeile bekommt man in so$nl"."eine Sprechblase doch gewaltig mehr unter als mit$nl"."unserem alten Format!");
	case "06 23 Image-23-2.jpeg": return("NASCOMPL:$nl"."Reisezeit");

	case "07 02 Image-02-2.jpeg": return("Weiterhin viel Spaß mit dem$nl"."Journal$nl"."Ihr Günter Böhm");
	case "07 05 Image-05-2.jpeg": return("NASCOMPL:$nl"."Wir kaufen nichts!");
	case "07 08 Image-08-1.jpeg": return("NASCOMPL:$nl"."KNOBELECKE$nl"."$nl"."auch in dieser$nl"."Ausgabe sind$nl"."wieder eine$nl"."Menge$nl"."Kleinanzeigen$nl"."versteckt.$nl"."Schreiben Sie$nl"."die Anzahl auf$nl"."einen Zettel$nl"."und zeigen Sie$nl"."ihn niemanden!$nl"."$nl"."Kleinanzeigen bis 40 Wörter sind für Abonnenten$nl"."kostenlos!$nl"."");
	case "07 43 Image-43-2.jpeg": return("NASCOMPL:$nl"."Software-Tip:$nl"."$nl"."Nehmen Sie sich einen$nl"."Tag Urlaub, wenn Sie$nl"."den Zauberwürfel$nl"."eintippen wollen!");
	case "07 59 Image-59-2.jpeg": return("NASCOMPL:$nl"."Greeting Messages");

	case "09 11 Image-11-5.jpeg": return("NASCOMPL:$nl"."Früh-Herbst");
	case "09 13 Image-13-3.jpeg": return("NASCOMPL:$nl"."Kein Grund zur$nl"."Freude! Ich$nl"."bleibe Ihnen$nl"."noch erhalten!");

	
	case "10 07 Image-07-3.jpeg": return("NASCOMPL:$nl"."80-BUS$nl"."JOURNAL");
	case "10 07 Image-07-4.jpeg": return("Hallo liebe Leser!");
	case "10 23 Image-23-2.jpeg": return("NASCOMPL:$nl"."Hi Hi Hi Hi Hi$nl"."Hi Hi Hi Hi$nl"."Hi Hi Hi$nl"."Hi Hi Hi!");
	case "10 24 Image-24-1.jpeg": return("NASCOMPL:$nl"."80 Busserl");
	}
	return "";
}

function imageDesc83($issue, $page, $file)
{
	global $nl;

	switch ("$issue $page $file") {
	case "01 11 Image-11-1.jpeg":
	case "01 14 Image-14-2.jpeg":
	case "02 16 Image-16-2.jpeg":
	case "02 23 Image-23-1.jpeg":
	case "02 27 Image-27-1.jpeg":
	case "03 02 Image-02-2.jpeg":
	case "03 04 Image-04-1.jpeg": return("NASCOMPL");

	case "01 01 Image-01-1.jpeg":
	case "01 02 Image-02-1.jpeg":
	case "02 01 Image-01-1.jpeg":
	case "02 02 Image-02-1.jpeg":
	case "03 01 Image-01-1.jpeg":
	case "03 02 journal/83/03/Image-02-1.jpeg":
	case "03 02 ../../83/03/Image-02-1.jpeg":
	case "03 02 ../83/03/Image-02-1.jpeg":
	case "03 02 Image-02-1.jpeg":
	case "04 01 Image-01-1.jpeg":
	case "04 02 Image-02-1.jpeg":
	case "05 01 Image-01-1.jpeg":
	case "05 02 Image-02-1.jpeg":
	case "06 01 Image-01-1.jpeg":
	case "06 02 Image-02-1.jpeg":
	case "07 01 Image-01-1.jpeg":
	case "07 02 Image-02-1.jpeg":
	case "09 01 Image-01-1.jpeg":
	case "09 02 Image-02-1.jpeg":
	case "11 01 Image-01-1.jpeg":
	case "11 02 Image-02-1.jpeg":
	case "12 01 Image-01-1.jpeg":
	case "12 02 Image-02-1.jpeg": return("80-Bus$nl"."Journal");

	case "01 01 Image-01-2.jpeg": return("Druckausgabe von TV-Bildern");
	case "01 16 Image-16-1.jpeg": return("NASCOMPL:$nl"."mh$nl"."mh$nl"."mh$nl"."$nl"."(Red.:In der nächsten$nl"."Ausgabe darf er wieder$nl"."mehr sagen!)");

	case "02 01 Image-01-2.jpeg": return("platinen-layout:$nl"."SPRACH-$nl"."ERKENNUNG");
	case "02 06 Image-06-2.jpeg": return("SPRACHERKENNUNG &nbsp; Lötseite");
	case "02 07 Image-07-1.jpeg": return("NASCOMPL:$nl"."Die linke Hand der Redaktion");
	case "02 16 Image-16-1.jpeg": return("Spielecke");

	case "03 01 Image-01-2.jpeg": return("&quot;PÄCK-MÄNN&quot;$nl"."(klingt wie Pac Man und läuft auch so)");
	case "03 11 Image-11-3.jpeg": return("NASCOMPL:$nl"."Druckfehler");

	case "04 01 Image-01-2.jpeg": return("BASIC VARIANTEN");
	case "04 03 Image-03-2.jpeg": return("* zumindest kamen$nl"."auf unser Angebot$nl"."zur Mitgestaltung$nl"."bisher nur 2$nl"."Zuschriften!");
	case "04 03 Image-03-5.jpeg": return("NASCOMPL:$nl"."Diese Schmalschrift$nl"."spart Zeit und macht$nl"."Platz für viele$nl"."NASCOMPLs. Zudem$nl"."scheint sie die$nl"."Leser nicht zu$nl"."stören!");
	case "04 11 Image-11-4.jpeg": return("NASCOMPL:$nl"."Ein selbstgezimmertes TOOL-KIT:$nl"."wirksam und$nl"."vor allem$nl"."preiswert!");
	case "04 19 Image-19-5.jpeg": return("NASCOMPL:$nl"."Ohne die Änderung$nl"."in Zeile 2680$nl"."finde ich hier$nl"."nie wieder$nl"."heraus!!!");
	case "04 20 Image-20-1.jpeg": return("NASCOMPL:$nl"."Denken Sie rechtzeitig$nl"."an ein Sommergehäuse$nl"."für Ihren$nl"."Rechner!");
	case "04 26 Image-26-2.jpeg": return("NASCOMPL:$nl"."Wettervorhersage");

	case "05 01 Image-01-2.jpeg": return("Hardware:$nl"."Floppy-Controller$nl"."RAM/EPROM-Karte$nl"."MDCR-Verbesserung$nl"."Brother Elektronik 8300");
	case "05 04 Image-04-1.jpeg": return("NASCOMPL:$nl"."Computer-Treff");
	case "05 16 Image-16-1.jpeg": return("NASCOMPL:$nl"."Mißtrauische$nl"."Leser sollten$nl"."hier den$nl"."Namen und$nl"."die Adress$nl"."weglassen!!");
	case "05 21 Image-21-2.jpeg": return("NASCOMPL:$nl"."me not good$nl"."speek$nl"."XTAL BAZIK$nl"."Interbretter");

	case "06 01 Image-01-2.jpeg": return("NASCOMPL:$nl"."Preiswertes$nl"."ECB-BUS-$nl"."SYSTEM$nl"."$nl"."CP/M-kompatibel$nl"."mit NASCOM-Software");
	case "06 10 Image-10-2.jpeg": return("NASCOMPL:$nl"."Cassetten-Legasthenie");
	case "06 17 Image-17-2.jpeg": return("Fehlerbeseitigung bei der 80x24$nl"."Videokarte &ndash; ECB$nl"."$nl"."Die beiden Abschirmleitungen für$nl"."den Videotakt wurden durch die$nl"."Platinenherstellerfirma irrtümlich mit$nl"."den Durchkontaktierungen verbunden!$nl"."$nl"."Sorry, KS");
	case "06 26 Image-26-2.jpeg": return("NASCOMPL:$nl"."PARDON");

	case "07 01 Image-01-2.jpeg": return("jede Menge Software$nl"."neue ECB-Karten$nl"."$nl"."ALLES DREHT SICH UM DEN ECB-BUS$nl"."NEUE AUSSICHTEN FÜR DEN 80-BUS$nl"."$nl"."DOPPELHEFT DM 10,-");
	case "07 07 Image-07-2.jpeg": return("NASCOMPL:$nl"."Übrigens: 'gefinkelt'$nl"."ist ein schönerer$nl"."Ausdruck für$nl"."'ausgetüftelt'!");
	case "07 07 Image-07-3.jpeg": return("NASCOMPL:$nl"."Hier ''Graph+J''");
	case "07 07 Image-07-4.jpeg": return("NASCOMPL:$nl"."Leider ist es mir$nl"."nicht gelungen, in$nl"."diesen NASCOMIC$nl"."eine fortlaufende$nl"."Handlung zu bringen!");
	case "07 12 Image-12-3.jpeg": return("NASCOMPL:$nl"."ICH SOLL DIESEN$nl"."PLATZ FREIHALTEN!");
	case "07 38 Image-38-2.jpeg": return("NASCOMPL:$nl"."LIEBER ZWEISPALTIG$nl"."ALS ZWIESPÄTLIG!$nl"."(alte Programmierer-$nl"."Regel)");
	case "07 48 Image-48-3.jpeg": return("NASCOMPL:$nl"."TSCHULDIGUNG!      PARDON$nl"."Original                  Fälschung");

	case "09 01 Image-01-2.jpeg": return("FLOPPY-$nl"."Höhenflug");
	case "09 05 Image-05-1.jpeg": return("NASCOMPL:$nl"."In diesem Heft bin ich$nl"."dünn gesät. Aber es$nl"."kommen auch wieder$nl"."bessere Zeiten!");
	case "09 19 Image-19-1.jpeg": return("NASCOMPL:$nl"."Layout und$nl"."Bestückungsplan$nl"."folgen weiter$nl"."hinten!");
	case "09 26 Image-26-2.jpeg": return("NASCOMPL:$nl"."Traurige Zeiten");

	case "11 01 Image-01-2.jpeg": return("NASCOM C");
	case "11 11 Image-11-1.jpeg": return("NASCOMPL:$nl"."So ein Laufwerk$nl"."erspart viel$nl"."Beinarbeit!");
	case "11 15 Image-15-4.jpeg": return("NASCOMPL:$nl"."War wohl ein schönes$nl"."Stück Arbeit, Helmut?");
	case "11 28 Image-28-3.jpeg": return("Spruch auf einer Cassettenverpackung$nl"."an die Redaktion:$nl"."&quot;Keine Sorge!!!$nl"."Ist kein Klopapier sondern$nl"."Handtuch.&quot; &nbsp; Sehr beruhigend!");
	case "11 34 Image-34-2.jpeg": return("Zur Erklärung, warum eine$nl"."beschädigte Kassettentasche$nl"."von mir verklebt wurde, stand$nl"."darauf &quot;Hat der Hund$nl"."reingebissen.&quot; Einige Zeit$nl"."später bekam ich die gleiche$nl"."Tasche wieder zurückgeschickt$nl"."mit der Bemerkung: &quot;Hab&rsquo;$nl"."es auch versucht. Was$nl"."schmeckt ihm daran?&quot;");
	case "11 40 Image-40-1.jpeg": return("NASCOMPL:$nl"."Geschenke-Tips");
	case "11 43 Image-43-3.jpeg": return("NASCOMPL:$nl"."Keine Sorge!$nl"."Das Listing da unten$nl"."ist wirklich nur für$nl"."mich zum Sitzen$nl"."da!");

	case "12 08 Image-08-3.jpeg": return("NASCOMPL:$nl"."Phönix aus der Asche");
	case "12 26 Image-26-2.jpeg": return("NASCOMPL:$nl"."Bitte tragen Sie sich hier ein,$nl"."falls Sie irgendwelche$nl"."Programme oder Artikel in$nl"."der Schublade haben! Wir$nl"."brauchen dringend$nl"."noch neue Mitarbeiter!");
	}
	return "";
}

function imageDesc84($issue, $page, $file)
{
	global $nl;

	switch ("$issue $page $file") {
	case "m1 02 Image-02-1.jpeg": return("Günter Böhm");

	case "m1 01 Image-01-1.jpeg":
	case "m1 05 Image-03-1.jpeg":
	case "01 01 Image-01-1.jpeg":
	case "01 02 Image-02-1.jpeg":
	case "02 01 Image-01-1.jpeg":
	case "02 02 Image-02-1.jpeg":
	case "m2 01 Image-01-1.jpeg":
	case "03 01 Image-01-1.jpeg":
	case "03 02 Image-02-1.jpeg":
	case "04 01 Image-01-1.jpeg":
	case "04 02 Image-02-1.jpeg": return("80-Bus$nl"."Journal");

	case "m1 01 Image-01-2.jpeg": return("NASCOMPL:$nl"."MINI-$nl"."AUSGABE");
	case "m1 03 Image-05-1.jpeg": return("Noch ein Ausschnitt:");
	case "m1 03 Image-05-2.jpeg": return("NASCOMPL:$nl"."* wurde leider auf der Cassette gelöscht.$nl"."Wird im Doppelheft nachgeliefert!");
	case "m1 12 Image-12-1.jpeg": return("NASCOMPL:$nl"."HABEN SIE$nl"."EIGENTLICH$nl"."IHR ABO 84$nl"."SCHON$nl"."BEZAHLT??");

	case "01 01 Image-01-2.jpeg": return("Grafik-Karte");
	case "01 18 Image-18-4.jpeg": return("NASCOMPL:$nl"."Hab&rsquo; heute gar keine$nl"."rechte Lust, mich zu$nl"."zeigen!");
	case "01 26 Image-26-6.jpeg": return("NASCOMPL:$nl"."Viel Tool,$nl"."viel Mom!");
	case "01 26 Image-26-7.jpeg": return("NASCOMPL:$nl"."Mitarbeiter$nl"."dieser$nl"."Ausgabe");
	case "01 35 Image-35-2.jpeg": return("NASCOMPL:$nl"."Die Kleine kommt mir$nl"."so bekannt vor!");

	case "02 01 Image-01-2.jpeg": return("PROGRAMMIERUNG DES GDP$nl"."HARDCOPY DER GRAFIKKARTE$nl"."NEUE CPU-KARTE$nl"."NEUE ECB-KARTEN");
	case "02 06 Image-06-1.jpeg": return("NASCOMPL:$nl"."+ Sammel-BAS=$nl"."Menu für$nl"."Bandpaß, Rechner$nl"."u. Schwingkreis");
	case "02 26 Image-26-2.jpeg": return("NASCOMPL:$nl"."Ein Cola-Editor$nl"."wäre mir jetzt$nl"."auch sehr$nl"."angenehm!");
	case "02 38 Image-38-4.jpeg": return("NASCOMPL:$nl"."Von der Wiege bis$nl"."zur Bahre schreibt$nl"."der NASCOM Formulare!");
	case "02 45 Image-45-3.jpeg": return("NASCOMPL:$nl"."Der Generator$nl"."sollte$nl"."direkt$nl"."am Bus$nl"."betrieben$nl"."werden");

	case "m2 01 Image-01-2.jpeg": return("NASCOMPL:$nl"."MINI-$nl"."AUSGABE");
	case "m2 08 Image-08-1.jpeg": return("NASCOMPL:$nl"."OHNE IHRE$nl"."BEITRÄGE$nl"."LÄUFT HIER$nl"."NICHTS!!");

	case "03 01 Image-01-2.jpeg": return("NASCOMPL:$nl"."CP/M läuft!");
	case "03 04 Image-04-1.jpeg": return("Hans Rietveld.");
	case "03 15 Image-15-1.jpeg": return("NASCOMPL:$nl"."Computer-Treff$nl"."$nl"."Diesmal kein Witz!!");

	case "04 01 Image-01-2.jpeg": return("AUSGABE 4/84");
	case "04 15 Image-15-1.jpeg": return("NASCOMPL:$nl"."Unser Format$nl"."ist nach wie$nl"."vor ca. 11cm$nl"."pro Spalte$nl"."(vor der Verklei-$nl"."nerung)$nl"."Bitte beachten!");
	case "04 28 Image-28-1.jpeg": return("NASCOMPL:$nl"."Keine Angst$nl"."vor$nl"."Druckerpuffern!");
	case "04 36 Image-36-1.jpeg": return("NASCOMPL:$nl"."LAMPSON hat$nl"."nichts dagegen");
	case "04 46 Image-46-3.jpeg": return("NASCOMPL:$nl"."Nachträglich:$nl"."EIN GESUNDES$nl"."NEUES JAHR!!$nl"."Auf gute$nl"."Zusammenarbeit 1985&nbsp;!");
	}
	return "";
}

function imageDesc85($issue, $page, $file)
{
	global $nl;

	switch ("$issue $page $file") {
	case "m3 01 Image-01-1.jpeg": return("80-Bus$nl"."Journal");

	case "m3 01 Image-01-2.jpeg": return("NASCOMPL:$nl"."MINI-$nl"."AUSGABE");
	}
	return "";
}

function imageDescInmcNews($issue, $page, $file)
{
	global $nl;

	switch ("$issue $page $file") {
	case "01 00 Image-00-1.png":	return "INMC NEWS issue 1";

	case "02 00 Image-00-1.png":	return "INMC NEWS issue 2";

	case "03 00 Image-00-1.png":	return "INMC NEWS issue 3";
	case "03 01 Image-01-1.png":	return "UNFORTUNATELY";
	case "03 01 Image-01-2.png":	return "THIS COULD CONCERN YOU";

	case "04 00 Image-00-1.png":	return "INMC NEWS issue 4";
	case "04 07 Image-07-1.png":	return "NASCOM";
	case "04 10 Image-10-1.png":	return "SPECIAL OFFERS";
	case "04 18 Image-18-1.png":	return "ADD-ON GRAPHICS REVIEW";
	case "04 21 Image-21-1.png":	return "NAS-SYS ONE: a brief Glimpse";
	case "04 30 Image-30-1.png":	return "Lawrence";

	case "05 00 Image-00-1.png":	return "INMC NEWS issue 5";

	case "06 00 Image-00-1.png":	return "INMC NEWS issue 6";
	case "06 01 Image-01-1.png":	return "n m";
	case "06 01 Image-01-2.png":	return "news release";
	case "06 02 Image-02-1.png":	return "NASPEN";
	case "06 15 Image-15-1.png":	return "BOOBS";
	case "06 17 Image-17-1.png":	return "Memory maps";
	case "06 23 Image-23-1.png":	return "Program hints";

	case "07 00 Image-00-1.png":	return "INMC NEWS issue 7";
	case "07 01 Image-01-1.png":	return "D. R. Hunt";
	case "07 11 Image-11-1.png":	return "Impact Matrix Printer";
	case "07 33 Image-33-1.png":	return "Book Review";
	case "07 35 Image-35-1.png":	return "Library";
	case "07 38 Image-38-1.png":	return "NASCOM";
	case "07 38 Image-38-2.png":	return "I/O BOARD";
	case "07 38 Image-38-3.png":	return "BOARD";
	case "07 38 Image-38-4.png":	return "PIO";
	case "07 38 Image-38-5.png":	return "CTC";
	case "07 38 Image-38-6.png":	return "UART";
	case "07 38 Image-38-7.png":	return "NASCOM EXPANDS";
	case "07 38 Image-38-8.png":	return "NM";
	}
	return "";
}

function imageDescInmc80News($issue, $page, $file)
{
	global $nl;

	switch ("$issue $page $file") {
	case "01 01 Image-01-1.png":	return "INMC 80 NEWS Issue: 1";
	case "01 03 Image-03-1.png":	return "Dave Hunt";
	case "01 36 Image-36-2.png":	return "WHAT ?";
	case "01 43 Image-43-2.png":	return "interface software";
	case "01 46 Image-46-1.png":	return "WARNING~8A";
	case "01 16 Image-16-3.png":	return "DOTS";
	case "01 18 Image-18-1.png":	return "HEX~&gt;?";
	case "01 19 Image-19-1.png":	return "Z80 made simple";
	case "01 30 Image-30-1.png":	return "4MHZ";
	case "01 31 Image-31-1.png":	return "PASCAL Notes";
	case "01 32 Image-32-1.png":	return "Z80 Books";
	case "01 34 Image-34-2.png":	return "Doctor Dark&rsquo;s Diary";
	case "01 36 Image-36-2.png":	return "WHAT ?";
	case "01 42 Image-42-2.png":	return "BASIC";
	case "01 43 Image-43-2.png":	return "interface software";
	case "01 46 Image-46-1.png":	return "WARNING~8A";

	case "02 01 Image-01-1.png":	return "INMC 80 NEWS Issue: 2";
	case "02 17 Image-17-1.png":	return "Doctor Dark&rsquo;s Diary";
	case "02 34 Image-34-2.png":	return "BASIC";
	case "02 45 Image-45-1.png":	return "IMPERSONAL";
	case "02 46 Image-46-1.png":	return "Z80 Books";
	case "02 53 Image-53-1.png":	return "interface components";
	case "02 54 Image-54-2.png":	return "JOIN US HERE";

	case "03 01 Image-01-1.png":	return "INMC 80 NEWS Issue: 3";
	case "03 16 Image-16-1.png":	return "32K&rarr;48K Expansion";
	case "03 20 Image-20-1.png":	return "Doctor Dark&rsquo;s Diary";
	case "03 30 Image-30-2.png":	return "IMPERSONAL";
	case "03 32 Image-32-1.png":	return "Z80 made simple";
	case "03 39 Image-39-1.png":	return "Printers";

	case "04 01 Image-01-1.png":	return "INMC 80 NEWS Issue: 4";
	case "04 17 Image-17-1.png":	return "INMC80";
	case "04 18 Image-18-1.png":	return "PASCAL";
	case "04 24 Image-24-1.png":	return "NEWBUS";
	case "04 31 Image-31-1.png":	return "Basic";
	case "04 33 Image-33-1.png":	return "Dr. D&rsquo;s Diary";
	case "04 41 Image-41-1.png":	return "1.5 Mbaud";
	case "04 45 Image-45-1.png":	return "Z80 Guide";
	case "04 52 Image-52-1.png":	return "VIDEO";
	case "04 54 Image-54-1.png":	return "Sound &amp; Music";
	case "04 55 Image-55-1.png":	return "Add ons";
	case "04 58 Image-58-1.png":	return "IMPRINT";
	case "04 60 Image-60-1.png":	return "Game Idea";
	case "04 61 Image-61-1.png":	return "Z80 Ops";
	case "04 64 Image-64-1.png":	return "Strings";
	case "04 68 Image-68-2.png":	return "IMPERSONAL";

	case "05 01 Image-01-1.png":	return "INMC 80 NEWS Issue: 5";
	case "05 02 Image-02-1.png":	return "The&lsquo;DH&rsquo;Show";
	case "05 07 Image-07-1.png":	return "LETTERS";
	case "05 18 Image-18-1.png":	return "CAT";
	case "05 19 Image-19-1.png":	return "N1 Graphics";
	case "05 22 Image-22-1.png":	return "Sound Board";
	case "05 25 Image-25-1.png":	return "sound";
	case "05 30 Image-30-1.png":	return "N2 Keyboard";
	case "05 32 Image-32-1.png":	return "2K&rsquo;s on an N2";
	case "05 36 Image-36-1.png":	return "SUBS";
	case "05 34 Image-34-1.png":	return "Disk Review";
	case "05 37 Image-37-1.png":	return "Disks &amp; CP/M";
	case "05 40 Image-40-1.png":	return "SPEECH";
	case "05 41 Image-41-1.png":	return "EPROM PROG.";
	case "05 42 Image-42-1.png":	return "Z80 Guide";
	case "05 50 Image-50-1.png":	return "BLS PASCAL";
	case "05 53 Image-53-1.png":	return "SYS";
	case "05 55 Image-55-1.png":	return "PRINT Routine";
	case "05 58 Image-58-1.png":	return "Book";
	case "05 59 Image-59-1.png":	return "VIDEO ROUTINE";
	case "05 62 Image-62-2.png":	return "Multi-load";
	case "05 63 Image-63-1.png":	return "G&egrave;t s&ouml;m&egrave; &Scirc;TYL&Egrave;&nbsp;!";
	case "05 66 Image-66-1.png":	return "Misc.";
	}
	return "";
}

function imageDesc80BusNews($issue, $page, $file)
{
	global $nl;

	switch ("$issue $page $file") {
	case "11 01 Image-01-1.png":	return "80-Bus News";
	case "11 02 Image-02-1.png":	return "80-BUS NEWS";
	case "11 04 Image-04-1.png":	return "Dear Ed.";
	case "11 08 Image-08-1.png":	return "N2 VIDEO";
	case "11 09 Image-09-1.png":	return "DOS";
	case "11 11 Image-11-1.png":	return "GROUPS";
	case "11 12 Image-12-1.png":	return "64K";
	case "11 13 Image-13-1.png":	return "The Dr.";
	case "11 17 Image-17-1.png":	return "RTC Board";
	case "11 25 Image-25-1.png":	return "CP/M";
	case "11 33 Image-33-1.png":	return "books";
	case "11 35 Image-35-1.png":	return "Disks";
	case "11 39 Image-39-1.png":	return "CB";
	case "11 42 Image-42-1.png":	return "Multi-Map";
	case "11 47 Image-47-1.png":	return "N1 Graphics";
	case "11 48 Image-48-1.png":	return "Really ??";
	case "11 49 Image-49-1.png":	return "N2 program";

	case "12 01 Image-01-1.png":	return "80-Bus News";
	case "12 02 Image-02-1.png":	return "80-BUS NEWS";

	case "13 01 Image-01-1.png":	return "80-Bus News";
	case "13 02 Image-02-1.png":	return "80-BUS NEWS";

	case "14 01 Image-01-1.png":	return "80-Bus News";
	case "14 02 Image-02-1.png":	return "80-BUS NEWS";

	case "21 01 Image-01-1.png":	return "80-Bus News";
	case "21 02 Image-02-1.png":	return "80-BUS NEWS";

	case "22 01 Image-01-1.png":	return "80-Bus News";
	case "22 02 Image-02-1.png":	return "80-BUS NEWS";

	case "23 01 Image-01-1.png":	return "80-Bus News";
	case "23 02 Image-02-1.png":	return "80-BUS NEWS";

	case "24 01 Image-01-1.png":	return "80-Bus News";
	case "24 02 Image-02-1.png":	return "80-BUS NEWS";

	case "25 01 Image-01-1.png":	return "80-Bus News";
	case "25 02 Image-02-1.png":	return "80-BUS NEWS";

	case "26 01 Image-01-1.png":	return "80-Bus News";
	case "26 02 Image-02-1.png":	return "80-BUS NEWS";

	case "31 01 Image-01-1.png":	return "80-Bus News";
	case "31 02 Image-02-1.png":	return "80-BUS NEWS";

	case "32 01 Image-01-1.png":	return "80-Bus News";
	case "32 02 Image-02-1.png":	return "80-BUS NEWS";

	case "33 01 Image-01-1.png":	return "80-Bus News";
	case "33 02 Image-02-1.png":	return "80-BUS NEWS";

	case "34 01 Image-01-1.png":	return "80-Bus News";
	case "34 02 Image-02-1.png":	return "80-BUS NEWS";

	case "35 01 Image-01-1.png":	return "80-Bus News";
	case "35 02 Image-02-1.png":	return "80-BUS NEWS";

	case "36 01 Image-01-1.png":	return "80-Bus News";
	case "36 02 Image-02-1.png":	return "80-BUS NEWS";

	case "41 01 Image-01-1.png":	return "80-Bus News";
	case "41 02 Image-02-1.png":	return "80-BUS NEWS";

	case "42 01 Image-01-1.png":	return "80-Bus News";
	case "42 02 Image-02-1.png":	return "80-BUS NEWS";
	}
	return "";
}

function imageDescScorpioNews($issue, $page, $file)
{
	global $nl;

	switch ("$issue $page $file") {
	case "11 01 Image-01-1.png":
	case "12 01 Image-01-1.png":
	case "13 01 Image-01-1.png":
	case "14 01 Image-01-1.png":
	case "21 01 Image-01-1.png":
	case "22 01 Image-01-1.png":
	case "23 01 Image-01-1.png":
	case "24 01 Image-01-1.png":
	case "31 01 Image-01-1.png":	return "Scorpio News";
	}
	return "";
}

function imageDescMicropower($issue, $page, $file)
{
	global $nl;

	switch ("$issue $page $file") {
	case "11 -1 Image--1-1.png":
	case "12 -1 Image--1-1.png":
	case "13 -1 Image--1-1.png":
	case "14 -1 Image--1-1.png":
	case "21 -1 Image--1-1.png":
	case "22 -1 Image--1-1.png":
	case "23 -1 Image--1-1.png":
	case "24 -1 Image--1-1.png":	return "&micro;P";

	case "11 -1 Image--1-2.png":	return "NASA";
	case "21 -1 Image--1-2.png":	return "Moon Raider";
	}
	return "";
}

function imageDescNascomNewsletter($issue, $page, $file)
{
	global $nl;

	switch ("$issue $page $file") {
	case "25 -1 Image--1-1.png":	return "Nascom means performance$nl"."Nascom means solutions";
	case "26 -1 Image--1-1.png":	return "Nascom Newsletter$nl"."Volume 2 Number 6";
	case "31 -1 Image--1-1.png":	return "Nascom Newsletter$nl"."Volume 3 Number 1$nl"."April 1983$nl$nl"."The Nascom Network has been up and running since last summer";
	case "32 00 Image-00-1.png":	return "Nascom Newsletter$nl"."Volume 3 Number 2$nl"."May 1983";
	case "33 -1 Image--1-1.png":	return "Nascom Newsletter$nl"."Volume 3 Number 3$nl"."May 1983";
	case "34 -1 Image--1-1.png":	return "Nascom Newsletter$nl"."Volume 3 Number 4$nl"."December 1983";
	case "35 -1 Image--1-1.png":	return "Nascom Newsletter$nl"."Volume 3 Numbers 5 &amp; 6$nl"."June 1984";
	}
	return "";
}

function imageDesc($year, $issue, $page, $file)
{
	global $nl;
//	echo    "$year $issue $page $file";

	switch ($year) {
	case "80":					return imageDesc80($issue, $page, $file);
	case "81":					return imageDesc81($issue, $page, $file);
	case "82":					return imageDesc82($issue, $page, $file);
	case "83":					return imageDesc83($issue, $page, $file);
	case "84":					return imageDesc84($issue, $page, $file);
	case "85":					return imageDesc85($issue, $page, $file);
	case "inmc-news":			return imageDescInmcNews($issue, $page, $file);
	case "inmc-80-news":		return imageDescInmc80News($issue, $page, $file);
	case "80-bus-news":			return imageDesc80BusNews($issue, $page, $file);
	case "scorpio-news":		return imageDescScorpioNews($issue, $page, $file);
	case "micropower":			return imageDescMicropower($issue, $page, $file);
	case "nascom-newsletter":	return imageDescNascomNewsletter($issue, $page, $file);
	}

	switch ("$year $issue $page $file") {
	case "INMC News  1 ./logo.jpeg":
	case "INMC 80 News  1 ./logo.jpeg":
	case "Nascom Newsletter  1 ./logo.jpeg":
	case "80-Bus News  1 ./logo.jpeg":
	case "Scorpio News  1 ./logo.jpeg":			return($year);
	case "Micropower  1 ./logo.jpeg":			return("&micro;P $year");
	}

//	return("$year $issue $page $file");
	return("");
}

function externalLink($link, $text="", $delimiter="\n", $title="")
{
	$newText = "";
	$url = "";
	switch ($link) {
	case "&micro;PD7220":			$url = "https://www.datasheetarchive.com/upd7220-datasheet.html";				break;
	case "&micro;PD765":			$url = "http://dunfield.classiccmp.org/r/765.pdf";								break;
	case "2114":					$url = "https://de.wikipedia.org/wiki/2114";									break;
	case "2708":					$url = "http://www.jrok.com/datasheet/TMS2708.pdf";								break;
	case "2716":					$url = "http://ee-classes.usc.edu/ee459/library/datasheets/2716.pdf";			break;
	case "2732":					$url = "https://www.ndr-nkc.de/download/datenbl/2732.pdf";						break;
	case "2732A":					$url = "https://www.retro-kit.co.uk/user/custom/Acorn/3rdParty/VELA/datasheets/2732A-datasheet.pdf";	break;
	case "2764":					$url = "http://dfs.uib.es/GTE/staff/jfont/InstrETT/M2764a.pdf";					break;
	case "2N3819":					$url = "https://www.onsemi.com/pub/Collateral/2N3819-D.PDF";					break;
	case "4116":					$url = "https://console5.com/techwiki/images/8/85/MK4116.pdf";					break;
	case "4164":					$url = "https://www.mikrocontroller.net/attachment/4092/HYB4164.pdf";			break;
	case "6116":					$url = "https://www.ecse.rpi.edu/courses/CStudio/data%20sheets/hm6116.pdf";		break;
	case "6502":					$url = "https://de.wikipedia.org/wiki/MOS_Technology_6502";						break;
	case "8080":					$url = "https://de.wikipedia.org/wiki/Intel_8080";								break;
	case "8085":					$url = "https://de.wikipedia.org/wiki/Intel_8085";								break;
	case "A simple technique for static relocation of absolute machine code":	$url = "https://groups.google.com/forum/?hl=de&amp;fromgroups=#!topic/comp.os.cpm/TLHgIi16yTo";	break;
	case "A.F.T. Winfield":			$url = "https://openlibrary.org/authors/OL1347836A/A._F._T._Winfield";			break;
	case "AD7581":					$url = "https://www.analog.com/media/en/technical-documentation/data-sheets/AD7581.pdf";	break;
	case "Algorithmen und Datenstrukturen":	$url = "https://www.springer.com/us/book/9783519222507";				break;
	case "Alphatronic PC":			$url = "https://de.wikipedia.org/wiki/Triumph_Adler_Alphatronic_PC";			break;
	case "Apple II":				$url = "https://de.wikipedia.org/wiki/Apple_II";								break;
	case "AUDIT 5":					$url = "https://www.old-computers.com/museum/computer.asp?c=1305&st=1";			break;
	case "AY-3-8910":				$url = "https://de.wikipedia.org/wiki/AY-3-8910";								break;
	case "BASF 6106":				$url = "https://www.flickr.com/photos/68824983@N00/3983868076/";				break;
	case "BASF 6138":				$url = "http://textfiles.com/bitsavers/pdf/basf/80307-058_BASF_6138_Mini_Disk_Apr83.pdf";	break;
	case "BASIC COMPUTER GAMES":	$url = "https://www.atariarchives.org/basicgames/showpage.php?page=107";		break;
	case "Basic-Interpreter":		$url = "https://openlibrary.org/works/OL15388892W/Basic-Interpreter";			break;
	case "Blue Label Software Pascal":	$url = "https://community.embarcadero.com/blogs/entry/blue-label-software-pascal-andgt-compas-pascal-andgt-poly-pascal-andgt-turbo-pascal-v10-38933";				break;
	case "c&rsquo;t":				$url = "https://ct.de/";														break;
	case "c&rsquo;t 2/1985":		$url = "https://www.kultboy.com/index.php?site=kult/kultmags&km=show&id=13276";	break;
	case "c&rsquo;t 3/1985":		$url = "https://www.kultboy.com/index.php?site=kult/kultmags&km=show&id=13277";	break;
	case "c&rsquo;t 9/1986":		$url = "https://www.kultboy.com/index.php?site=kult/kultmags&km=show&id=12403";	break;
	case "c&rsquo;t 4/1987":		$url = "https://www.kultboy.com/index.php?site=kult/kultmags&km=show&id=12410";	break;
	case "Car_race.nas":			$url = "http://www.nascomhomepage.com/games/Car_race.nas";						break;
	case "Chip":					$url = "https://www.chip.de/";													break;
	case "Circle Generators for Display Devices":	$url = "http://people.csail.mit.edu/bkph/papers/Circle_Generators_OPT.pdf";	break;
	case "CNY17-2":					$url = "http://skory.z-net.hu/alkatresz/CNY17%20-1-4.pdf";						break;
	case "Compression ASM":			$url = "http://www.nascomhomepage.com/pdf/compass.pdf";							break;
	case "Computer Gesellschaft Konstanz":	$url = "https://de.wikipedia.org/wiki/Computer_Gesellschaft_Konstanz";	break;
	case "Computermonitor":			$url = "https://de.wikipedia.org/wiki/Computermonitor";							break;
	case "Computermuseum Burgrieden":	$url = "http://kath-rottal.homeunix.org/Computermuseum/Lehrsysteme/Kontron%20Z%2080%20Kit/index.html";	break;
	case "Harzretro":				$url = "http://www.computersammler.de/sammlung/einplatinen-und-lerncomputer/kontron-z80-kit/";	break;
	case "c&rsquo;t Text-Terminal":	$url = "https://www.hanshehl.de/test-ndr/mc1.htm#b3";									break;
	case "CP/M":					$url = "https://de.wikipedia.org/wiki/CP/M";									break;
	case "CP/M Plus":				$url = "https://de.wikipedia.org/wiki/CP/M#CP/M-Plus";							break;
	case "CQ-DL":					$url = "https://www.darc.de/nachrichten/amateurfunkmagazin-cq-dl";				break;
//	case "Crystal BASIC":			$url = "http://homepage.ntlworld.com/rob.xanth/nascom/documents/m50.pdf";		break;
	case "David L. Heiserman":		$url = "https://openlibrary.org/authors/OL766144A/Heiserman_David_L.";			break;
	case "dBASE II":				$url = "https://de.wikipedia.org/wiki/DBASE#dBASE_II";							break;
	case "DEC VT180":				$url = "https://de.wikipedia.org/wiki/VT180";									break;
	case "ECB 85":					$url = "http://www.hknebel.org/Museum/Tragbare_PCs/Vorlaufer/ECB_85/ecb_85.htm";	break;
	case "ECB":						$url = "https://de.wikipedia.org/wiki/Europe_Card_Bus";	$newText = "Einfach-Europaformat-Computer-Baugruppe";	break;
	case "SANYO DM8112CX":			$url = "https://www.flickr.com/photos/23826245@N00/2259904187";					break;
	case "EF9366":					$url = "https://www.datasheetarchive.com/ef9366-datasheet.html";				break;
	case "Einplatinencomputer":		$url = "https://de.wikipedia.org/wiki/Einplatinencomputer";						break;
	case "Elektor":					$url = "https://www.elektor.de/";												break;
	case "Elektronik":				$url = "https://www.weka-fachmedien.de/de/medien/elektronik/elektronik/";		break;
	case "Elektronikladen":			$url = "https://elmicro.com/info/";												break;
	case "ELZET80":					$url = "https://www.elzet80.de/";												break;
	case "EMUF":					$url = "https://de.wikipedia.org/wiki/EMUF";									break;
	case "Epson MX-80F/T":			$url = "https://de.wikipedia.org/wiki/Datei:EpsonMX80FT_02_mod02_res.jpg";		break;
	case "Fädeltechnik":			$url = "https://de.wikipedia.org/wiki/F%C3%A4deltechnik";						break;
	case "Fachhochschule Köln":		$url = "https://www.th-koeln.de/";												break;
	case "FDC9229":					$url = "http://www.cpcwiki.eu/imgs/9/97/FDC9229BT_Datasheet.pdf";				break;
	case "Fernmeldeamt":			$url = "https://de.wikipedia.org/wiki/Fernmeldeamt_(Deutsche_Bundespost)";		break;
	case "Fernmeldehandwerker":		$url = "https://de.wikipedia.org/wiki/Fernmeldehandwerker";						break;
	case "Fernsehtechnik ohne Ballast":	$url = "https://www.amazon.de/Fernsehtechnik-ohne-Ballast-Otto-Limann/dp/3772357245";	break;
	case "FidoNet":					$url = "https://fido.de/";														break;
	case "Filter.cas":				$url = "http://www.nascomhomepage.com/mbasic/Filter.cas";						break;
	case "FORTH for Microcomputers":$url = "https://dl.acm.org/citation.cfm?id=987508.987510";						break;
	case "Funkschau":				$url = "https://www.funkschau.de/";												break;
	case "Gary A. Kildall":			$url = "http://www.digitalresearch.biz/Gary.Kildall.htm";						break;
	case "Google über Nascom":		$url = "https://www.google.de/search?q=nascom+computer";						break;
	case "Greg":					$url = "http://www.lemis.com/grog/Albums/Computers/Kontron-kit.php";			break;
	case "Gummersbach":				$url = "https://www.f10.th-koeln.de/";											break;
	case "HiSOFT":					$url = "https://hisoft.co.uk/gp/about-hisoft/1/pgid/4/";						break;
	case "HM7611":					$url = "http://www.retrotechnology.com/restore/hm7602.pdf";						break;
	case "HOCO Floppy Controller":	$url = "https://forum.classic-computing.de/forum/index.php?thread/11561-hoco-floppy-controller/";	break;
	case "HTML":					$url = "https://de.selfhtml.org/";												break;
	case "i8255":					$url = "https://de.wikipedia.org/wiki/Intel_8255";								break;
	case "IBM 3740":				$url = "https://www.ibm.com/ibm/history/exhibits/rochester/rochester_4016.html";	break;
	case "IBM 3270":				$url = "https://de.wikipedia.org/wiki/IBM_3270";								break;
	case "IBM System/34":			$url = "https://www.ibm.com/ibm/history/exhibits/vintage/vintage_4506VV2236.html";	break;
	case "ICL7106":					$url = "https://www.renesas.com/eu/en/document/dst/icl7106-icl7107-icl7107s-datasheet";	break;
	case "Indische Finsternis":		$url = "http://www.sonnenfinsternis.org/sofi1980t/index.htm";					break;
	case "INMC News":				$url = "https://tupel.jloh.de/nascom/magazines/inmc-news/";						break;
	case "INMC News 3, page 24":	$url = "https://tupel.jloh.de/nascom/magazines/inmc-news/03/24/text/#article1";	break;
	case "INMC News 5, page 29":	$url = "https://tupel.jloh.de/nascom/magazines/inmc-news/05/29/text/#article1";	break;
	case "INMC News 6, page 33":	$url = "https://tupel.jloh.de/nascom/magazines/inmc-news/06/33/text/#article1";	break;
	case "INMC News 7":				$url = "https://tupel.jloh.de/nascom/magazines/inmc-news/07/";					break;
	case "INMC News 7, page 18":	$url = "https://tupel.jloh.de/nascom/magazines/inmc-news/07/18/text/#article1";	break;
	case "INMC 80 News":			$url = "https://tupel.jloh.de/nascom/magazines/inmc-80-news/";					break;
	case "INMC 80 News 1, page 15":	$url = "https://tupel.jloh.de/nascom/magazines/inmc-80-news/01/15/text/#article1";	break;
	case "INMC 80 News 5, page 50":	$url = "https://tupel.jloh.de/nascom/magazines/inmc-80-news/05/50/text/#article1";	break;
	case "80-Bus News":				$url = "https://tupel.jloh.de/nascom/magazines/80-bus-news/";					break;
	case "INVASION.NAS":			$url = "http://www.nascomhomepage.com/games/INVASION.NAS";						break;
	case "ITOH 8510":				$url = "https://www.atarimagazines.com/v4n10/citoh8510sep+.jpg";				break;
//	case "Jürgen Loh Computertechnik":	$url = "http://www.jlct.de/";												break;
	case "Jürgen Loh":				$url = "https://www.jloh.de/";													break;
	case "Janich &amp; Klass":		$url = "http://www.janichklass.com/";											break;
	case "Jonny":					$url = "http://www.robotrontechnik.de/html/forum/thwb/showtopic.php?threadid=13028";	break;
	case "JRT-Pascal":				$url = "https://en.wikipedia.org/wiki/JRT_(programming_language)";				break;
	case "Karlheinz":				$url = "https://www.o49-werl.de/component/contact/contact/12-kontakte/12?Itemid=301";	break;
	case "Kilobaud Microcomputing Magazine (February 1981)":	$url =  "https://archive.org/details/kilobaudmagazine-1981-02";	break;
	case "Kilobaud Microcomputing Magazine (March 1981)":		$url =  "https://archive.org/details/kilobaudmagazine-1981-03";	break;
	case "Kommentar von Dieter Werner auf mikrocontroller.net":	$url = "https://www.mikrocontroller.net/topic/55718#433032";	break;
	case "Kontron":					$url = "https://www.kontron.de/";												break;
	case "Kornkraft Genossenschaft":$url = "http://www.bio-region-niederrhein.com/bioregion-ueberuns.php";			break;
	case "Ldgold.cas":				$url = "http://www.nascomhomepage.com/mbasic/Ldgold.cas";						break;
	case "Lichtgriffel":			$url = "https://de.wikipedia.org/wiki/Lichtgriffel";							break;
	case "LilBeans":				$url = "http://www.21d.de/LilBeans/";											break;
	case "LM324":					$url = "https://www.ti.com/lit/ds/symlink/lm124-n.pdf";							break;
	case "LM741":					$url = "https://www.ti.com/lit/ds/symlink/lm741.pdf";							break;
	case "LO 15":					$url = "http://www.fernmeldemuseum-bremen.de/erklaerungen_fernschreiber.htm";	break;
	case "Lolly.nas":				$url = "http://www.nascomhomepage.com/games/Lolly.nas";							break;
	case "Mailbox":					$url = "https://de.wikipedia.org/wiki/Mailbox_%28Computer%29";					break;
	case "maloche.cas":				$url = "http://www.nascomhomepage.com/mbasic/maloche.cas";						break;
	case "Mamallapuram":			$url = "https://de.wikipedia.org/wiki/Mamallapuram";							break;
	case "Maxell MD2-HD":			$url = "https://www.flickr.com/photos/celesteh/19477993894";					break;
	case "MB8877A":					$url = "https://archive.org/details/MB8866Datasheet";							break;
	case "mc";						$url = "https://de.wikipedia.org/wiki/Mc_%28Zeitschrift%29";					break;
	case "mc 9/1984, Seite 86":		$url = "https://hschuetz.selfhost.eu/mc-zeitschriften/1984/mc-1984-09.pdf#page=86";		break;
	case "mc 10/1984, Seite 61":	$url = "https://hschuetz.selfhost.eu/mc-zeitschriften/1984/mc-1984-10.pdf#page=61";		break;
	case "mc 11/1984, Seite 84":	$url = "https://hschuetz.selfhost.eu/mc-zeitschriften/1984/mc-1984-11.pdf#page=84";		break;
	case "mc 12/1984, Seite 81":	$url = "https://hschuetz.selfhost.eu/mc-zeitschriften/1984/mc-1984-12.pdf#page=81";		break;
	case "mc 2/1985, Seite 102":	$url = "https://hschuetz.selfhost.eu/mc-zeitschriften/1985/mc-1985-02.pdf#page=102";	break;
	case "mc 1/1987":				$url = "https://www.kultboy.com/index.php?site=kult/kultmags&km=show&id=9523";	break;
	case "mc 2/1987":				$url = "https://www.kultboy.com/index.php?site=kult/kultmags&km=show&id=12541";	break;
	case "mc 3/1987":				$url = "https://www.kultboy.com/index.php?site=kult/kultmags&km=show&id=12542";	break;
	case "mc-CP/M":					$url = "http://www.auram.de/cms3/pages/computer/mc-cpm.php";					break;
	case "MC6845":					$url = "http://pdf.datasheetcatalog.com/datasheet/motorola/MC6845.pdf";			break;
	case "MDCR-Manual":				$url = "http://www.nascomhomepage.com/pdf/mdcr.pdf";							break;
	case "Merseyside Nascom Users Group":	$url = "http://www.nascomhomepage.com/pdf/nasproginfo.pdf";				break;
	case "Michael Klein":			$url = "http://web.archive.org/web/20131024195335/http://networks.de/index.php?option=com_content&amp;view=article&amp;id=12&amp;Itemid=62";	break;
	case "Micropower":				$url = "https://tupel.jloh.de/nascom/magazines/micropower/";					break;
	case "Microshell":				$url = "https://www.autometer.de/unix4fun/z80pack/ftp/manuals/Software/microshell.pdf";	break;
	case "Mike Strange":			$url = "https://www.yourtotalevent.com/";										break;
	case "Mikrocomputer Hard- und Softwarepraxis":	$url = "https://openlibrary.org/works/OL15388891W/Mikrocomputer_Hard-_und_Softwarepraxis";	break;
	case "MK Systemtechnik":		$url = "http://web.archive.org/web/20131024180436/http://networks.de/index.php?option=com_content&amp;view=article&amp;id=13&amp;Itemid=60";	break;
	case "MK50816":					$url = "https://www.datasheetarchive.com/MK50816-datasheet.html";				break;
	case "Monitor":					$url = "https://de.wikipedia.org/wiki/Maschinencode-Monitor";					break;
	case "MS-DOS":					$url = "https://de.wikipedia.org/wiki/MS-DOS";									break;
	case "Nascom / Gemini / 80 Bus (Mirror)":	$url = "https://80bus.co.uk.mirror.jloh.de/";						break;
//	case "Nascom / Gemini / 80 Bus":	$url = "http://www.80bus.co.uk/";											break;
	case "Nascom 1":				$url = "https://tupel.jloh.de/nascom/1/";										break;
	case "Nascom Basic Book 1":		$url = "http://www.nascomhomepage.com/pdf/Nascom%20Basic%20Book%201.PDF";		break;
	case "Nascom Computers User Group":	$url = "https://groups.io/g/Nascom-Computers";								break;
	case "Nascom Home Page (Mirror)":	$url = "https://nascomhomepage.com.mirror.jloh.de/";						break;
	case "Nascom Home Page":		$url = "http://www.nascomhomepage.com/";										break;
	case "ntz":						$url = "https://www.fachzeitungen.de/zeitschrift-magazin-ntz-informations-und-kommunikationstechnik";	break;
	case "OASIS":					$url = "https://en.wikipedia.org/wiki/OASIS_operating_system";					break;
	case "OCR":						$url = "https://de.wikipedia.org/wiki/Texterkennung";							break;
	case "Optical character recognition":	$url = "https://en.wikipedia.org/wiki/Optical_character_recognition";	break;
	case "OMTI 5510":				$url = "https://www.equipmatching.com/used_equipment/4/64/336229.php";			break;
	case "Osborne 1":				$url = "https://de.wikipedia.org/wiki/Osborne_1";								break;
	case "OTHELLO.NAS":				$url = "http://www.nascomhomepage.com/games/OTHELLO.NAS";						break;
	case "Pascal MicroEngine":		$url = "https://en.wikipedia.org/wiki/Pascal_MicroEngine";						break;
	case "Pascal/MT+":				$url = "https://en.wikipedia.org/wiki/Pascal/MT%2B";							break;
	case "PICO Computer":			$url = "https://tupel.jloh.de/pico/";											break;
	case "Pilot":					$url = "https://de.wikipedia.org/wiki/PILOT";									break;
	case "Piranha.nas":				$url = "http://www.nascomhomepage.com/games/Piranha.nas";						break;
	case "Programmierung des Z80":	$url = "http://www.z80.info/zaks.html";											break;
	case "R. Loeliger":				$url = "https://openlibrary.org/authors/OL1655329A/R._G._Loeliger";				break;
	case "ROBOT INTELLIGENCE with experiments":	$url = "https://openlibrary.org/works/OL4090255W/Robot_intelligence_..._with_experiments";	break;
	case "Rolf":					$url = "http://rolf-becker.de/Lehrcomputer.html";								break;
	case "Rolf-Dieter Klein":		$url = "https://openlibrary.org/authors/OL1221691A/Rolf-Dieter_Klein";			break;
	case "RPB Taschenbuch 154":		$url = "http://sites.prenninger.com/elektronik/home/buecher";					break;
	case "Sahara-Finsternis":		$url = "http://www.sonnenfinsternis.org/sofi1973t/index.htm";					break;
	case "Scientific American, Issue 223":	$url = "http://ddi.cs.uni-potsdam.de/HyFISCH/Produzieren/lis_projekt/proj_gamelife/ConwayScientificAmerican.htm";	break;
	case "Seagate ST-251":			$url = "http://www.computerasylum.co.uk/storages/st251/index.html";				break;
	case "SENSO":					$url = "https://de.wikipedia.org/wiki/Senso_%28Spiel%29";						break;
	case "Spaceii.nas":				$url = "http://www.nascomhomepage.com/games/Spaceii.nas";						break;
	case "Startrek.cas":			$url = "http://www.nascomhomepage.com/mbasic/Startrek.cas";						break;
	case "Sternwarte Wien":			$url = "https://www.vhs.at/de/e/planetarium";									break;
	case "Suberbrain":				$url = "https://de.wikipedia.org/wiki/Intertec_Superbrain";						break;
	case "Swinghs.cas":				$url = "http://www.nascomhomepage.com/mbasic/Swinghs.cas";						break;
	case "Swords.cas":				$url = "http://www.nascomhomepage.com/mbasic/Swords.cas";						break;
	case "TANDY Lineprinter VI":	$url = "https://colorcomputerarchive.com/repo/Documents/Manuals/Hardware/Line%20Printer%20IV%20(Tandy).pdf";	break;
	case "TANDY Lineprinter VIII":	$url = "http://dunfield.classiccmp.org/printer/h/lpviii.jpg";					break;
	case "Technics RS-M250":		$url = "https://www.radiomuseum.org/r/technics_stereo_cassette_deck_rs_m_25.html";	break;
	case "Technics":				$url = "https://de.wikipedia.org/wiki/Technics";								break;
	case "Technische Informatik":	$url = "https://www.th-koeln.de/studium/technische-informatik-bachelor-campus-gummersbach_3502.php";	break;
	case "TECO":					$url = "https://de.wikipedia.org/wiki/TECO_%28Texteditor%29";					break;
	case "Tektronix 4051":			$url = "https://en.wikipedia.org/wiki/Tektronix_405x";							break;
	case "Telekom":					$url = "https://www.telekom.de/start";											break;
	case "Terminal":				$url = "https://de.wikipedia.org/wiki/Terminal_(Computer)";						break;
	case "Texas Instruments":		$url = "https://www.ti.com";													break;
	case "Tforth.nas":				$url = "http://www.nascomhomepage.com/lang/Tforth.nas";							break;
	case "The complete FORTH":		$url = "https://openlibrary.org/works/OL5598529W/The_complete_FORTH";			break;
	case "THREADED INTERPRETIVE LANGUAGES":	$url = "https://openlibrary.org/works/OL6331362W/Threaded_interpretive_languages";	break;
	case "Tietokonemuseo":			$url = "http://www.tietokonemuseo.net/muuta-mielenkiintoista-2/kontron-zilog-z80-kit-antti-isannainen/";	break;
	case "TL497":					$url = "http://pdf.datasheetcatalog.com/datasheets/150/316215_DS.pdf";			break;
	case "TMS 5100":				$url = "https://www.datasheetarchive.com/tms5100-datasheet.html";				break;
	case "TMS9929":					$url = "https://www.datasheetarchive.com/TMS9929-datasheet.html";				break;
	case "Triumph-Adler P4":		$url = "https://www.old-computers.com/museum/computer.asp?c=485&st=1";			break;
	case "TRS80 Model III":			$url = "https://en.wikipedia.org/wiki/TRS-80#Model_III";						break;
	case "UCSD Pascal":				$url = "https://de.wikipedia.org/wiki/UCSD_Pascal";								break;
	case "Volkshochschule":			$url = "https://www.volkshochschule.de/";										break;
	case "Video Genie":				$url = "https://en.wikipedia.org/wiki/Video_Genie";								break;
	case "Vobis":					$url = "https://de.wikipedia.org/wiki/Vobis#Geschichte";						break;
	case "Vom Umgang mit CP/M":		$url = "http://myoldmac.net/Sellpicts/books/APPLE-CPM-umgang--B-Pol.jpg";		break;
	case "Vorschaubild":			$url = "https://de.wikipedia.org/wiki/Vorschaubild";							break;
	case "WD1793":					$url = "http://www.retrotechnology.com/herbs_stuff/WD179X.PDF";					break;
	case "WD2793":					$url = "http://pdf.datasheetcatalog.com/datasheets/400/315772_DS.pdf";			break;
	case "Weinheimer UKW-Tagung":	$url = "https://ukw-tagung.org/";												break;
	case "Wikipedia über Nascom":	$url = "https://de.wikipedia.org/wiki/Nascom";									break;
	case "Wikipedia":				$url = "https://de.wikipedia.org/";												break;
	case "Windows 3.0":				$url = "https://de.wikipedia.org/wiki/Microsoft_Windows_3.0";					break;
	case "Xyl":						$url = "https://www.urbandictionary.com/define.php?term=xyl";					break;
	case "Z-80-Applikationsbuch":	$url = "https://d-nb.info/831222980";											break;
	case "Z80 CPU":					$url = "https://www.zilog.com/docs/z80/um0080.pdf";								break;
	case "Z80 CTC":					$url = "http://www.datasheetcatalog.com/datasheets_pdf/Z/8/4/C/Z84C3004.shtml";	break;
	case "Z80 DMA":					$url = "http://www.z80.info/zip/um0081.pdf";									break;
	case "Z80 PIO":					$url = "https://www.zilog.com/docs/z80/ps0180.pdf";								break;
	case "Z80":						$url = "https://de.wikipedia.org/wiki/Zilog_Z80";								break;
	case "Z80-KIT Anwenderhandbuch":	$url = "http://2jo.de/robotron/Kontron/KONz80.pdf";							break;
	case "Z80-KIT":					$url = "https://tupel.jloh.de/z80-kit/";										break;
	case "Zilog":					$url = "https://www.zilog.com/";												break;
//	default:						$url = "externalLink($link, $text)";											break;
	}
	if ($url != "") {
		echo "<!-- External Link -->";
		echo "<a href=\"$url\"";

		echo ' title="Externer Link';
		if ($text != "" || $newText != "" || $title != "") {
//			echo ' title="';
			echo ': ';
			if ($title != "") {
				echo $title;
			} else if ($newText != "") {
				echo $newText;
			} else {
				echo $link;
			}
//			echo '"';
		}
		echo '"';

//		echo ' title="Externer Link"';
		echo ' target="_blank"';
//		https://mathiasbynens.github.io/rel-noopener/
//		echo ' rel="noopener"';
		echo ' rel="noreferrer"';
		echo '>';
		if ($text == "") {
			echo $link;
		} else {
			echo $text;
		}
		echo '</a>';
		echo '<!-- /External Link -->',$delimiter;
	} else {
		if ($text != "") {
			echo "<a href=\"$text\"></a>";
			echo $text,$delimiter;
		} else {
			echo "<a href=\"$link\"></a>";
			echo $link,$delimiter;
		}
	}
}

	function hline($width, $border="")
	{
		echo "<!-- Linie"/* &uuml;ber ganze Spalte*/." -->";
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
			echo "\t<a class=\"navbar-brand\" href=\"$gHtmlRoot/\">\n";
			echo "\t\t<img src=\"$gHtmlRoot/favicon.ico\" width=\"32\" height=\"32\" alt=\"\">\n";
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
					echo "-->\n";
*/
					if (is_dir($item_dir)) {
						echo "\t\t\t\t<li class=\"nav-item";
						if ("$request" == "/$dir/"
						||	strpos($request, "/$str/") === 0
						) {
							echo " active";
						}
						echo "\">\n";
						echo "\t\t\t\t\t<a class=\"nav-link\" href=\"$gHtmlRoot/$dir/\">$text</a>\n";
						echo "\t\t\t\t</li>\n";
					}
				}

				addNav("z80-kit", "Z80-KIT");
				addNav("nascom/1", "Nascom 1");
				addNav("nascom", "Nascom Journal", "nascom/journal");
				addNav("nascom/magazines/issues", "Nascom Magazines", "nascom/magazines");
				addNav("pico", "PICO");
				addNav("cpm-plus", "CP/M");

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

<!-- /navi-body.php -->
