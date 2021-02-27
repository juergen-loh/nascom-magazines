<?php
	$include_path = "../../../cgi-bin";

	$magpath   =                       quotemeta(addslashes($_GET['magazine']));
	$issuepath = sprintf("%02d", (int) quotemeta(addslashes($_GET['issue'])));
	$pagepath  = sprintf("%02d", (int) quotemeta(addslashes($_GET['page'])));
	$link      =                       quotemeta(addslashes($_GET['link']));
	$thumb     = false;

	include "$include_path/global.php";
//	$width = 720;

	$html = "$magpath/$issuepath/$pagepath.html";
	if (!file_exists($html)) {
		include "$include_path/404.php";
		exit;
	}
	switch ($link) {
	case "text":	break;
	case "graphic":	break;
	default:
		include "$include_path/404.php";
		exit;
	}

	include "$magpath/issue.php";
	include "$magpath/$issuepath/issue.php";
	$page = (int) $pagepath;

	switch ($link) {
	case "text":
		httpLastModified(array_merge(get_included_files(), array($navi_head_php, $navi_body_php, $navi_footer_php, $html)), $lastModified);
		break;
	case "graphic":
		httpLastModified(array_merge(get_included_files(), array($navi_head_php, $navi_body_php, $navi_footer_php)), $lastModified);
		break;
	}

	$nascom = true;
	include "$include_path/navi-head.php";

//---------------------------------------------------------------------------

function predsucc($p,$magazine,$issue)
{
	$pred = "";
	$succ = "";

	switch ($magazine) {

	// INMC News

	case "inmc-news":
		switch ($issue) {
		case "01":										$succ = "02/00";					break;
		case "02":	$pred = "01/00";					$succ = "03/00";					break;
		case "03":	$pred = "02/00";					$succ = "04/00";					break;
		case "04":	$pred = "03/00";					$succ = "05/00";					break;
		case "05":	$pred = "04/00";					$succ = "06/00";					break;
		case "06":	$pred = "05/00";					$succ = "07/00";					break;
		case "07":	$pred = "06/00";					$succ = "../inmc-80-news/01/01";	break;
		}
		break;

	// INMC News

	case "inmc-80-news":
		switch ($issue) {
		case "01":	$pred = "../inmc-news/07/00";		$succ = "02/01";						break;
		case "02":	$pred = "01/01";					$succ = "03/01";						break;
		case "03":	$pred = "02/01";					$succ = "04/01";						break;
		case "04":	$pred = "03/01";					$succ = "05/01";						break;
		case "05":	$pred = "04/01";					$succ = "../80-bus-news/11/01";			break;
		}
		break;

	// 80-Bus News

	case "80-bus-news":
		switch ($issue) {
		case "11":	$pred = "../inmc-80-news/05/01";	$succ = "12/01";						break;
		case "12":	$pred = "11/01";					$succ = "13/01";						break;
		case "13":	$pred = "12/01";					$succ = "14/01";						break;
		case "14":	$pred = "13/01";					$succ = "21/01";						break;
		case "21":	$pred = "14/01";					$succ = "22/01";						break;
		case "22":	$pred = "21/01";					$succ = "23/01";						break;
		case "23":	$pred = "22/01";					$succ = "24/01";						break;
		case "24":	$pred = "23/01";					$succ = "25/01";						break;
		case "25":	$pred = "24/01";					$succ = "26/01";						break;
		case "26":	$pred = "25/01";					$succ = "31/01";						break;
		case "31":	$pred = "26/01";					$succ = "32/01";						break;
		case "32":	$pred = "31/01";					$succ = "33/01";						break;
		case "33":	$pred = "32/01";					$succ = "34/01";						break;
		case "34":	$pred = "33/01";					$succ = "35/01";						break;
		case "35":	$pred = "34/01";					$succ = "36/01";						break;
		case "36":	$pred = "35/01";					$succ = "41/01";						break;
		case "41":	$pred = "36/01";					$succ = "42/01";						break;
		case "42":	$pred = "41/01";					$succ = "../scorpio-news/11/01";		break;
		}
		break;

	// Scorpio News

	case "scorpio-news":
		switch ($issue) {
		case "11":	$pred = "../80-bus-news/42/01";		$succ = "12/01";							break;
		case "12":	$pred = "11/01";					$succ = "13/01";							break;
		case "13":	$pred = "12/01";					$succ = "14/01";							break;
		case "14":	$pred = "13/01";					$succ = "21/01";							break;
		case "21":	$pred = "14/01";					$succ = "22/01";							break;
		case "22":	$pred = "21/01";					$succ = "23/01";							break;
		case "23":	$pred = "22/01";					$succ = "24/01";							break;
		case "24":	$pred = "23/01";					$succ = "31/01";							break;
		case "31":	$pred = "24/01";																break;
		}
		break;

	// Micropower

	case "micropower":
		switch ($issue) {
		case "11":										$succ = "12/-1";							break;
		case "12":	$pred = "11/-1";					$succ = "13/-1";							break;
		case "13":	$pred = "12/-1";					$succ = "14/-1";							break;
		case "14":	$pred = "13/-1";					$succ = "21/-1";							break;
		case "21":	$pred = "14/-1";					$succ = "22/-1";							break;
		case "22":	$pred = "21/-1";					$succ = "23/-1";							break;
		case "23":	$pred = "22/-1";					$succ = "24/-1";							break;
		case "24":	$pred = "23/-1";					$succ = "../nascom-newsletter/25/-1";		break;
		}
		break;

	// Nascom Newsletter

	case "nascom-newsletter":
		switch ($issue) {
		case "25":	$pred = "../micropower/24/-1";	$succ = "26/-1";							break;
		case "26":	$pred = "25/-1";					$succ = "31/-1";							break;
		case "31":	$pred = "26/-1";					$succ = "32/00";							break;
		case "32":	$pred = "31/-1";					$succ = "33/-1";							break;
		case "33":	$pred = "32/00";					$succ = "34/-1";							break;
		case "34":	$pred = "33/-1";					$succ = "35/-1";							break;
		case "35":	$pred = "34/-1";																break;
		}
		break;
	}
	if ($p) return($pred); else return($succ);
}

//---------------------------------------------------------------------------

function navi($page, $link, $first, $last, $magazine, $issue, $thumb)
{
	echo "<table class=\"robots-nocontent tupel-table-zeropadding\" style=\"width: 100%\">\n";
	echo "\t<tr>\n";

	// seite zurück

	echo "\t\t<td style=\"text-align:center; width: 10%\">\n";

		echo "\t\t\t";
		if (!$thumb && ($page > $first)) {
			if ($link == "graphic") {
				echo "<a style=\"display: block\" href=\"../" . sprintf("%02d", $page - 1);
			} else if ($link == "text") {
				echo "<a style=\"display: block\" href=\"../../" . sprintf("%02d", $page - 1) . "/text";
			}
			echo "/";
//			echo "#head";
			echo "\" title=\"Previous page\">";
			echo "<br>";
			InsertArrow("previous-page");
			echo "<br><br>";
			echo "</a>";
		}
		echo /*" &nbsp;"*/"\n";

	echo "\t\t</td>\n";

	// erste seite

	echo "\t\t<td style=\"text-align:center; width: 10%\">\n";

		echo "\t\t\t";
		if (!$thumb && ($page != $first)) {
			if ($link == "graphic") {
				echo "<a style=\"display: block\" href=\"../" . sprintf("%02d", $first);
			} else if ($link == "text") {
				echo "<a style=\"display: block\" href=\"../../" . sprintf("%02d", $first) . "/text";
			}
			echo "/";
//			echo "#head";
			echo "\" title=\"First page\">";
			echo "<br>";
			InsertArrow("first-page");
			echo "<br><br>";
			echo "</a>";
		}
		echo /*" &nbsp;"*/"\n";

	echo "\t\t</td>\n";

	// heft zurück

	echo "\t\t<td style=\"text-align:center; width: 10%\">\n";

		$pred = predsucc(TRUE, $magazine,$issue);

		echo "\t\t\t";
		if ($pred) {
			echo "<a style=\"display: block\" href=\"../../";
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
				echo "$pred";

				if ($link == "text") {
					echo "/text";
				}
				echo "/";
//				echo "#head";
			}
			echo "\" title=\"Previous issue\">";
			echo "<br>";
			InsertArrow("previous-issue");
			echo "<br><br>";
			echo "</a>";
		}
		echo /*" &nbsp;"*/"\n";

	echo "\t\t</td>\n";

	// seite _ von _

	echo "\t\t<th style=\"text-align:center; width: 40%; vertical-align: middle\">\n";

		echo "\t\t\t<a style=\"display: block\" href=\"";

			if ($link == "graphic") {
				echo "../";
			} else if ($link == "text") {
				echo "../../";//text/";
			}

		echo "\" title=\"Table of Contents\"><br>";
		if ($thumb) {
			echo "Pages " . (int) $first . " to " . (int) $last;
		} else {
			echo "Page " . (int) $page . " of " . (int) $last;
		}
		echo "<br><br></a>\n";

	echo "\t\t</th>\n";

	// heft vor

	echo "\t\t<td style=\"text-align:center; width: 10%\">\n";

	$succ = predsucc(FALSE, $magazine,$issue);

		echo "\t\t\t";//"&nbsp; ";
		if ($succ) {
			echo "<a style=\"display: block\" href=\"../../";
			if ($thumb) {
				if ($link == "graphic") {
					echo "$succ/thumb";
				} else {
					echo "../$succ/thumb/text";
				}
				echo "/";
			} else {
				if ($link == "text") {
					echo "../";
				}
				echo "$succ";

				if ($link == "text") {
					echo "/text";
				}
				echo "/";
//				echo "#head";
			}
			echo "\" title=\"Next issue\">";
			echo "<br>";
			InsertArrow("next-issue");
			echo "<br><br>";
			echo "</a>";
		}
		echo "\n";

	echo "\t\t</td>\n";

	// letzte seite

	echo "\t\t<td style=\"text-align:center; width: 10%\">\n";

		echo "\t\t\t";//"&nbsp; ";
		if (!$thumb && ($page != $last)) {
			if ($link == "graphic") {
				echo "<a style=\"display: block\" href=\"../" . sprintf("%02d", $last);
			} else if ($link == "text") {
				echo "<a style=\"display: block\" href=\"../../" . sprintf("%02d", $last) . "/text";
			}
			echo "/";
//			echo "#head";
			echo "\" title=\"Last page\">";
			echo "<br>";
			InsertArrow("last-page");
			echo "<br><br>";
			echo "</a>";
		}
		echo "\n";

	echo "\t\t</td>\n";

	// seite vor

	echo "\t\t<td style=\"text-align:center; width: 10%\">\n";

		echo "\t\t\t";//"&nbsp; ";

		if (!$thumb && ($page < $last)) {
			if ($link == "graphic") {
				echo "<a style=\"display: block\" href=\"../" . sprintf("%02d", $page + 1);
			} else if ($link == "text") {
				echo "<a style=\"display: block\" href=\"../../" . sprintf("%02d", $page + 1) . "/text";
			}
			echo "/";
//			echo "#head";
			echo "\" title=\"Next page\">";
			echo "<br>";
			InsertArrow("next-page");
			echo "<br><br>";
			echo "</a>";
		}
		echo "\n";
		
	echo "\t\t</td>\n";

	echo "\t</tr>\n";
	echo "</table>\n";
} // /navi()

//---------------------------------------------------------------------------

function RemoveEntities($s)
{
	$s = str_replace("&shy;", "", $s);
	$s = str_replace("&nbsp;", "", $s);
	return $s;
}

//---------------------------------------------------------------------------

function columnStart($column, $multi/*$class*/ = "")
{
	$class = $multi;
	switch ($column) {
	case 1:		echo "<!-- 1 column: start --><div";
				if ($class != "") {
					echo " class=\"$class\"";
				}
				echo ">\n";
				break;
	case 2:		echo "<!-- 2($multi) columns: start -->";
				switch ($multi) {
				case 2:
					echo "<div><div class=\"tupel-multi-column-2\">\n";
					break;
				case 22:
					echo "<div><div"
					.	" class=\"tupel-multi-column-2\""
					.	" style=\"-webkit-column-rule: 2px solid; column-rule: 2px solid\""
					.	">\n";
					break;
				case "":
					echo "<div class=\"row\"><div class=\"col-".BootstrapTier()."-6\">\n";
					break;
				default:
					echo "<columnStart($column, $multi)>\n";
					break;
				}
				break;
	case 3:		echo "<!-- 3 columns: start --><div class=\"row\"><div class=\"col-".BootstrapTier()."-4\">\n";			break;
	case 23:	echo "<!-- 3 columns: start 2 --><div class=\"row\"><div class=\"col-".BootstrapTier()."-8\">\n";		break;	// 2/3
	case 4:		echo "<!-- 4 columns: start --><div class=\"row\"><div class=\"col-".BootstrapTier()."-3\">\n";			break;
	case 34:	echo "<!-- 4 columns: start 3 --><div class=\"row\"><div class=\"col-".BootstrapTier()."-9\">\n";		break;	// 3/4
	case 6:		echo "<!-- 6 columns: start --><div class=\"row\"><div class=\"col-".BootstrapTier()."-2\">\n";			break;
	case 56:	echo "<!-- 6 columns: start 5 --><div class=\"row\"><div class=\"col-".BootstrapTier()."-10\">\n";			break;
	case 12:	echo "<!-- 12 columns: start --><div class=\"row\"><div class=\"col-".BootstrapTier()."-1\">\n";		break;
	case 412:	echo "<!-- 12 columns: start 4 --><div class=\"row\"><div class=\"col-".BootstrapTier()."-4\">\n";		break;	// 5/12
	case 512:	echo "<!-- 12 columns: start 5 --><div class=\"row\"><div class=\"col-".BootstrapTier()."-5\">\n";		break;	// 5/12
	case 712:	echo "<!-- 12 columns: start 7 --><div class=\"row\"><div class=\"col-".BootstrapTier()."-7\">\n";		break;	// 7/12
	default:	echo "<columnStart($column)>\n";																		break;
	}
}

function columnStartReverse($column)
{
	switch ($column) {
	case 2:		echo "<!-- 2 columns reverse: start --><div class=\"row\"><div class=\"col-".BootstrapTier()."-6 order-".BootstrapTier()."-last\">\n";	break;
	default:	echo "<columnStartReverse($column)>\n";																		break;
	}
}

function columnChangeReverse($column)
{
	switch ($column) {
	case 2:		echo "<!-- 2 columns reverse: change --></div><div class=\"col-".BootstrapTier()."-6 order-".BootstrapTier()."-first\">\n";		break;
	default:	echo "<columnChangeReverse($column)>\n";																		break;
	}
}

function columnChange($column)
{
	switch ($column) {
	case 2:		echo "<!-- 2 columns: change --></div><div class=\"col-".BootstrapTier()."-6\">\n";			break;
	case 3:		echo "<!-- 3 columns: change --></div><div class=\"col-".BootstrapTier()."-4\">\n";			break;
	case 23:	echo "<!-- 3 columns: change 2 --></div><div class=\"col-".BootstrapTier()."-8\">\n";		break;	// 2/3
	case 4:		echo "<!-- 4 columns: change --></div><div class=\"col-".BootstrapTier()."-3\">\n";			break;
	case 24:	echo "<!-- 4 columns: change 2 --></div><div class=\"col-".BootstrapTier()."-6\">\n";		break;	// 2/4
	case 34:	echo "<!-- 4 columns: change 3 --></div><div class=\"col-".BootstrapTier()."-9\">\n";		break;	// 3/4
	case 6:		echo "<!-- 6 columns: change --></div><div class=\"col-".BootstrapTier()."-2\">\n";			break;
	case 26:	echo "<!-- 6 columns: change 2 --></div><div class=\"col-".BootstrapTier()."-4\">\n";		break;	// 2/6
	case 36:	echo "<!-- 6 columns: change 3 --></div><div class=\"col-".BootstrapTier()."-6\">\n";		break;	// 3/6
	case 46:	echo "<!-- 6 columns: change 4 --></div><div class=\"col-".BootstrapTier()."-8\">\n";		break;	// 4/6
	case 56:	echo "<!-- 6 columns: change 5 --></div><div class=\"col-".BootstrapTier()."-10\">\n";		break;
	case 12:	echo "<!-- 12 columns: change --></div><div class=\"col-".BootstrapTier()."-1\">\n";		break;
	case 312:	echo "<!-- 12 columns: change 3 --></div><div class=\"col-".BootstrapTier()."-3\">\n";		break;	// 3/12
	case 412:	echo "<!-- 12 columns: change 4 --></div><div class=\"col-".BootstrapTier()."-4\">\n";		break;	// 4/12
	case 512:	echo "<!-- 12 columns: change 5 --></div><div class=\"col-".BootstrapTier()."-5\">\n";		break;	// 5/12
	case 612:	echo "<!-- 12 columns: change 6 --></div><div class=\"col-".BootstrapTier()."-6\">\n";		break;	// 6/12
	case 712:	echo "<!-- 12 columns: change 7 --></div><div class=\"col-".BootstrapTier()."-7\">\n";		break;	// 7/12
	case 912:	echo "<!-- 12 columns: change 9 --></div><div class=\"col-".BootstrapTier()."-9\">\n";		break;	// 7/12
	case 1012:	echo "<!-- 12 columns: change 10 --></div><div class=\"col-".BootstrapTier()."-10\">\n";	break;	// 10/12
	case 1112:	echo "<!-- 12 columns: change 11 --></div><div class=\"col-".BootstrapTier()."-11\">\n";	break;	// 11/12
	default:	echo "<columnChange($column)>\n";																		break;
	}
}

function columnEnd($column)
{
	switch ($column) {
	case 1:		echo "<!-- 1 column: end --></div>"/*</div>*/."\n";		break;
	case 2:		echo "<!-- 2 columns: end --></div></div>\n";			break;
	case 3:		echo "<!-- 3 columns: end --></div></div>\n";			break;
	case 4:		echo "<!-- 4 columns: end --></div></div>\n";			break;
	case 6:		echo "<!-- 6 columns: end --></div></div>\n";			break;
	case 12:	echo "<!-- 12 columns: end --></div></div>\n";			break;
	default:	echo "<columnEnd($column)>\n";																		break;
	}
}

function DisAssemblyRomBasicStart()		{					echo('<div class="DisAssemblyRomBasic">');	columnStart(1);	}
function DisAssemblyRomBasicChange()	{	hLine("100%");	}//echo("<br>");		}//columnEnd(1);		columnStart(1);	}
function DisAssemblyRomBasicEnd()		{	columnEnd(1);	echo('</div>');		}

//---------------------------------------------------------------------------

	echo "\n";
	echo "<!-- page.php -->";
	echo "\n\n";
	echo "\t<title>";
	echo RemoveEntities("$magazine - $desc");
	echo "</title>\n";
	echo "\t<meta name=\"keywords\" content=\"$magazine, Nascom Computer, Nascom 1, Nascom 2\">\n";
	switch ($link) {
	case "text":
		echo "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"../../../style.css\">\n";
	}

	include "$include_path/navi-body.php";

	echo "<table class=\"tupel-table-zeropadding\" style=\"width: 100%\">\n";
		echo "<tr>\n";
			echo "<td>\n";
				echo "<h1 class=\"h1Navi\">$magazine</h1>\n";
			echo "</td>\n";
			echo "<td>&nbsp;&nbsp;</td>\n";
			echo "<td style=\"vertical-align:top\">\n";
				echo "<h2 class=\"h2Navi\">$desc</h2>\n";
			echo "</td>\n";
		echo "</tr>\n";
	echo "</table>\n";

	navi($pagepath, $link, $first, $last, $magpath, $issuepath, $thumb);
	echo "<!-- The page -->\n";

	$naviBottom = "";
	switch ($link) {
	case "text":
		echo "<div class=\"row\" lang=\"en\"><div class=\"col-".BootstrapTier()."-12 "./*"hyphenate ".*/"mag-$magpath mag-$magpath-$issuepath page-$pagepath\" style=\"border: 1px solid #000;\" lang=\"en\" id=\"page\"><br>\n";
		$imagepath = "../../";
		include "$html";
		echo "\n<br></div></div>\n";
		echo "<p>\n\tThis is an ";
		externalLink("Optical character recognition", "OCR", "");
		echo "&rsquo;d version of the <a href=\"../\">scanned page</a> and likely contains recognition errors.\n</p>\n";
		$naviBottom .= "\t\t<a class=\"sm-fill nav-link\" href=\"../\">Graphic</a>\n";
		break;
	case "graphic":
		$img = "$magpath/$issuepath/$pagepath.png";
		$src = "../$pagepath.png";
		$lnk = "text/";//"../$img";
		$outWidth = $gWidth - 30//$width
		+ 15+15 /*padding*/
		- 2 /*border*/;

		list($imgWidth, $imgHeight, $type, $attr) = getimagesize($img);
		$outHeight = (int) (($imgHeight * $outWidth) / $imgWidth);

		echo "<div class=\"row\" id=\"article\">";
		echo "<div class=\"col-".BootstrapTier()."-12 hyphenate\" style=\"border: 1px solid #000; padding-left: 0; padding-right: 0\">\n";
		echo "\t<a href=\"$lnk\" title=\"Page ".(int)$page."\">";
		echo "<img class=\"img-fluid\" src=\"$src\" alt=\"Page ".(int)$page."\" width=$outWidth height=$outHeight>";
		echo "</a>\n";
		echo "</div></div>\n";
		$naviBottom .= "\t\t<a class=\"sm-fill nav-link\" href=\"text/\">Text</a>\n";
		break;
	}
	{
		$server = 'https://80bus.co.uk.mirror.jloh.de';
		if (isset($splitPage)
		&&	isset($splitOffset)
		) {
			if ($page >= $splitPage) {
				$offset += $splitOffset;
			}
		}
		$pdfPage = $page + $offset;

		$naviBottom .= "\t\t<a class=\"sm-fill nav-link\" "
		.	"href=\"$server/publications/magazines/$name$number.pdf#page=$pdfPage\" target=\"_blank\""
		.	">PDF</a>\n";
	}
	$naviBottom
	.=	navBottom("datenschutzerklaerung", "Privacy Statement")
	.	navBottom("impressum", "Imprint");

	echo "<!-- /The page -->\n";
	navi($pagepath, $link, $first, $last, $magpath, $issuepath, $thumb);

	include "$include_path/navi-footer.php";
	echo "\n";
	echo "<!-- /page.php -->";
?>
