<?php
	if (!isset($toctext)) {
		$toctext = false;
	}

	require			( "$tppath/../../SetIncludePath.php");
	SetIncludePath	( "$tppath/../..");
//	$include_path	= "$tppath/../../../cgi-bin";
	if ($toctext) {
		$gHtmlRoot	= "$tppath/../../../../..";
	} else {
		$gHtmlRoot	= "$tppath/../..";
	}
	require "$include_path/global.php";
	$table = dirname(__FILE__) . "/gap.php";
	httpLastModified(array_merge(get_included_files(), array($navi_head_php, $navi_body_php, $navi_footer_php, $table)), $lastModified);
	$nascom = true;
	include "$navi_head_php";
	$lang = "en";
//	$width = 720;
?>

	<!-- top.php / $Date: 2024-10-09 18:59:25 +0200 (Mi, 09. Okt 2024) $ -->

	<meta name="keywords" content="Table of Contents,
		Nascom Magazines, INMC News, INMC 80 News, Micropower, Nascom Newsletter, 80-Bus News, Scorpio News,
		Nascom 1, Nascom 2">
<?php
	$titleClean = $title;
	$titleClean = str_replace("&shy;", "", $titleClean);
//	$titleClean = str_replace("&middot;", "", $titleClean);
	echo "\t<title>$titleClean";
	if (isset($issue)) echo " &ndash; $issue";
	echo " &ndash; Table of Contents";
	echo "</title>\n";
	echo "\t<!-- $lastModified -->\n";

	include "$navi_body_php";

	$naviBottom = "";
	$naviBottom
	.=	navBottom("datenschutzerklaerung", "Privacy Statement")
	.	navBottom("impressum", "Imprint");
?>
<div lang="en">

<?php
	$t0s = "<a href=\"$gHtmlRoot/nascom/magazines/$post\">";					$t0e = "</a>";
	$t1s = "<a href=\"$gHtmlRoot/nascom/magazines/inmc-news/$post\">";			$t1e = "</a>";
	$t2s = "<a href=\"$gHtmlRoot/nascom/magazines/inmc-80-news/$post\">";		$t2e = "</a>";
	$t3s = "<a href=\"$gHtmlRoot/nascom/magazines/80-bus-news/$post\">";		$t3e = "</a>";
	$t4s = "<a href=\"$gHtmlRoot/nascom/magazines/micropower/$post\">";			$t4e = "</a>";
	$t5s = "<a href=\"$gHtmlRoot/nascom/magazines/nascom-newsletter/$post\">";	$t5e = "</a>";
	$t6s = "<a href=\"$gHtmlRoot/nascom/magazines/scorpio-news/$post\">";		$t6e = "</a>";

	if (!isset($path)
	||	isset($pict)
	) {
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

<table class="style-table-zeropadding content-navi" style="width:100%">
	<tr>
		<td><?php echo $t1s."INMC<br>News$t1e"; ?></td>
		<td style="text-align:center"><br>&nbsp;</td>
		<td><?php echo $t2s."INMC 80<br>News$t2e"; ?></td>
		<td style="text-align:center"><br>&nbsp;</td>
		<td><?php echo $t3s."80-Bus<br>News$t3e"; ?></td>
		<td style="text-align:center"><br>&nbsp;</td>
		<td><?php echo $t6s."Scor&shy;pio<br>News$t6e"; ?></td>
		<td style="text-align:center"><br>&nbsp;</td>
		<td><?php echo $t4s."<br>Micro&shy;power$t4e"; ?></td>
		<td style="text-align:center"><br>&nbsp;</td>
		<td><?php echo $t5s."Nas&shy;com<br>News&shy;letter$t5e"; ?></td>
		<td style="text-align:center"><br>&nbsp;</td>
		<td><?php echo $t0s."Nas&shy;com<br>Maga&shy;zines$t0e"; ?></td>
	</tr>
</table>

<?php
	echo "<!-- Linie über ganze Spalte --><table style=\"width: 100%\"><tr><td style=\"border-top:1px solid #000\"><p style=\"font-size:1px\">&nbsp;</p></td></tr><tr><td style=\"height: 2px\"></td></tr></table>\n";

	$page = 1;
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
					$toctext ? "../../../" : ""	// $imagepath
				,	""	// $year
				,	""	// $issue
				,	$page	// $page
				,	sprintf("%scover.jpeg", $path)	// $imagename
				,	""	// $style
				,	""	// $class
				,	""	// $append
				,	($toctext ? "../" : "") . sprintf("%02d/", $first) . ($toctext ? "text/" : "")	// $link
				);
			}
		}
		echo "<br>\n";
	}

	echo "</div>\n";
	echo "</div>\n\n";
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
//	$count = count($arr);
	$eco = "";
	foreach ($arr as $value) {
		switch($value) {
		// Topic
		case "(Centronics":					$erg = "(Cen&shy;tro&shy;nics";								break;
		case "(introduction)":				$erg = "(intro&shy;duction)";								break;
		case "Advertisements":				$erg = "Adver&shy;tisements";								break;
		case "Alternative":					$erg = "Alter&shy;native";									break;
		case "Arithmetic":					$erg = "Arith&shy;me&shy;tic";								break;
		case "Assembler/Editor":			$erg = "As&shy;sem&shy;bler/Edi&shy;tor";					break;
		case "Assemblers":					$erg = "As&shy;sem&shy;blers";								break;
		case "Benchmarks":					$erg = "Bench&shy;marks";									break;
		case "Blocking/&#x200b;Deblocking":	$erg = "Blo&shy;cking/De&shy;blo&shy;cking";				break;
		case "Blocking/Deblocking":			$erg = "Blo&shy;cking/De&shy;blo&shy;cking";				break;
		case "Centronics":					$erg = "Cen&shy;tro&shy;nics";								break;
		case "Characters":					$erg = "Cha&shy;rac&shy;ters";								break;
		case "Cigarettes":					$erg = "Ci&shy;ga&shy;rettes";								break;
		case "Cometition-swaet":			$erg = "Come&shy;ti&shy;tion-swaet";						break;
		case "Compatible":					$erg = "Com&shy;pa&shy;tible";								break;
		case "Compression":					$erg = "Compres&shy;sion";									break;
		case "Computerism<br>or<br>Dave&rsquo;s":	$erg = "Com&shy;pute&shy;rism<br>or<br>Dave&rsquo;s";	break;
		case "Conditioal":					$erg = "Con&shy;di&shy;tioal";								break;
		case "Connection<br>Real":			$erg = "Con&shy;nec&shy;tion<br>Real";						break;
		case "Controlled":					$erg = "Con&shy;trol&shy;led";								break;
		case "Controller":					$erg = "Con&shy;trol&shy;ler";								break;
		case "Conversion":					$erg = "Con&shy;ver&shy;sion";								break;
		case "Converting":					$erg = "Con&shy;ver&shy;ting";								break;
		case "Correcting":					$erg = "Cor&shy;rec&shy;ting";								break;
		case "Corruptions":					$erg = "Corrup&shy;tions";									break;
		case "Cotis-Blandford":				$erg = "Co&shy;tis-Bland&shy;ford";							break;
		case "Customising":					$erg = "Custo&shy;mising";									break;
		case "Deleterious":					$erg = "Dele&shy;terious";									break;
		case "Determining":					$erg = "Deter&shy;mining";									break;
		case "Developing":					$erg = "De&shy;vel&shy;oping";								break;
		case "Development":					$erg = "Develop&shy;ment";									break;
		case "Diary<br>Winchester":			$erg = "Diary<br>Win&shy;ches&shy;ter";						break;
		case "Dictionary":					$erg = "Dic&shy;tio&shy;nary";								break;
		case "Disassembler":				$erg = "Dis&shy;as&shy;sembler";							break;
		case "ERWSMTFTH":					$erg = "ERWSM&shy;TFTH";									break;
		case "Econographics":				$erg = "Eco&shy;no&shy;gra&shy;phics";						break;
		case "Editor/Assembler":			$erg = "Edi&shy;tor/Assem&shy;bler";						break;
		case "Electronics":					$erg = "Elec&shy;tronics";									break;
		case "Engineering":					$erg = "Engi&shy;neering";									break;
		case "Enhancements":				$erg = "Enhance&shy;ments";									break;
		case "Explanation":					$erg = "Expla&shy;nation";									break;
		case "Factorials":					$erg = "Fac&shy;to&shy;ri&shy;als";							break;
		case "Formatting":					$erg = "For&shy;mat&shy;ting";								break;
		case "GEMPEN/DISKPEN":				$erg = "GEMPEN/DISKPEN";									break;
		case "Gemini/Henelec":				$erg = "Ge&shy;mi&shy;ni/Hen&shy;elec";						break;
		case "Generators":					$erg = "Ge&shy;ne&shy;ra&shy;tors";							break;
		case "Hardware/Software":			$erg = "Hard&shy;ware/Soft&shy;ware";						break;
		case "Impersonal":					$erg = "Im&shy;per&shy;sonal";								break;
		case "Incompatibility":				$erg = "Incompati&shy;bility";								break;
		case "Incorporating":				$erg = "Incor&shy;po&shy;rating";							break;
		case "Installation":				$erg = "Instal&shy;lation";									break;
		case "Installing":					$erg = "In&shy;stal&shy;ling";								break;
		case "Intelligent":					$erg = "Intel&shy;ligent";									break;
		case "Interfacing":					$erg = "Inter&shy;facing";									break;
		case "Interference":				$erg = "Inter&shy;ference";									break;
		case "International":				$erg = "In&shy;ter&shy;na&shy;tio&shy;nal";								break;
		case "Interpreter":					$erg = "Inter&shy;preter";									break;
		case "Introducing":					$erg = "Intro&shy;ducing";									break;
		case "Introduction":				$erg = "Intro&shy;duction";									break;
		case "Kenilworth":					$erg = "Ke&shy;nil&shy;worth";								break;
		case "Kenilworth<br>Explanation":	$erg = "Kenil&shy;worth<br>Expla&shy;nation";				break;
		case "Keyboard/Disk":				$erg = "Key&shy;board/Disk";								break;
		case "MT-Typewriter":				$erg = "MT-Type&shy;wri&shy;ter";							break;
		case "Maintenance":					$erg = "Mainte&shy;nance";									break;
		case "Mastermind":					$erg = "Mas&shy;ter&shy;mind";								break;
		case "Memorandom":					$erg = "Me&shy;mo&shy;ran&shy;dom";							break;
		case "Microcomputer":				$erg = "Micro&shy;computer";								break;
		case "Microcomputers":				$erg = "Micro&shy;computers";								break;
		case "Microdigital":				$erg = "Micro&shy;digital";									break;
		case "Microdigital&rsquo;s":		$erg = "Micro&shy;digital&rsquo;s";							break;
		case "Micropower&rsquo;s":			$erg = "Mi&shy;cro&shy;po&shy;wer&rsquo;s";					break;
		case "Modification":				$erg = "Modi&shy;fi&shy;cation";							break;
		case "Modifications":				$erg = "Modi&shy;fi&shy;cations";							break;
		case "Moonlanding":					$erg = "Moon&shy;landing";									break;
		case "Newbear/Cotis":				$erg = "New&shy;bear/Co&shy;tis";							break;
		case "Newsletters":					$erg = "News&shy;letters";									break;
		case "Printerface":					$erg = "Printer&shy;face";									break;
		case "Processors":					$erg = "Pro&shy;ces&shy;sors";								break;
		case "Programmable":				$erg = "Pro&shy;gram&shy;mable";							break;
		case "Programmer":					$erg = "Pro&shy;gram&shy;mer";								break;
		case "Programmers":					$erg = "Pro&shy;gram&shy;mers";								break;
		case "Programmers\"":				$erg = "Pro&shy;gram&shy;mers\"";							break;
		case "Programming":					$erg = "Pro&shy;gram&shy;ming";								break;
		case "Protection":					$erg = "Pro&shy;tec&shy;tion";								break;
		case "Prototyping":					$erg = "Proto&shy;typing";									break;
		case "Redundancy":					$erg = "Re&shy;dun&shy;dancy";								break;
		case "Relocatable":					$erg = "Relo&shy;cata&shy;ble";								break;
		case "Retrieving":					$erg = "Re&shy;trie&shy;ving";								break;
		case "ScreenCopy<br>send":			$erg = "Screen&shy;Copy<br>send";							break;
		case "Scurrilous":					$erg = "Scur&shy;ri&shy;lous";								break;
		case "Simplified":					$erg = "Sim&shy;pli&shy;fied";								break;
		case "Situations":					$erg = "Situ&shy;ations";									break;
		case "Snowdinger":					$erg = "Snow&shy;din&shy;ger";								break;
		case "Snowdinger<br>a":				$erg = "Snowdinger<br>a";									break;
		case "Specification":				$erg = "Specifi&shy;cation";								break;
		case "Submitting":					$erg = "Sub&shy;mit&shy;ting";								break;
		case "Supplement":					$erg = "Supp&shy;le&shy;ment";								break;
		case "Talk<br>Transferring":		$erg = "Talk<br>Trans&shy;fer&shy;ring";					break;
		case "Technology":					$erg = "Tech&shy;no&shy;lo&shy;gy";							break;
		case "Teleprinter":					$erg = "Tele&shy;printer";									break;
		case "Traitorous":					$erg = "Tra&shy;ito&shy;rous";								break;
		case "Transferring":				$erg = "Trans&shy;ferring";									break;
		case "Unambiguous":					$erg = "Un&shy;ambi&shy;guous";								break;
		case "Understanding":				$erg = "Under&shy;standing";								break;
		case "Undocumented":				$erg = "Undocu&shy;mented";									break;
		case "Video/Floppy":				$erg = "Vi&shy;deo/Flop&shy;py";							break;
		case "Winchester":					$erg = "Win&shy;ches&shy;ter";								break;
		case "\"Compatible\"":				$erg = "\"Com&shy;pa&shy;ti&shy;ble\"";						break;
		case "addressing":					$erg = "ad&shy;dres&shy;sing";								break;
		case "applications":				$erg = "appli&shy;cations";									break;
		case "arithmetic":					$erg = "arith&shy;me&shy;tic";								break;
		case "characters":					$erg = "cha&shy;rac&shy;ters";								break;
		case "commercial":					$erg = "com&shy;mer&shy;cial";								break;
		case "comparative":					$erg = "compa&shy;rative";									break;
		case "comparison":					$erg = "com&shy;par&shy;ison";								break;
		case "compatibilities":				$erg = "com&shy;pa&shy;ti&shy;bi&shy;li&shy;ties";			break;
		case "compatibility":				$erg = "compa&shy;tibility";								break;
		case "competition":					$erg = "compe&shy;tition";									break;
		case "configured":					$erg = "con&shy;fi&shy;gured";								break;
		case "connection":					$erg = "con&shy;nec&shy;tion";								break;
		case "connections":					$erg = "connec&shy;tions";									break;
		case "controller":					$erg = "con&shy;trol&shy;ler";								break;
		case "conversion":					$erg = "con&shy;ver&shy;sion";								break;
		case "correction":					$erg = "cor&shy;rec&shy;tion";								break;
		case "correction)":					$erg = "cor&shy;rec&shy;tion)";								break;
		case "corrections":					$erg = "cor&shy;rec&shy;tions";								break;
		case "definitive":					$erg = "de&shy;fi&shy;ni&shy;tive";							break;
		case "description":					$erg = "des&shy;crip&shy;tion";								break;
		case "development":					$erg = "develop&shy;ment";									break;
		case "developments":				$erg = "develop&shy;ments";									break;
		case "differences":					$erg = "diffe&shy;rences";									break;
		case "disassembled":				$erg = "dis&shy;as&shy;sembled";							break;
		case "disassembler":				$erg = "dis&shy;as&shy;sembler";							break;
		case "documentation":				$erg = "docu&shy;men&shy;tation";							break;
		case "eliminator":					$erg = "eli&shy;mi&shy;na&shy;tor";							break;
		case "eliminator)":					$erg = "eli&shy;mi&shy;na&shy;tor)";						break;
		case "eliminators":					$erg = "elimi&shy;nators";									break;
		case "encryption":					$erg = "en&shy;cryp&shy;tion";								break;
		case "explanation":					$erg = "expla&shy;nation";									break;
		case "extensions":					$erg = "ex&shy;ten&shy;sions";								break;
		case "implemented":					$erg = "imple&shy;mented";									break;
		case "independent":					$erg = "inde&shy;pen&shy;dent";								break;
		case "instruction":					$erg = "instruc&shy;tion";									break;
		case "instructions":				$erg = "instruc&shy;tions";									break;
		case "intellectual":				$erg = "intel&shy;lectual";									break;
		case "intellectual<br>(Still":		$erg = "intel&shy;lectual<br>(Still";						break;
		case "intellectual<br>(an":			$erg = "intel&shy;lectual<br>(an";							break;
		case "interrupts":					$erg = "in&shy;ter&shy;rupts";								break;
		case "introduction":				$erg = "intro&shy;duction";									break;
		case "involvement":					$erg = "in&shy;volve&shy;ment";								break;
		case "management":					$erg = "ma&shy;na&shy;ge&shy;ment";							break;
		case "mathematics":					$erg = "mathe&shy;matics";									break;
		case "modification":				$erg = "modifi&shy;cation";									break;
		case "modifications":				$erg = "modifi&shy;cations";								break;
		case "multiplexer":					$erg = "multi&shy;plexer";									break;
		case "persecution":					$erg = "per&shy;se&shy;cution";								break;
		case "production":					$erg = "pro&shy;duc&shy;tion";								break;
		case "programmer":					$erg = "pro&shy;gram&shy;mer";								break;
		case "programming":					$erg = "program&shy;ming";									break;
		case "protection":					$erg = "pro&shy;tec&shy;tion";								break;
		case "publications":				$erg = "publi&shy;cations";									break;
		case "readability":					$erg = "reada&shy;bility";									break;
		case "reassembled":					$erg = "re&shy;as&shy;sembled";								break;
		case "recommended":					$erg = "recom&shy;mended";									break;
		case "reliability":					$erg = "relia&shy;bility";									break;
		case "relocatable":					$erg = "relo&shy;catable";									break;
		case "savestrings":					$erg = "save&shy;strings";									break;
		case "statements":					$erg = "state&shy;ments";									break;
		case "structures":					$erg = "struc&shy;tures";									break;
		case "subroutine":					$erg = "sub&shy;rou&shy;tine";								break;
		case "subroutines":					$erg = "sub&shy;rou&shy;tines";								break;
		case "techniques":					$erg = "tech&shy;niques";									break;
		case "themselves":					$erg = "them&shy;selves";									break;
		case "understanding":				$erg = "under&shy;standing";								break;
		case "wordprocessor":				$erg = "word&shy;pro&shy;cessor";							break;
		// Author
		case "B.W.Kernighan":				$erg = "B.W.Ker&shy;nig&shy;han";							break;
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
		case "Advertisement":				$erg = "Ad&shy;ver&shy;tise&shy;ment";						break;
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

function trMagazine($magazine, $issue, $number, $name, $offset, $path, $topic, $author, $category, $page, $article = 1)
{
	global $trLink;
	global $toctext;
	$pathPage = sprintf("%02d", $page);

	echo "\t<tr>\n";
	echo "\t\t".'<td class="clTitle">';

	echo "<a href=\"";
	if ($toctext) {
		echo "..";
		$trLink = "text";
	} else {
		echo "$path";
	}
	echo "/$pathPage/";
	if ($trLink == "text") {
		echo "text/#article$article";
	}
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
