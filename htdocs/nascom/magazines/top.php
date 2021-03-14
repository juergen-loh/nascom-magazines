<?php
	$include_path = "$tppath/../../../cgi-bin";
	$gHtmlRoot = "$tppath/../..";
	include "$include_path/global.php";
	$table = dirname(__FILE__) . "/gap.php";
	httpLastModified(array_merge(get_included_files(), array($navi_head_php, $navi_body_php, $navi_footer_php, $table)), $lastModified);
	$nascom = true;
	include "$navi_head_php";
//	$width = 720;
/*
	echo "<!--\n";
	echo "table=$table\n";
	echo "file=" . __FILE__ . "\n";
	echo "dirname=" . dirname(__FILE__) . "\n";
	echo "-->\n";
*/
?>

<!-- top.php -->

	<meta name="keywords" content="Table of Contents,
		Nascom Magazines, INMC News, INMC 80 News, Micropower, Nascom Newsletter, 80-Bus News, Scorpio News,
		Nascom 1, Nascom 2">
<?php
	$title = str_replace("&shy;", "", $title);
	echo "\t<title>$title";
	if (isset($issue)) echo " - $issue";
	echo " - Table of Contents";
	echo "</title>\n";

	include "$navi_body_php";

	$naviBottom = "";
	$naviBottom
	.=	navBottom("datenschutzerklaerung", "Privacy Statement")
	.	navBottom("impressum", "Imprint");
?>
<div lang="en">

<?php
	$t0s = "<a href=\"$gHtmlRoot/nascom/magazines$tail/\" style=\"display:block\">";
	$t0e = "</a>";
	$t1s = "<a href=\"$gHtmlRoot/nascom/magazines/inmc-news$tail/\" style=\"display:block\">";
	$t1e = "</a>";
	$t2s = "<a href=\"$gHtmlRoot/nascom/magazines/inmc-80-news$tail/\" style=\"display:block\">";
	$t2e = "</a>";
	$t3s = "<a href=\"$gHtmlRoot/nascom/magazines/80-bus-news$tail/\" style=\"display:block\">";
	$t3e = "</a>";
	$t4s = "<a href=\"$gHtmlRoot/nascom/magazines/micropower$tail/\" style=\"display:block\">";
	$t4e = "</a>";
	$t5s = "<a href=\"$gHtmlRoot/nascom/magazines/nascom-newsletter$tail/\" style=\"display:block\">";
	$t5e = "</a>";
	$t6s = "<a href=\"$gHtmlRoot/nascom/magazines/scorpio-news$tail/\" style=\"display:block\">";
	$t6e = "</a>";

	if (!isset($path)
	||	isset($pict)
	) {
//		echo "\n$title\n";
		switch ($title) {
		case "Nascom Magazines":	$t0s = "<b>";	$t0e = "</b>";	break;
		case "INMC News":			$t1s = "<b>";	$t1e = "</b>";	break;
		case "INMC 80 News":		$t2s = "<b>";	$t2e = "</b>";	break;
		case "Micropower":			$t4s = "<b>";	$t4e = "</b>";	break;
		case "Nascom Newsletter":	$t5s = "<b>";	$t5e = "</b>";	break;
		case "80-Bus News":			$t3s = "<b>";	$t3e = "</b>";	break;
		case "Scorpio News":		$t6s = "<b>";	$t6e = "</b>";	break;
		}
	}
?>

<table class="style-table-zeropadding" style="width:100%">
	<tr>
		<td style="text-align:center; vertical-align:bottom">
			<?php echo $t1s."INMC<br>News$t1e\n"; ?>
		</td>
		<td style="text-align:center">
			<br>&nbsp;
		</td>
		<td style="text-align:center; vertical-align:bottom">
			<?php echo $t2s."INMC 80<br>News$t2e\n"; ?>
		</td>
		<td style="text-align:center">
			<br>&nbsp;
		</td>
		<td style="text-align:center; vertical-align:bottom">
			<?php echo $t4s."<br>Micro&shy;power$t4e\n"; ?>
		</td>
		<td style="text-align:center">
			<br>&nbsp;
		</td>
		<td style="text-align:center; vertical-align:bottom">
			<?php echo $t3s."80-Bus<br>News$t3e\n"; ?>
		</td>
		<td style="text-align:center">
			<br>&nbsp;
		</td>
		<td style="text-align:center; vertical-align:bottom">
			<?php echo $t5s."Nas&shy;com<br>News&shy;letter$t5e\n"; ?>
		</td>
		<td style="text-align:center">
			<br>&nbsp;
		</td>
		<td style="text-align:center; vertical-align:bottom">
			<?php echo $t6s."Scor&shy;pio<br>News$t6e\n"; ?>
		</td>
		<td style="text-align:center">
			<br>&nbsp;
		</td>
		<td style="text-align:center; vertical-align:bottom">
			<?php echo $t0s."Nas&shy;com<br>Maga&shy;zines$t0e\n"; ?>
		</td>
	</tr>
</table>

<!--
<hr noshade size=1>
-->
<?php
	echo "<!-- Linie &uuml;ber ganze Spalte --><table style=\"width: 100%\"><tr><td style=\"border-top:1px solid #000\"><p style=\"font-size:1px\">&nbsp;</p></td></tr><tr><td style=\"height: 2px\"></td></tr></table>\n";

/*	if ($title == "Nascom Journal" && $issue == "4/81 5") {
		$page = 0;
	} else {
*/		$page = 1;
/*	}
*/
	echo "<div class=\"row\">\n";
	if (isset($pict)) {
		echo "<div class=\"col-12\">\n";
	} else if (isset($path)) {
		echo "<div class=\"col-8\">\n";
	} else {
		echo "<div class=\"col-12\">\n";
	}

	if (isset($pict)) {
		echo "\t<h1 id=\"head\">\n\t\t";
		imageinsert(
			""
		,	$title, "", $page
		,	sprintf("%s/%s", $path, $pict)
		);
		echo "\t</h1>\n";
	} else {
		echo "\t<h1 id=\"head\">$title</h1>\n";
	}
	if (isset($path)
	&&	!isset($pict)
	) {
		if (isset($desc)) echo "\t<h2>$desc</h2>\n";
		echo "<br>\n";
	} else {
		if (isset($issue)) echo "\t<h2>$issue</h2>\n";
		if (isset($desc)) echo "\t<p>$desc</p>\n";
	}
	echo "\t<h3 style=\"margin-bottom:0\">Table of Contents</h3>\n";

//	echo "<!-- path=$path -->\n";
//	echo "<!-- tail=$tail -->\n";
	if (isset($path)) {
		if (!isset($pict)) {
			echo "<br>\n";
		}
		echo "</div><div class=\"col-4\">\n";
//		echo "\t<table style=\"border: 1px solid #000;\"><tr><td style=\"padding: 0\">\n";
		$link = "";
		if (isset($name)
		&&	isset($number)
		) {
			$link = "https://80bus.co.uk.mirror.jloh.de/publications/magazines/$name"."$number.pdf";
		}
		{
			echo "\t";
			if (isset($pict)) {
			} else {
				imageRight(
					""
				,	"", "", $page
				,	sprintf("%scover.jpeg", $path/*, $page*/)
				);
			}
		}
/*		if (isset($name)
		&&	isset($number)
		) {
			echo "\t\t</a>\n";
		}
*/
/*		imagelink(
			$path,
			sprintf($path . "%02d$tail/", $page),
			sprintf("%02d.jpeg", $page),
//			"$title, Seite $page"
			"$title - $issue"
		);
*/
//		echo "\t</td></tr></table>";
		echo "<br>\n";
//		echo "\t\t\t<font size=1pt>&nbsp;</font>\n";
//		echo "\n-->\n";
	}

	echo "</div>\n";
/*	echo "<div class=\"col-".BootstrapTier()."-12\">\n";
	echo "</div>";
*/	echo "</div>\n\n";
	if (!isset($path)) {
		echo "<div style=\"height: 10px\">&nbsp;</div>\n\n";
	}
?>
<table
	class="content hyphenate"
	style="border-bottom: 1px solid #000;border-left: 1px solid #000;border-right: 1px solid #000; width: 100%"
>
	<colgroup>
		<col style="width:40%">
		<col style="width:20%">
		<col>
		<col>
		<col style="text-align:right">
		<col style="text-align:right">
	</colgroup>
<?php
	include "gap.php";

//---------------------------------------------------------------------------

function echoShy($str)
{
	$arr = explode(" ", $str);
	$count = count($arr);
	$eco = "";
	foreach ($arr as $value) {
		switch($value) {
		// Topic
		case "(introduction)":				$erg = "(intro&shy;duction)";								break;
		case "Advertisements":				$erg = "Adver&shy;tisements";								break;
		case "Alternative":					$erg = "Alter&shy;native";									break;
		case "Assembler/Editor":			$erg = "As&shy;sem&shy;bler/Edi&shy;tor";					break;
		case "Blocking/Deblocking":			$erg = "Blocking/Deblocking";								break;
		case "Compression":					$erg = "Compres&shy;sion";									break;
		case "Computerism<br>or<br>Dave&rsquo;s":	$erg = "Com&shy;pute&shy;rism<br>or<br>Dave&rsquo;s";	break;
		case "Corruptions":					$erg = "Corrup&shy;tions";									break;
		case "Cotis-Blandford":				$erg = "Co&shy;tis-Bland&shy;ford";							break;
		case "Customising":					$erg = "Custo&shy;mising";									break;
		case "Deleterious":					$erg = "Dele&shy;terious";									break;
		case "Determining":					$erg = "Deter&shy;mining";									break;
		case "Development":					$erg = "Develop&shy;ment";									break;
		case "Disassembler":				$erg = "Dis&shy;as&shy;sembler";							break;
		case "ERWSMTFTH":					$erg = "ERWSM&shy;TFTH";									break;
		case "Econographics":				$erg = "Eco&shy;no&shy;gra&shy;phics";						break;
		case "Editor/Assembler":			$erg = "Edi&shy;tor/Assem&shy;bler";						break;
		case "Electronics":					$erg = "Elec&shy;tronics";									break;
		case "Engineering":					$erg = "Engi&shy;neering";									break;
		case "Enhancements":				$erg = "Enhance&shy;ments";									break;
		case "Explanation":					$erg = "Expla&shy;nation";									break;
		case "GEMPEN/DISKPEN":				$erg = "GEMPEN/DISKPEN";									break;
		case "Gemini/Henelec":				$erg = "Ge&shy;mi&shy;ni/Hen&shy;elec";						break;
		case "Hardware/Software":			$erg = "Hard&shy;ware/Soft&shy;ware";						break;
		case "Incompatibility":				$erg = "Incompati&shy;bility";								break;
		case "Incorporating":				$erg = "Incor&shy;po&shy;rating";							break;
		case "Installation":				$erg = "Instal&shy;lation";									break;
		case "Intelligent":					$erg = "Intel&shy;ligent";									break;
		case "Interfacing":					$erg = "Inter&shy;facing";									break;
		case "Interference":				$erg = "Inter&shy;ference";									break;
		case "International":				$erg = "Inter&shy;national";								break;
		case "Interpreter":					$erg = "Inter&shy;preter";									break;
		case "Introducing":					$erg = "Intro&shy;ducing";									break;
		case "Introduction":				$erg = "Intro&shy;duction";									break;
		case "Kenilworth<br>Explanation":	$erg = "Kenil&shy;worth<br>Expla&shy;nation";				break;
		case "Keyboard/Disk":				$erg = "Key&shy;board/Disk";								break;
		case "Maintenance":					$erg = "Mainte&shy;nance";									break;
		case "Microcomputer":				$erg = "Micro&shy;computer";								break;
		case "Microcomputers":				$erg = "Micro&shy;computers";								break;
		case "Microdigital":				$erg = "Micro&shy;digital";									break;
		case "Microdigital&rsquo;s":		$erg = "Micro&shy;digital&rsquo;s";							break;
		case "Modification":				$erg = "Modi&shy;fi&shy;cation";							break;
		case "Modifications":				$erg = "Modi&shy;fi&shy;cations";							break;
		case "Moonlanding":					$erg = "Moon&shy;landing";									break;
		case "Newbear/Cotis":				$erg = "New&shy;bear/Co&shy;tis";							break;
		case "Newsletters":					$erg = "News&shy;letters";									break;
		case "Printerface":					$erg = "Printer&shy;face";									break;
		case "Programmable":				$erg = "Pro&shy;gram&shy;mable";							break;
		case "Programmers":					$erg = "Pro&shy;gram&shy;mers";								break;
		case "Programmers\"":				$erg = "Pro&shy;gram&shy;mers\"";							break;
		case "Programming":					$erg = "Pro&shy;gram&shy;ming";								break;
		case "Prototyping":					$erg = "Proto&shy;typing";									break;
		case "Relocatable":					$erg = "Relo&shy;cata&shy;ble";								break;
		case "Specification":				$erg = "Specifi&shy;cation";								break;
		case "Talk<br>Transferring":		$erg = "Talk<br>Trans&shy;fer&shy;ring";					break;
		case "Teleprinter":					$erg = "Tele&shy;printer";									break;
		case "Transferring":				$erg = "Trans&shy;ferring";									break;
		case "Unambiguous":					$erg = "Un&shy;ambi&shy;guous";								break;
		case "Understanding":				$erg = "Under&shy;standing";								break;
		case "Undocumented":				$erg = "Undocu&shy;mented";									break;
		case "Video/Floppy":				$erg = "Vi&shy;deo/Flop&shy;py";							break;
		case "applications":				$erg = "appli&shy;cations";									break;
		case "comparative":					$erg = "compa&shy;rative";									break;
		case "compatibilities":				$erg = "compa&shy;tibilities";								break;
		case "compatibility":				$erg = "compa&shy;tibility";								break;
		case "competition":					$erg = "compe&shy;tition";									break;
		case "connections":					$erg = "connec&shy;tions";									break;
		case "corrections":					$erg = "correc&shy;tions";									break;
		case "description":					$erg = "des&shy;crip&shy;tion";								break;
		case "development":					$erg = "develop&shy;ment";									break;
		case "developments":				$erg = "develop&shy;ments";									break;
		case "differences":					$erg = "diffe&shy;rences";									break;
		case "disassembled":				$erg = "dis&shy;as&shy;sembled";							break;
		case "disassembler":				$erg = "dis&shy;as&shy;sembler";							break;
		case "documentation":				$erg = "docu&shy;men&shy;tation";							break;
		case "eliminators":					$erg = "elimi&shy;nators";									break;
		case "explanation":					$erg = "expla&shy;nation";									break;
		case "implemented":					$erg = "imple&shy;mented";									break;
		case "independent":					$erg = "inde&shy;pen&shy;dent";								break;
		case "instruction":					$erg = "instruc&shy;tion";									break;
		case "instructions":				$erg = "instruc&shy;tions";									break;
		case "intellectual":				$erg = "intel&shy;lectual";									break;
		case "intellectual<br>(Still":		$erg = "intel&shy;lectual<br>(Still";						break;
		case "intellectual<br>(an":			$erg = "intel&shy;lectual<br>(an";							break;
		case "introduction":				$erg = "intro&shy;duction";									break;
		case "involvement":					$erg = "in&shy;volve&shy;ment";								break;
		case "mathematics":					$erg = "mathe&shy;matics";									break;
		case "modification":				$erg = "modifi&shy;cation";									break;
		case "modifications":				$erg = "modifi&shy;cations";								break;
		case "multiplexer":					$erg = "multi&shy;plexer";									break;
		case "persecution":					$erg = "per&shy;se&shy;cution";								break;
		case "programming":					$erg = "program&shy;ming";									break;
		case "publications":				$erg = "publi&shy;cations";									break;
		case "readability":					$erg = "reada&shy;bility";									break;
		case "reassembled":					$erg = "re&shy;as&shy;sembled";								break;
		case "recommended":					$erg = "recom&shy;mended";									break;
		case "reliability":					$erg = "relia&shy;bility";									break;
		case "relocatable":					$erg = "relo&shy;catable";									break;
		case "savestrings":					$erg = "save&shy;strings";									break;
		case "subroutines":					$erg = "sub&shy;rou&shy;tines";								break;
		case "understanding":				$erg = "under&shy;standing";								break;
		case "wordprocessor":				$erg = "word&shy;pro&shy;cessor";							break;
		// Author
		case "B.W.Kernighan":				$erg = "B.&#x200b;W.&#x200b;Ker&shy;nig&shy;han";			break;
		case "Blackmore":					$erg = "Black&shy;more";									break;
		case "Clemmett":					$erg = "Clem&shy;mett";										break;
		case "Cockshott":					$erg = "Cock&shy;shott";									break;
		case "Doroszenko":					$erg = "Doros&shy;zenko";									break;
		case "Goldingham":					$erg = "Gol&shy;ding&shy;ham";								break;
		case "Greenhalgh":					$erg = "Green&shy;halgh";									break;
		case "Greenhalgh<br>David":			$erg = "Green&shy;halgh<br>David";							break;
		case "Gugenheim":					$erg = "Gugen&shy;heim";									break;
		case "Gutteridge":					$erg = "Gut&shy;te&shy;ridge";								break;
		case "Handerson":					$erg = "Han&shy;der&shy;son";								break;
		case "Hansellman":					$erg = "Han&shy;sell&shy;man";								break;
		case "Hanselman":					$erg = "Han&shy;sel&shy;man";								break;
		case "Hejlsberg":					$erg = "Hejls&shy;berg";									break;
		case "Henderson":					$erg = "Hen&shy;der&shy;son";								break;
		case "Johannessen":					$erg = "Johan&shy;nessen";									break;
		case "Lawrence":					$erg = "Law&shy;rence";										break;
		case "Lesiakowski":					$erg = "Lesia&shy;kowski";									break;
		case "Merseyside":					$erg = "Mersey&shy;side";									break;
		case "Merseyside":					$erg = "Mersey&shy;side";									break;
		case "Microcode":					$erg = "Micro&shy;code";									break;
		case "Mohamed":						$erg = "Moha&shy;med";										break;
		case "Parkinson":					$erg = "Par&shy;kin&shy;son";								break;
		case "Reddington":					$erg = "Red&shy;ding&shy;ton";								break;
		case "Richardson":					$erg = "Richard&shy;son";									break;
		case "Timeclaim":					$erg = "Time&shy;claim";									break;
		case "Weatherson-Roberts":			$erg = "Weather&shy;son-Roberts";							break;
		case "Whittaker":					$erg = "Whit&shy;taker";									break;
		case "Zienkiewicz":					$erg = "Zien&shy;kie&shy;wicz";								break;
		// Category
		case "Advertising":					$erg = "Ad&shy;ver&shy;ti&shy;sing";						break;
		case "Assembler":					$erg = "As&shy;sem&shy;bler";								break;
		case "Assembler<br>Basic":			$erg = "As&shy;sem&shy;bler<br>Basic";						break;
		case "Basic<br>Assembler":			$erg = "Basic<br>As&shy;sem&shy;bler";						break;
		case "Hardware":					$erg = "Hard&shy;ware";										break;
		case "Hardware<br>Assembler":		$erg = "Hard&shy;ware<br>As&shy;sem&shy;bler";				break;
		case "Hardware<br>Basic":			$erg = "Hard&shy;ware<br>Basic";							break;
		case "Review":						$erg = "Re&shy;view";										break;
		case "Software":					$erg = "Soft&shy;ware";										break;
		// Default
		default:							$erg = $value;												break;
		}
		$erg = str_replace("/", "/&#x200b;", $erg);
		$erg = str_replace(".", ".&#x200b;", $erg);
		$eco = $eco." ".$erg;
	}
	$eco = trim($eco);
	echo($eco);
}

//---------------------------------------------------------------------------

function trMagazine($magazine, $issue, $number, $name, $offset, $path, $topic, $author, $category, $page)
{
//	$server = 'https://80bus.co.uk.mirror.jloh.de';
//	$pdfPage = $page + $offset;
	$pathPage = sprintf("%02d", $page);

	echo "\t<tr>\n";
	echo "\t\t".'<td class="clTitle">';
	echo "<a href=\"";
//	echo "$server/publications/magazines/$name$number.pdf#page=$pdfPage";
	echo "$path/$pathPage/";
//	echo "\" target=\"_blank";
	echo "\">";
		echoShy($topic);
		echo "</a></td>\n";
	echo "\t\t<td class=\"clAuthor\">"; echoShy($author); echo "</td>\n";
	echo "\t\t<td class=\"clCategory\">"; echoShy($category); echo "</td>\n";
	echo "\t\t<td class=\"clMagazine\">$magazine</td>\n";
	echo "\t\t<td class=\"clIssue\">$issue</td>\n";
	echo "\t\t<td class=\"clPage\">$page</td>\n";
	echo "\t</tr>\n";
}

//---------------------------------------------------------------------------

?>

<!-- /top.php -->
