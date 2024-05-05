<?php
	if ($thumb) {
		if ($link == "graphic") {
			$include_path = "../../../../../../cgi-bin";
			$gHtmlRoot = "../../../../..";	// http://nascom-magazines.jloh.de/new/nascom/journal/80/03/thumb/
		} else if ($link == "text") {
			$include_path = "../../../../../../../cgi-bin";
			$gHtmlRoot = "../../../../../..";
		}
	} else {
		$include_path = "../../../../../cgi-bin";
		if ($link == "graphic") {
			$gHtmlRoot = "../../../../..";
		} else if ($link == "text") {
			$gHtmlRoot = "../../../../../..";
		}
	}
	include "$include_path/global.php";
//	$width = 720;

	if (!$thumb) {
//		$thumb = false;
		$page = sprintf("%02d", (int) quotemeta(addslashes($_GET['page'])));
	}

	if (!$thumb && ($page < $first || $page > $last)) {
		include "$include_path/404.php";
		exit;
	}

	if ($thumb
	||	$link == "graphic"
	) {
		httpLastModified(array_merge(get_included_files(), array($navi_head_php, $navi_body_php, $navi_footer_php)), $lastModified);

	} else {
		httpLastModified(array_merge(get_included_files(), array($navi_head_php, $navi_body_php, $navi_footer_php, "$page.html")), $lastModified);
	}

	$nascom = true;
	include "$navi_head_php";

	echo "\n";
?>
	<!-- page.php / $Date: 2024-05-05 14:37:25 +0200 (So, 05. Mai 2024) $ -->
<?php
	echo "\n";

	$titleClean = $title;
	$titleClean = str_replace('<span class="nowrap">', '', $titleClean);
	$titleClean = str_replace('</span>', '', $titleClean);
	$titleClean = str_replace('&shy;', '', $titleClean);
	$titleClean = str_replace('&ndash;', '-', $titleClean);
	$titleClean = str_replace('&middot;', '-', $titleClean);

//	echo "\t<title>$magazine $titleClean &middot; Seite ", (int) $page, "</title>\n";
	echo "\t<title>$magazine - $titleClean</title>\n";
//	echo "\t<title>$magazine ", (int) $year + 1900, "</title>\n";
	echo "\t<!-- $lastModified -->\n";
	echo "\t<meta name=\"keywords\" content=\"$magazine, Nascom Computer, Nascom 1, Nascom 2\">\n";

	include "$navi_body_php";

/*	echo "\n";
	echo "<table class=\"robots-nocontent\" style=\"width: 100%\">\n";
		echo "\t<tr>\n";
//			echo "\t\t<td><br>\n";
*/
			$first2 = str_pad($first, 2, "0", STR_PAD_LEFT);
			$tStart	= '<!--a class="sm-fill nav-link disabled">';//'<td style="text-align: center"><br>';
			$tEnd	= "</a-->";//'<br><br></td>';

			$aStart = 'a class="sm-fill nav-link"';//'td style="text-align: center"><a style="display: block"';
			$aMid	= "";//'><br';
			$aEnd   = "/a";//'br><br></a></td';

			$naviBottom = "";

			if ($thumb) {
				if ($link == "graphic") {
					$naviBottom .=
						"\t\t<$aStart href=\"../$first2/text/\"$aMid>Text"
//					.	"-Version"
					.	"<$aEnd>\n"
					.	"\t\t"
/*					.	"$tStart"
//					.	"&middot;"
					.	"&nbsp;"
					.	"$tEnd"
*/					.	"<$aStart href=\"../$first2/\"$aMid>Grafik"
//					.	"-Version"
					.	"<$aEnd>\n"
					.	"\t\t"
/*					.	"$tStart"
//					.	"&middot;"
					.	"&nbsp;"
					.	"$tEnd"
*/					.	"$tStart"
//					.	"<b>"
					.	"Miniatur&shy;bilder"
//					.	"</b>"
					.	"$tEnd\n";
				} else {
					$naviBottom .=
						"\t\t<$aStart href=\"../../$first2/text/\"$aMid>Text"
//					.	"-Version"
					.	"<$aEnd>\n"
					.	"\t\t"
/*					.	"$tStart"
//					.	"&middot;"
					.	"&nbsp;"
					.	"$tEnd"
*/					.	"<$aStart href=\"../../$first2/\"$aMid>Grafik"
//					.	"-Version"
					.	"<$aEnd>\n"
					.	"\t\t"
/*					.	"$tStart"
//					.	"&middot;"
					.	"&nbsp;"
					.	"$tEnd"
*/					.	"$tStart"
/*					.	"<b>"
					.	"Miniatur&shy;bilder"
*///				.	"</b>"
					.	"$tEnd\n";
				}
			} else {
				if ($text) {
					if ($link == "text") {
						$naviBottom .=
							"\t\t$tStart"
//						.	"<b>"
						.	"Text"
//						.	"-Version"
//						.	"</b>";//</td>\n"
						.	"$tEnd\n";//</td>\n"
					} else {
						$naviBottom .=
							"\t\t<$aStart href=\"text/\"$aMid>Text"
//						.	"-Version"
						.	"<$aEnd>\n";
					}
				}
				if ($graphic) {
					if ($link == "graphic") {
						$naviBottom .=
							"\t\t"
/*						.	"$tStart"
//						.	"&middot;"
						.	"&nbsp;"
						.	"$tEnd"
*/						.	"$tStart"
//						.	"<b>"
						.	"Grafik"
//						.	"-Version"
//						.	"</b>"
						.	"$tEnd\n";
					} else {
						$naviBottom .=
							"\t\t"
/*						.	"$tStart"
//						.	"&middot;"
						.	"&nbsp;"
						.	"$tEnd"
*/						.	"<$aStart href=\"../\"$aMid>Grafik"
//						.	"-Version"
						.	"<$aEnd>\n";
					}
				}
				if ($link == "graphic") {
					$naviBottom .=
						"\t\t"
/*					.	"$tStart"
//					.	"&middot;"
					.	"&nbsp;"
					.	"$tEnd"
*/					.	"<$aStart href=\"../thumb/\"$aMid>Miniatur&shy;bilder<$aEnd>\n";
				} else {
					$naviBottom .=
						"\t\t"
/*					.	"$tStart"
//					.	"&middot;"
					.	"&nbsp;"
					.	"$tEnd"
*/					.	"<$aStart href=\"../../thumb/text/\"$aMid>Miniatur&shy;bilder<$aEnd>\n";
				}
			}
			if ($pdf) {
				$naviBottom .=
					"\t\t"
/*				.	"$tStart"
//				.	"&middot;"
				.	"&nbsp;"
				.	"$tEnd"
*/				.	"<$aStart href=\"$gHtmlRoot/nascom/journal/pdf/$year-$issue.pdf"
//				.	"#page=".(int)$page
				.	"\""
//				.	" target=\"_blank\""
				.	" download$aMid"
				.	">PDF"
//				.	"-Version"
//				.	" (ganzes Heft)"
				.	"<$aEnd>\n";
			}
/*			if ($link == "graphic") {
				$naviBottom .=
					"\t\t
/ *				.	"$tStart"
//				.	"&middot;"
				.	"&nbsp;"
				.	"$tEnd"
* /				.	"<$aStart href=\"../\"$aMid>Inhalts&shy;verzeichnis<$aEnd>\n";
			} else if ($link == "text") {
				$naviBottom .=
					"\t\t"
/ *				.	"$tStart"
//				.	"&middot;"
				.	"&nbsp;"
				.	"$tEnd"
* /				.	"<$aStart href=\"../../text/\"$aMid>Inhalts&shy;verzeichnis<$aEnd>\n";
			}
*/
/*		echo "\t</tr>\n";
	echo "</table>\n";
	echo "\n";
*/
	$naviBottom
	.=	navBottom("datenschutzerklaerung", "Datenschutzerklärung")
	.	navBottom("impressum", "Impressum");

/*	echo $naviBottom;
	unset($naviBottom);
*/
//	echo "<hr noshade size=1>\n";
/*	echo "<!-- Linie über ganze Spalte --><table style=\"width: 100%\"><tr><td style=\"border-top:1px solid #000\"><p style=\"font-size:1px\">&nbsp;</p></td></tr><tr><td style=\"height: 2px\"></td></tr></table>";
	echo "\n";
*/
	echo "<table class=\"style-table-zeropadding\" style=\"width: 100%";
//	echo "; margin-top: 10px";
	echo "\">\n";
	echo "\t<tr>\n";
	echo "\t\t<td>\n";
	echo "\t\t\t<h1 class=\"h1Navi\">$magazine</h1>\n";
	echo "\t\t</td>\n";
	echo "\t\t<td>&nbsp;&nbsp;</td>\n";
	echo "\t\t<td style=\"vertical-align:top\">\n";
	echo "\t\t\t<h2 class=\"h2Navi\">$title</h2>\n";
	echo "\t\t</td>\n";
	echo "\t</tr>\n";
	echo "</table>\n";

function predsucc($p,$year,$issue)
{
	$pred = "";
	$succ = "";

	switch ($year) {

	// 1980

	case "80":
		switch ($issue) {
		case "00":						$succ = "80/01";	break;
		case "01":	$pred = "80/00";	$succ = "80/02";	break;
		case "02":	$pred = "80/01";	$succ = "80/03";	break;
		case "03":	$pred = "80/02";	$succ = "80/04";	break;
		case "04":	$pred = "80/03";	$succ = "80/05";	break;
		case "05":	$pred = "80/04";	$succ = "80/06";	break;
		case "06":	$pred = "80/05";	$succ = "81/01";	break;
		}
		break;

	// 1981

	case "81":
		switch ($issue) {
		case "01":	$pred = "80/06";	$succ = "81/02";	break;
		case "02":	$pred = "81/01";	$succ = "81/03";	break;
		case "03":	$pred = "81/02";	$succ = "81/04";	break;
		case "04":	$pred = "81/03";	$succ = "81/06";	break;
		case "06":	$pred = "81/04";	$succ = "81/07";	break;
		case "07":	$pred = "81/06";	$succ = "81/08";	break;
		case "08":	$pred = "81/07";	$succ = "81/09";	break;
		case "09":	$pred = "81/08";	$succ = "81/10";	break;
		case "10":	$pred = "81/09";	$succ = "81/12";	break;
		case "12":	$pred = "81/10";	$succ = "82/01";	break;
		}
		break;
	
	// 1982

	case "82":
		switch ($issue) {
		case "01":	$pred = "81/12";	$succ = "82/02";	break;
		case "02":	$pred = "82/01";	$succ = "82/03";	break;
		case "03":	$pred = "82/02";	$succ = "82/05";	break;
		case "05":	$pred = "82/03";	$succ = "82/06";	break;
		case "06":	$pred = "82/05";	$succ = "82/07";	break;
		case "07":	$pred = "82/06";	$succ = "82/09";	break;
		case "09":	$pred = "82/07";	$succ = "82/10";	break;
		case "10":	$pred = "82/09";	$succ = "82/12";	break;
		case "12":	$pred = "82/10";	$succ = "83/01";	break;
		}
		break;

	// 1983

	case "83":
		switch ($issue) {
		case "01":	$pred = "82/12";	$succ = "83/02";	break;
		case "02":	$pred = "83/01";	$succ = "83/03";	break;
		case "03":	$pred = "83/02";	$succ = "83/04";	break;
		case "04":	$pred = "83/03";	$succ = "83/05";	break;
		case "05":	$pred = "83/04";	$succ = "83/06";	break;
		case "06":	$pred = "83/05";	$succ = "83/07";	break;
		case "07":	$pred = "83/06";	$succ = "83/09";	break;
		case "09":	$pred = "83/07";	$succ = "83/11";	break;
		case "11":	$pred = "83/09";	$succ = "83/12";	break;
		case "12":	$pred = "83/11";	$succ = "84/m1";	break;
		}
		break;

	// 1984

	case "84":
		switch ($issue) {
		case "m1":	$pred = "83/12";	$succ = "84/01";	break;
		case "01":	$pred = "84/m1";	$succ = "84/02";	break;
		case "02":	$pred = "84/01";	$succ = "84/m2";	break;
		case "m2":	$pred = "84/02";	$succ = "84/03";	break;
		case "03":	$pred = "84/m2";	$succ = "84/04";	break;
		case "04":	$pred = "84/03";	$succ = "85/m3";	break;
		}
		break;

	// 1985

	case "85";
		switch ($issue) {
		case "m3":	$pred = "84/04";						break;
		}
		break;
	}

	if ($p) return($pred); else return($succ);
}

function navi($page, $link, $first, $last, $width, $year, $issue, $thumb)
{
	echo "<table class=\"robots-nocontent style-table-zeropadding\" style=\"width: 100%\">\n";
	echo "\t<tr>\n";

	// seite zurück

	echo "\t\t<td class=\"navi-button\">\n";

		echo "\t\t\t";
		if (!$thumb && ($page > $first)) {
			if ($link == "graphic") {
				echo "<a style=\"display: block\" href=\"../" . sprintf("%02d", $page - 1);
			} else if ($link == "text") {
				echo "<a style=\"display: block\" href=\"../../" . sprintf("%02d", $page - 1) . "/text";
			}
			echo "/";
//			echo "#head";
			echo "\" title=\"Seite zurück\">";
//			echo "<br>";
			InsertArrow("previous-page");
//			echo "<br><br>";
			echo "</a>";
		}
		echo /*" &nbsp;"*/"\n";

	echo "\t\t</td>\n";

	// erste seite

	echo "\t\t<td class=\"navi-button\">\n";

		echo "\t\t\t";
		if (!$thumb && ($page != $first)) {
			if ($link == "graphic") {
				echo "<a style=\"display: block\" href=\"../" . sprintf("%02d", $first);
			} else if ($link == "text") {
				echo "<a style=\"display: block\" href=\"../../" . sprintf("%02d", $first) . "/text";
			}
			echo "/";
//			echo "#head";
			echo "\" title=\"Erste Seite\">";
//			echo "<br>";
			InsertArrow("first-page");
//			echo "<br><br>";
			echo "</a>";
		}
		echo /*" &nbsp;"*/"\n";

	echo "\t\t</td>\n";

	// heft zurück

	echo "\t\t<td class=\"navi-button\">\n";

		$pred = predsucc(TRUE, $year,$issue);

		echo "\t\t\t";
		if ($pred) {
			echo "<a style=\"display: block\" href=\"../../../";
			if ($thumb) {
				if ($link == "graphic") {
					echo "$pred/thumb";
				} else {
					echo "../$pred/thumb/text";
				}
				echo "/";
			} else {
				if ($link == "text") {
					echo "../";
				}
				echo "$pred/";

				if ($pred == "81/04") {
					echo "00";
				} else {
					echo "01";
				}
				if ($link == "text") {
					echo "/text";
				}
				echo "/";
//				echo "#head";
			}
			echo "\" title=\"Heft zurück\">";
//			echo "<br>";
			InsertArrow("previous-issue");
//			echo "<br><br>";
			echo "</a>";
		}
		echo /*" &nbsp;"*/"\n";

	echo "\t\t</td>\n";

	// seite _ von _

	echo "\t\t<th class=\"navi-button\">\n";

		echo "\t\t\t<a style=\"display: block\" href=\"";

			if ($link == "graphic") {
				echo "../";
			} else if ($link == "text") {
				echo "../../text/";
			}

		echo "\" title=\"Inhaltsverzeichnis\">";
//		echo "<br>";
		if ($thumb) {
			echo "Seiten " . (int) $first . " bis " . (int) $last;
		} else {
			echo "Seite " . (int) $page . " von " . (int) $last;
		}
//		echo "<br><br>";
		echo "</a>\n";

	echo "\t\t</th>\n";

	// heft vor

	echo "\t\t<td class=\"navi-button\">\n";

	$succ = predsucc(FALSE, $year,$issue);

		echo "\t\t\t";//"&nbsp; ";
		if ($succ) {
			echo "<a style=\"display: block\" href=\"../../../";
			if ($thumb) {
				if ($link == "graphic") {
					echo "$succ/thumb";
				} else {
					echo "../$succ/thumb/text";
				}
				echo "/";
			} else {
				if ($link == "graphic"/* || strcmp("$year-$issue", "84-04") >= 0*/) {
					if ($link == "text") {
						echo "../";
					}
				} else {
					echo "../";
				}
				echo "$succ/";

				if ($succ == "81/04") {
					echo "00";
				} else {
					echo "01";
				}
				if ($link == "graphic"/* || strcmp("$year-$issue", "84-04") >= 0*/) {
				} else {
					echo "/text";
				}
				echo "/";
//				echo "#head";
			}
			echo "\" title=\"Heft vor\">";
//			echo "<br>";
			InsertArrow("next-issue");
//			echo "<br><br>";
			echo "</a>";
		}
		echo "\n";

	echo "\t\t</td>\n";

	// letzte seite

	echo "\t\t<td class=\"navi-button\">\n";

		echo "\t\t\t";//"&nbsp; ";
		if (!$thumb && ($page != $last)) {
			if ($link == "graphic") {
				echo "<a style=\"display: block\" href=\"../" . sprintf("%02d", $last);
			} else if ($link == "text") {
				echo "<a style=\"display: block\" href=\"../../" . sprintf("%02d", $last) . "/text";
			}
			echo "/";
//			echo "#head";
			echo "\" title=\"Letzte Seite\">";
//			echo "<br>";
			InsertArrow("last-page");
//			echo "<br><br>";
			echo "</a>";
		}
		echo "\n";

	echo "\t\t</td>\n";

	// seite vor

	echo "\t\t<td class=\"navi-button\">\n";

		echo "\t\t\t";//"&nbsp; ";

		if (!$thumb && ($page < $last)) {
			if ($link == "graphic") {
				echo "<a style=\"display: block\" href=\"../" . sprintf("%02d", $page + 1);
			} else if ($link == "text") {
				echo "<a style=\"display: block\" href=\"../../" . sprintf("%02d", $page + 1) . "/text";
			}
			echo "/";
//			echo "#head";
			echo "\" title=\"Seite vor\">";
//			echo "<br>";
			InsertArrow("next-page");
//			echo "<br><br>";
			echo "</a>";
		}
		echo "\n";
		
	echo "\t\t</td>\n";

	echo "\t</tr>\n";
	echo "</table>\n";
} // /navi()

	if (!isset($page)) $page = 0;
	echo "\n<div id=\"head\"><!-- Navigation oben -->\n";
	navi($page,$link,$first,$last,$gWidth,$year,$issue,$thumb);
	echo "</div><!-- /Navigation oben -->\n";

	echo "\n<!-- Die Seite -->\n";
	if ($thumb) {
		$pageBreak = true;
		$pagebreak = false;//urks!
		$column = 1;
		$ThumbCol = "col-".BootstrapTier("Thumb")."-4";// col-sm-6";

		for ($page = $first; $page <= $last; $page++) {
			if ($column == 0 || $page == $first) {
				echo "<div class=\"row\">";
				echo "<div class=\"$ThumbCol\">\n";
			} else {
				if ($pagebreak) {
					echo "<div class=\"row\">";
					echo "<div class=\"$ThumbCol\">\n";
				}
			}
			if (!$pageBreak || $page == $first) {
				echo "\t<table><tr>";
				if ($page == $first) {
					echo "<td style=\"width: 100px; padding:0\"></td><!-- Platzhalter linke Seite -->";
				}
				echo "<td>\n";
				echo "\t<table style=\"border: 1px solid #000\"";
				if ($page == $first) {
				}
				echo "><tr>\n";
			}
			echo "\t\t<td style=\"padding: 0; ";
			if (($column % 2) == 0 && $page != $last) {
				echo " border-right: 1px solid #000";
			}
			echo "\">";
			if (!isset($imagepath)) $imagepath = "";
			if ($link == "graphic") {
				imagelink($imagepath, $imagepath . sprintf("../%02d/", $page), sprintf("%02d.gif", $page), "Seite $page"/*" von $last"*/);
			} else {
				imagelink($imagepath, $imagepath . sprintf("../../%02d/text/", $page), sprintf("../../thumb/%02d.gif", $page), "Seite $page"/*" von $last"*/);
			}
			echo "</td>\n";

			if (++$column >= 6) $column = 0;

			if ($pageBreak || $page == $last) {
				echo "\t</tr></table>\n";
				echo "\t</td></tr></table><br>\n";
				if ($column != 0 && $page != $last) {
					echo "</div><div class=\"$ThumbCol\">\n";
				}
			}

			$pageBreak = !$pageBreak;

			if ($column == 0 || $page == $last) {
				echo "</div></div>\n";
			} else {
				if ($pagebreak) echo "</div>  </div>\n";
			}
			if ($pagebreak) {
				echo "<br></div><div class=\"$ThumbCol\">\n";
			}
		}
	} else if ($link == "graphic") {
		$img = "$page.gif";
		$src = "../$img";
		$lnk = "text/";//"../$img";
		$outWidth = $gWidth - 2; /*border*/

		list($imgWidth, $imgHeight, $type, $attr) = getimagesize($img);
		$outHeight = (int) (($imgHeight * $outWidth) / $imgWidth);

		echo "<div class=\"row\" id=\"article\">";
		echo "<div class=\"col-".BootstrapTier()."-12 hyphenate\" style=\"border: 1px solid #000; padding-left: 0; padding-right: 0\">\n";
		echo "\t<a href=\"$lnk\" title=\"Seite ".(int)$page."\">";
		echo "<img class=\"img-fluid\" src=\"$src\" alt=\"Seite " . (int) $page . "\" width=$outWidth height=$outHeight>";
		echo "</a>\n";
		echo "</div></div>\n";
	} else if ($link == "text") {
		echo "<div class=\"row\" id=\"page\">";
		echo "<div class=\"col-".BootstrapTier()."-12 hyphenate\" style=\"border: 1px solid #000;";
		echo " padding-top: 1em; padding-bottom: 1em;";
		switch ("$year-$issue-$page") {
		case "81-06-01":	case "81-06-02":	case "81-06-19":	case "81-06-20":
		case "81-07-01":	case "81-07-02":	case "81-07-19":	case "81-07-20":
		case "81-08-01":	case "81-08-02":	case "81-08-23":	case "81-08-24":
		case "81-09-01":	case "81-09-02":	case "81-09-27":	case "81-09-28":
		case "81-10-01":	case "81-10-02":	case "81-10-27":	case "81-10-28":
		case "81-12-01":	case "81-12-02":	case "81-12-55":	case "81-12-56":
			echo " background-color:#E50F57;";
			break;
		case "82-01-01":	case "82-01-36":
		case "82-02-01":	case "82-02-32":
		case "82-03-01":	case "82-03-52":
		case "82-05-01":	case "82-05-32":
		case "82-06-01":	case "82-06-24":
		case "82-07-01":	case "82-07-60":
		case "82-09-01":	case "82-09-28":
		case "82-10-01":	case "82-10-28":
			echo " background-color:#F10A0A;";
			break;
		}
		echo "\">\n\n";

		//-------------------------------------------------------------------

//		$ColumnTotal = 0;
//		$ColumnFraction = 0;

		function startColumn($cols, $context = "", $class = "")
		{
//			global $ColumnTotal;//, $ColumnFraction;
//			if ($ColumnTotal != 0) echo "<ColumnTotal($ColumnTotal)>";
//			if ($ColumnFraction != 0) echo "<ColumnFraction($ColumnFraction)>";
			$col = (int)(12/($cols) + 0.5);
//			$ColumnTotal = 12 - $col;

			echo '<div class="col-'.BootstrapTier($context)."-$col";
			if ($class != "") echo " $class";
			echo '">';
		}

		function changeColumn($cols, $context = "", $class = "")
		{
//			global $ColumnTotal;//, $ColumnFraction;
			$col = (int)(12/($cols) + 0.5);
//			$ColumnTotal -= $col;

			echo "</div>";
			echo '<div class="col-'.BootstrapTier($context)."-$col";
			if ($class != "") echo " $class";
			echo '">';
		}

		function endColumn($cols)
		{
//			global $ColumnTotal;//, $ColumnFraction;
//			if ($ColumnTotal != 0) echo "<ColumnTotal($ColumnTotal)>";
			echo "</div>";
		}

		//-------------------------------------------------------------------

		$MultiColumn = "";
		$MultiColumnRule = "";

		function setMultiColumn($multi)
		{
			global $MultiColumn, $MultiColumnRule;
			switch ($multi) {
//			case 2:		$MultiColumn = 2;		$MultiColumnRule = "";			break;	// multi-column
			case 1:		$MultiColumn = 1;		$MultiColumnRule = "";			break;	// multi-column vertical
			case 21:	$MultiColumn = 2;		$MultiColumnRule = "1px solid";	break;	// multi-column mit 1px mittellinie
			case 22:	$MultiColumn = 2;		$MultiColumnRule = "2px solid";	break;	// multi-column mit 2px mittellinie
			case 32:	$MultiColumn = 3;		$MultiColumnRule = "2px solid";	break;	// multi-column mit 2px mittellinie
			default:	$MultiColumn = $multi;	$MultiColumnRule = "";			break;	// multi-column
			}
//			echo "<!-- $MultiColumn $MultiColumnRule -->";
		}

		function startMultiColumn($cols, $class = "")
		{
			global $MultiColumnRule;
			echo '<div class="style-multi-column-'.$cols;
			if ($class != "") {
				echo " $class";
			}
			echo '"';
			if ($MultiColumnRule != "") {
				echo " style=\"-webkit-column-rule: $MultiColumnRule; column-rule: $MultiColumnRule\"";
			}
			echo '>';
		}

		//-------------------------------------------------------------------

		function columnsStart($cols, $multi = "", $context = "", $class="")
		{
			echo "<!-- $cols";
			if ($multi != "") echo "($multi)";
			echo " Spalten: Start -->";
			global $MultiColumn;
			setMultiColumn($multi);
			if ($MultiColumn == 1) {
				echo '<div><div';
				if ($class != "") echo "class=\"$class\"";
				echo '>';
			} else if ($cols == $MultiColumn) {
				startMultiColumn($cols, $class);
			} else {
				echo '<div class="row';
				if ($class != "") echo " $class";
				echo '">';
//				echo '<div class="col-'.BootstrapTier($context).'-'. 12/($cols).'">';
				startColumn($cols, $context);
			}
			echo "\n";
		}
		function columnsStartJustify($cols, $multi = "", $class="")
		{
			echo "<!-- $cols";
			if ($multi != "") echo "($multi)";
			echo " Spalten im Blocksatz: Start -->";
			global $MultiColumn;
			setMultiColumn($multi);
			if ($MultiColumn == 1) {
				echo '<div><div class="justify';
				if ($class != "") echo " $class";
				echo '">';
			} else if ($cols == $MultiColumn) {
				$c = "justify";
				if ($class != "") $c .= " $class";
				startMultiColumn($cols, $c);
			} else {
				echo '<div class="row';
				if ($class != "") echo " $class";
				echo '">';
//				echo '<div class="col-'.BootstrapTier().'-'. 12/($cols).' justify">';
				startColumn($cols, "", "justify");
			}
			echo "\n";
		}
		function columnsChange($cols, $p1 = "", $p2 = "", $context = "")
		{
			echo "<!-- $cols Spalten: Spaltenwechsel -->";
			global $MultiColumn;
			if ($MultiColumn == 1) {
				echo "<br>\n";
			} else if ($cols == $MultiColumn) {
				// nix
			} else {
				echo "$p1";
//				echo "</div>";
//				echo "<div class=\"col-".BootstrapTier($context)."-". 12/($cols)."\">";
				changeColumn($cols, $context);
				echo "$p2";
			}
			echo "\n";
		}
		function columnsChangeJustify($cols, $p1 = "", $p2 = "")
		{
			echo "<!-- $cols Spalten im Blocksatz: Spaltenwechsel -->";
			global $MultiColumn;
			if ($MultiColumn == 1) {
				echo "<br>\n";
			} else if ($cols == $MultiColumn) {
				// nix
			} else {
				echo "$p1";
//				echo "</div>";
//				echo "<div class=\"col-".BootstrapTier()."-". 12/($cols)." justify\">";
				changeColumn($cols, "", "justify");
				echo "$p2";
			}
			echo "\n";
		}
		function columnsEnd($cols)
		{
			echo "<!-- $cols Spalten: Ende -->";
			global $MultiColumn;
			if ($cols == $MultiColumn) {
				echo '</div>';
			} else {
//				echo '</div>';
				endColumn($cols);
				echo '</div>';
			}
			echo "\n";
		}

//---------------------------------------------------------------------------

function columnStart($column, $multi = "", $context = "", $class="")
{
	switch ($column) {
	case 1:		columnsStart(1, $multi, $context, $class);		break;
	case 2:		columnsStart(2, $multi, $context, $class);		break;
	case 3:		columnsStart(3, $multi, $context, $class);		break;
	case 23:	columnsStart(3/2, $multi, $context, $class);	break;	//	 2/3
	case 4:		columnsStart(4);								break;
	case 34:	columnsStart(4/3);								break;	//	 3/4
	case 5:		columnsStart(6, $multi);						break;
	case 6:		columnsStart(6, $multi);						break;
	case 26:	columnsStart(6/2);								break;	//	 2/6
	case 56:	columnsStart(6/5);								break;	//	 5/6
	case 12:	columnsStart(12);								break;
	case 512:	columnsStart(12/5);								break;	//	 5/12
	case 712:	columnsStart(12/7);								break;	//	 7/12
	default:	echo "<columnStart($column)>\n";				break;
	}
}

function columnStartJustify($column, $multi = "", $context = "", $class="")
{
	switch ($column) {
	case 1:		columnsStartJustify(1, $multi, $class);		break;
	case 2:		columnsStartJustify(2, $multi, $class);		break;
	case 3:		columnsStartJustify(3, $multi, $class);		break;
	case 23:	columnsStartJustify(3/2);					break;	//	 2/3
	case 4:		columnsStartJustify(4);						break;
	case 34:	columnsStartJustify(4/3);					break;	//	 3/4
	case 6:		columnsStartJustify(6);						break;
	case 12:	columnsStartJustify(12);					break;
	case 712:	columnsStartJustify(12/7);					break;	//	 7/12
	default:	echo "<columnStartJustify($column)>\n";		break;
	}
}

function columnChange($column, $p1 = "", $p2 = "", $context = "")
{
	switch ($column) {
	case 2:		columnsChange(2, $p1, $p2, $context);	break;
	case 23:	columnsChange(3/2, $p1, $p2);			break;	//	 2/3
	case 3:		columnsChange(3);						break;
	case 34:	columnsChange(4/3);						break;	//	 3/4
	case 4:		columnsChange(4);						break;
	case 5:		columnsChange(6);						break;
	case 6:		columnsChange(6);						break;
	case 56:	columnsChange(6/5);						break;	//	 5/6
	case 12:	columnsChange(12);						break;
	case 512:	columnsChange(12/5);					break;	//	 5/12
	case 712:	columnsChange(12/7);					break;	//	 7/12
	case 1112:	columnsChange(12/11);					break;	//	11/12
	default:	echo "<columnChange($column)>\n";		break;
	}
}

function columnChangeJustify($column, $p1 = "", $p2 = "", $context = "")
{
	switch ($column) {
	case 2:		columnsChangeJustify(2, $p1, $p2);			break;
	case 3:		columnsChangeJustify(3);					break;
	case 23:	columnsChangeJustify(3/2);					break;	//	 2/3
	case 4:		columnsChangeJustify(4);					break;
	case 34:	columnsChangeJustify(4/3);					break;	//	 3/4
	case 56:	columnsChangeJustify(6/5);					break;	//	 5/6
	case 512:	columnsChangeJustify(12/5);					break;	//	 5/12
	case 1112:	columnsChangeJustify(12/11);				break;	//	11/12
	default:	echo "<columnChangeJustify($column)>\n";	break;
	}
}

function columnEnd($column)
{
	switch ($column) {
	case 1:		columnsEnd(1);						break;
	case 2:		columnsEnd(2);						break;
	case 3:		columnsEnd(3);						break;
	case 4:		columnsEnd(4);						break;
	case 5:		columnsChange(6);	columnsEnd(6);	break;
	case 6:		columnsEnd(6);						break;
	case 12:	columnsEnd(12);						break;
	default:	echo "<columnEnd($column)>\n";		break;
	}
}

//---------------------------------------------------------------------------

function columnSubStart()	{	echo "<!-- 2 Unter-Spalten: Start --><div class=\"row\"><div class=\"col-".BootstrapTier()."-6\">\n";	}
function columnSubChange()	{	echo "<!-- 2 Unter-Spalten: Spaltenwechsel --></div><div class=\"col-".BootstrapTier()."-6\">\n";		}
function columnSubEnd()		{	echo "<!-- 2 Unter-Spalten: Ende --></div></div>\n";													}

function columnTabStart()	{	echo "<!-- Tabelle mit 2 Spalten: Start --><table style=\"width: 100%\"><tr><td>\n";	}
function columnTabChange()	{	echo "<!-- Tabelle mit 2 Spalten: Spaltenwechsel --></td><td>\n";						}
function columnTabEnd()		{	echo "<!-- Tabelle mit 2 Spalten: Ende --></td></tr></table>\n";						}

//---------------------------------------------------------------------------

		$imagepath = "../../";
		include "$page.html";

		echo "\n";
		echo "</div></div>";
	}
	echo "\n<!-- /Die Seite -->\n";

	echo "\n<!-- Navigation unten -->\n";
	navi($page,$link,$first,$last,$gWidth,$year,$issue,$thumb);
	echo "<!-- /Navigation unten -->\n";

	$comp = "$year-$issue-$page";

	switch ($comp) {
	case "80-01-08":
	case "80-01-09":
	case "80-01-10":
		echo "\n\t<p class=\"nas-link\">";	externalLink("Piranha.nas","Download");		echo "\tdes Programms von der "; externalLink("Nascom Home Page","",""); echo ".</p>\n";
		break;
	case "80-02-06":
		echo "\n\t<p class=\"nas-link\">";	externalLink("INVASION.NAS","Download");	echo "\tdes Programms von der "; externalLink("Nascom Home Page","",""); echo ".</p>\n";
		break;
	case "81-04-25":
	case "81-04-26":
	case "81-04-27":
	case "81-04-28":
		echo "\n\t<p class=\"nas-link\">";	externalLink("UFOJAGD.CAS","Download");		echo "\tdes Programms von der "; externalLink("Nascom Home Page","",""); echo ".</p>\n";
		break;
	case "81-06-20":
		echo "\n\t<p class=\"nas-link\">";	externalLink("OTHELLO.NAS","Download");		echo "\tdes Programms von der "; externalLink("Nascom Home Page","",""); echo ".</p>\n";
		break;
	case "81-12-19":
	case "81-12-20":
	case "81-12-21":
	case "81-12-22":
		echo "\n\t<p class=\"nas-link\">";	externalLink("Startrek.cas","Download");	echo "\tdes Programms von der "; externalLink("Nascom Home Page","",""); echo ".</p>\n";
		break;
	case "82-10-14":
	case "82-10-15":
	case "82-10-16":
	case "82-10-17":
	case "82-10-18":
		echo "\n\t<p class=\"nas-link\">";	externalLink("Ldgold.cas","Download");		echo "\tdes Programms von der "; externalLink("Nascom Home Page","",""); echo ".</p>\n";
		break;
	case "82-10-21":
	case "82-10-22":
		echo "\n\t<p class=\"nas-link\">";	externalLink("Swinghs.cas","Download");		echo "\tdes Programms von der "; externalLink("Nascom Home Page","",""); echo ".</p>\n";
		break;
	case "83-02-08":
	case "83-02-09":
		echo "\n\t<p class=\"nas-link\">";	externalLink("Filter.cas","Download");		echo "\tdes Programms von der "; externalLink("Nascom Home Page","",""); echo ".</p>\n";
		break;
	case "83-02-16":
	case "83-02-17":
	case "83-02-18":
		echo "\n\t<p class=\"nas-link\">";	externalLink("Spaceii.nas","Download");		echo "\tdes Programms von der "; externalLink("Nascom Home Page","",""); echo ".</p>\n";
		break;
	case "83-02-19":
		echo "\n\t<p class=\"nas-link\">";	externalLink("maloche.cas","Download");		echo "\tdes Programms von der "; externalLink("Nascom Home Page","",""); echo ".</p>\n";
		break;
	case "83-03-31":
		echo "\n\t<p class=\"nas-link\">";	externalLink("Lolly.nas","Download");		echo "\tdes Programms von der "; externalLink("Nascom Home Page","",""); echo ".</p>\n";
		break;
	case "83-06-24":
	case "83-06-25":
	case "83-06-26":
		echo "\n\t<p class=\"nas-link\">";	externalLink("Car_race.nas","Download");	echo "\tdes Programms von der "; externalLink("Nascom Home Page","",""); echo ".</p>\n";
		break;
	case "83-07-10":
	case "83-07-11":
	case "83-07-12":
	case "83-07-13":
	case "83-07-14":
	case "83-07-15":
	case "83-07-16":
	case "83-07-17":
	case "83-07-18":
	case "83-07-19":
	case "83-07-20":
	case "83-07-21":
	case "83-07-22":
		echo "\n\t<p class=\"nas-link\">";	externalLink("Tforth.nas","Download");		echo "\tdes Programms von der "; externalLink("Nascom Home Page","",""); echo ".</p>\n";
		break;
	case "84-04-32":
	case "84-04-33":
	case "84-04-34":
	case "84-04-35":
		echo "\n\t<p class=\"nas-link\">";	externalLink("Swords.cas","Download");		echo "\tdes Programms von der "; externalLink("Nascom Home Page","",""); echo ".</p>\n";
		break;
	case "84-04-40":
		echo "\n\t<p class=\"nas-link\">";	externalLink("Euler.cas","Download");		echo "\tdes Programms von der "; externalLink("Nascom Home Page","",""); echo ".</p>\n";
		break;
	}

	include "$navi_footer_php";

	echo "\n";
	echo "<!-- /page.php -->";
?>
