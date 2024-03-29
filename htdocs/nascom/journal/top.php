<?php
	$include_path = "$tppath/../../../cgi-bin";
	if ($tail == "/") {
		$gHtmlRoot = "$tppath/../..";
	} else if ($tail == "/text/") {
		if (isset($path)) {
			$gHtmlRoot = "$tppath/$path../..";	// http://nascom-magazines.jloh.de/new/nascom/journal/80/00/text/
		} else {
			$gHtmlRoot = "$tppath/../..";		// http://nascom-magazines.jloh.de/new/nascom/journal/80/text/
		}
	} else {
		$gHtmlRoot = "$tppath/../../..";
	}
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
//	echo "<!-- tppath:$tppath tail:$tail -->\n";
?>

	<!-- top.php / $Date: 2024-03-29 15:17:27 +0100 (Fr, 29. Mrz 2024) $ -->

	<meta name="keywords" content="Inhaltsverzeichnis,
		Nascom Journal, 80-Bus Journal,
		Nascom Computer, Nascom 1, Nascom 2">
<?php
	echo "\t<title>$title";
	if (isset($issue)) echo " &ndash; $issue";
	echo " &ndash; Inhaltsverzeichnis</title>\n";
	echo "\t<!-- $lastModified -->\n";
	include "$navi_body_php";

	$t00s = "<a href=\"$gHtmlRoot/nascom/journal$tail\">";		$t00e = "</a>";
	$t80s = "<a href=\"$gHtmlRoot/nascom/journal/80$tail\">";	$t80e = "</a>";
	$t81s = "<a href=\"$gHtmlRoot/nascom/journal/81$tail\">";	$t81e = "</a>";
	$t82s = "<a href=\"$gHtmlRoot/nascom/journal/82$tail\">";	$t82e = "</a>";
	$t83s = "<a href=\"$gHtmlRoot/nascom/journal/83$tail\">";	$t83e = "</a>";
	$t84s = "<a href=\"$gHtmlRoot/nascom/journal/84$tail\">";	$t84e = "</a>";
	$t85s = "<a href=\"$gHtmlRoot/nascom/journal/85$tail\">";	$t85e = "</a>";
	$tnjs = $tnje = $tb8s = $tb8e = "";

	if (isset($issue)) {
		switch ($issue) {
		case "Jahrgang 1980":	$t80s = $tnjs = "<b>";	$t80e = $tnje = "</b>";	break;
		case "Jahrgang 1981":	$t81s = $tnjs = "<b>";	$t81e = $tnje = "</b>";	break;
		case "Jahrgang 1982":	$t82s = $tnjs = "<b>";	$t82e = $tnje = "</b>";	break;
		case "Jahrgang 1983":	$t83s = $tb8s = "<b>";	$t83e = $tb8e = "</b>";	break;
		case "Jahrgang 1984":	$t84s = $tb8s = "<b>";	$t84e = $tb8e = "</b>";	break;
		case "Jahrgang 1985":	$t85s = $tb8s = "<b>";	$t85e = $tb8e = "</b>";	break;
		default:
			switch ($title) {
			case "Nascom Journal":      $tnjs = "<b>";	        $tnje = "</b>";	break;
			case "80-Bus Journal":      $tb8s = "<b>";	        $tb8e = "</b>";	break;
			}
		}
	} else {
								$t00s = "<b>";			$t00e = "</b>";
	}
?>

<table class="style-table-zeropadding content-navi" style="width:100%">
	<tr>
		<td colspan=5><?php echo $tnjs."Nascom Journal$tnje"; ?></td>
		<td rowspan=2>&nbsp;</td>
		<td colspan=5><?php echo $tb8s."80-Bus Journal$tb8e"; ?></td>
		<td rowspan=2>&nbsp;</td>
		<td rowspan=2><?php echo $t00s."Gesamt-Inhalts&shy;verzeichnis$t00e"; ?></td>
	</tr>
	<tr>
		<td><?php echo $t80s."1980$t80e"; ?></td>
		<td>&nbsp;</td>
		<td><?php echo $t81s."1981$t81e"; ?></td>
		<td>&nbsp;</td>
		<td><?php echo $t82s."1982$t82e"; ?></td>
		<td><?php echo $t83s."1983$t83e"; ?></td>
		<td>&nbsp;</td>
		<td><?php echo $t84s."1984$t84e"; ?></td>
		<td>&nbsp;</td>
		<td><?php echo $t85s."1985$t85e"; ?></td>
	</tr>
</table>

<?php
	echo "<!-- Linie über ganze Spalte --><table style=\"width: 100%\"><tr><td style=\"border-top:1px solid #000\"><p style=\"font-size:1px\">&nbsp;</p></td></tr><tr><td style=\"height: 2px\"></td></tr></table>\n";

	if ($title == "Nascom Journal"
	&&	$issue == "4/81 5"
	) {
		$page = 0;
	} else {
		$page = 1;
	}

	echo "<div class=\"row\">\n";
	if (isset($imgName)
	||	!isset($path)
	) {
		echo "\t<div class=\"col-12\">\n";
	} else {
		echo "\t<div class=\"col-8\">\n";
	}

	if (isset($imgName)) {
		echo "\t\t<h1 id=\"head\">\n\t\t\t";
		sscanf($imgName, "/%2s/%2s/Image-%2s-%d.jpeg", $year, $issuex, $page, $idx);
//		echo "<!-- $year, $issuex, $page -->\n";
		imageinsert(
			""
		,	$year, $issuex, $page
		,	$tppath.$imgName
//		,	"margin-top: 0.25em"
		);
		echo "\t\t</h1>\n";
	} else {
		echo "\t\t<h1 id=\"head\">$title</h1>\n";
	}
	if (isset($issue) && $issue != "") {
		echo "\t\t<h2>$issue</h2>\n";
		if (!isset($imgName)) {
			echo "<br>\n";
		}
	}
	if (isset($desc)) echo "\t\t<p class=\"hyphenate\">\n\t\t\t$desc<br><br>\n\t\t</p>\n";
	echo "\t\t<h3 style=\"margin-bottom:0\">Inhaltsverzeichnis</h3><br>\n";

	if (isset($imgName)) {
	} else if (isset($path)) {
		echo "\t</div>\n\t<div class=\"col-4\">\n";
//		echo "\t\t<table style=\"border: 1px solid #000;\"><tr><td style=\"padding: 0\">\n\t\t\t";
//		echo '<a href="' . sprintf($path . "%02d$tail", $page) . '">';
		imageRight(
			$path
		,	"", $issue, $page
		,	sprintf("thumb/%02d.gif", $page)
		,	""// style
		,	""// class
		,	""// append
		,	sprintf($path . "%02d$tail", $page)// link
		);
//		echo "</a>";
//		echo "\n\t\t</td></tr></table>";
		echo "<br>\n";
	}
	echo "\t</div>\n</div>\n\n";

?>
<table
	class="content hyphenate"
	style="
		border-bottom:	1px solid #000;
		border-left:	1px solid #000;
		border-right:	1px solid #000;
		width:			100%;
	"
>
	<colgroup>
		<col style="width:30%">
		<col style="width:20%">
		<col>
		<col>
		<col style="text-align:right">
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
		case "(Laufwerkstest)":					$erg = "(Lauf&shy;werks&shy;test)";							break;
		case "(Produktbeschreibung)":			$erg = "(Produkt&shy;beschreibung)";						break;
		case "(Sprachausgabe)":					$erg = "(Sprach&shy;ausgabe)";								break;
		case "(Textanpassung)":					$erg = "(Text&shy;anpassung)";								break;
		case "Abenteuerspiel":					$erg = "Aben&shy;teu&shy;er&shy;spiel";						break;
		case "Adreßverwaltung":					$erg = "Adreß&shy;verwaltung";								break;
		case "Aussteuerungsmesser":				$erg = "Aus&shy;steuerungs&shy;messer";						break;
		case "BAUD-Fernschreibers":				$erg = "BAUD-Fern&shy;schrei&shy;bers";						break;
		case "Belagerungsspiel":				$erg = "Bela&shy;ge&shy;rungs&shy;spiel";					break;
		case "Bestellservice":					$erg = "Be&shy;stell&shy;ser&shy;vice";						break;
		case "Bestückungsplan":					$erg = "Bestückungs&shy;plan";								break;
		case "Betriebssysteme":					$erg = "Betriebs&shy;systeme";								break;
		case "Bezugsbedingungen":				$erg = "Bezugs&shy;bedingungen";							break;
		case "Bildschirmverwaltung":			$erg = "Bildschirm&shy;verwaltung";							break;
		case "Billigst-Speichererweiterung":	$erg = "Bil&ligst-Speicher&shy;erweiterung";				break;
		case "Busterminierung":					$erg = "Bus&shy;termi&shy;nierung";							break;
		case "Cassetteninterface":				$erg = "Cassetten&shy;interface";							break;
		case "Cassettenmonitor":				$erg = "Cassetten&shy;monitor";								break;
		case "Cassettenrecorder":				$erg = "Cassetten&shy;recorder";							break;
		case "Cassettenrekorder":				$erg = "Cassetten&shy;rekorder";							break;
		case "Centronix-Schnittstelle":			$erg = "Cen&shy;tro&shy;nix-Schnitt&shy;stel&shy;le";		break;
		case "Computergraphik":					$erg = "Compu&shy;ter&shy;graphik";							break;
		case "DEBUG-Verschiebungsvektor":		$erg = "DEBUG-Ver&shy;schie&shy;bungs&shy;vek&shy;tor";		break;
		case "Datenverwaltung":					$erg = "Daten&shy;ver&shy;wal&shy;tung";					break;
		case "Disassembler-Anpassung":			$erg = "Dis&shy;as&shy;sem&shy;bler-Anpas&shy;sung";		break;
		case "Disassemblers":					$erg = "Dis&shy;as&shy;sem&shy;blers";						break;
		case "Drehzahlmessung":					$erg = "Drehzahl&shy;messung";								break;
		case "Dreidimensionale":				$erg = "Drei&shy;dimen&shy;sionale";						break;
		case "Druckeranschluß":					$erg = "Drucker&shy;anschluß";								break;
		case "Druckerinterface":				$erg = "Drucker&shy;interface";								break;
		case "EMDOS-Floppyverwaltung":			$erg = "EMDOS-Floppy&shy;verwaltung";						break;
		case "Entfernungsberechnung":			$erg = "Entfernungs&shy;berechnung";						break;
		case "Erweiterungen":					$erg = "Er&shy;we&shy;ite&shy;run&shy;gen";					break;
		case "Erweiterungskarte":				$erg = "Erweiterungs&shy;karte";							break;
		case "Fernschreibers":					$erg = "Fern&shy;schrei&shy;bers";							break;
		case "Filterberechnung":				$erg = "Filter&shy;berechnung";								break;
		case "Floppy/Programmierbeistand":		$erg = "Floppy/Programmier&shy;beistand";					break;
		case "Floppyverwaltung":				$erg = "Floppy&shy;verwaltung";								break;
		case "Folienausverkauf":				$erg = "Folien&shy;ausverkauf";								break;
		case "Folienservice":					$erg = "Fo&shy;li&shy;en&shy;ser&shy;vice";					break;
		case "Formatierprogramm":				$erg = "Form&shy;at&shy;ier&shy;pro&shy;gramm";				break;
		case "Formulierungsautomat":			$erg = "Formu&shy;lierungs&shy;automat";					break;
		case "Fragebogenauswertung":			$erg = "Fragebogen&shy;auswertung";							break;
		case "Funktionsdarstellung":			$erg = "Funktions&shy;darstellung";							break;
		case "Funktionstaste":					$erg = "Funk&shy;tions&shy;tas&shy;te";						break;
		case "Funktionstaste/Repeat":			$erg = "Funk&shy;tions&shy;taste/Re&shy;peat";				break;
		case "Geldspielautomaten":				$erg = "Geld&shy;spiel&shy;auto&shy;maten";					break;
		case "Gemini-Sonderangebote":			$erg = "Gemini-Sonder&shy;angebote";						break;
		case "Gleichrichter-Platine":			$erg = "Gleich&shy;ric&shy;hter-Pla&shy;ti&shy;ne";			break;
		case "Grafikausdruck":					$erg = "Gra&shy;fik&shy;aus&shy;druck";						break;
		case "Grafikerweiterung":				$erg = "Gra&shy;fik&shy;er&shy;wei&shy;te&shy;rung";		break;
		case "Grafikroutinen":					$erg = "Gra&shy;fik&shy;rou&shy;ti&shy;nen";				break;
		case "Haushaltsbuchführung":			$erg = "Haus&shy;halts&shy;buch&shy;füh&shy;rung";			break;
		case "Hilfsprogramme":					$erg = "Hilfs&shy;programme";								break;
		case "Hochauflösende":					$erg = "Hoch&shy;auf&shy;lö&shy;sen&shy;de";				break;
		case "Inhaltsverzeichnis":				$erg = "Inhalts&shy;verzeichnis";							break;
		case "Inversionsprobleme":				$erg = "Inversions&shy;probleme";							break;
		case "Jahresinhaltsverzeichnis":		$erg = "Jahres&shy;inhalts&shy;verzeichnis";				break;
		case "Kalenderberechnung":				$erg = "Kalenders&shy;berechnung";							break;
		case "Kassettenspeicher":				$erg = "Kassetten&shy;speicher";							break;
		case "Kleinanzeigen":					$erg = "Klein&shy;an&shy;zei&shy;gen";						break;
		case "Kleinbuchstaben":					$erg = "Klein&shy;buch&shy;sta&shy;ben";					break;
		case "Klötzchengrafik":					$erg = "Klötzchen&shy;grafik";								break;
		case "Komprimiertes":					$erg = "Kom&shy;pri&shy;mier&shy;tes";						break;
		case "Konfigurationen":					$erg = "Konfi&shy;gurationen";								break;
		case "Korrekturvorschlag":				$erg = "Korrektur&shy;vorschlag";							break;
		case "Kurvendarstellung":				$erg = "Kurven&shy;dar&shy;stel&shy;lung";					break;
		case "Kurzinformationen":				$erg = "Kurz&shy;in&shy;for&shy;ma&shy;tio&shy;nen";		break;
		case "Leseranfragen":					$erg = "Le&shy;ser&shy;an&shy;fra&shy;gen";					break;
		case "Lottoprogramm":					$erg = "Lot&shy;to&shy;pro&shy;gramm";						break;
		case "Lottozahlengenerator":			$erg = "Lotto&shy;zahlen&shy;gene&shy;rator";				break;
		case "Manchesterformat":				$erg = "Manchester&shy;format";								break;
		case "Microcomputer":					$erg = "Micro&shy;computer";								break;
		case "Miniprogramme":					$erg = "Mini&shy;programme";								break;
		case "Mondlandespiel":					$erg = "Mond&shy;lande&shy;spiel";							break;
		case "Monitor-Umschaltkarte":			$erg = "Mo&shy;ni&shy;tor-Um&shy;schalt&shy;karte";			break;
		case "Monitorerweiterung":				$erg = "Monitor&shy;erweiterung";							break;
		case "Monitorprogramme":				$erg = "Monitor&shy;programme";								break;
		case "NASCOM-Sonderangebote":			$erg = "NASCOM-Sonder&shy;angebote";						break;
		case "NASPEN-Textverarbeitungssystems":	$erg = "NASPEN-Text&shy;ver&shy;ar&shy;bei&shy;tungs&shy;sys&shy;tems";	break;
		case "Nebenverdienst":					$erg = "Neben&shy;verdienst";								break;
		case "PIO-Erweiterungen":				$erg = "PIO-Er&shy;wei&shy;te&shy;run&shy;gen";				break;
		case "Platinenherstellung":				$erg = "Platinen&shy;herstellung";							break;
		case "Platinenservice":					$erg = "Platinen&shy;service";								break;
		case "Plotterprogramms":				$erg = "Plot&shy;ter&shy;pro&shy;gramms";					break;
		case "Plotterprogramms<!--":			$erg = "Plot&shy;ter&shy;pro&shy;gramms<!--";				break;
		case "Preisausschreiben":				$erg = "Preis&shy;aus&shy;schrei&shy;ben";					break;
		case "Preisausschreibens":				$erg = "Preis&shy;aus&shy;schrei&shy;bens";					break;
		case "Programmieren":					$erg = "Program&shy;mieren";								break;
		case "Programmiersprachen":				$erg = "Program&shy;mier&shy;spra&shy;chen";				break;
		case "Programmierung":					$erg = "Program&shy;mie&shy;rung";							break;
		case "Programmliste":					$erg = "Pro&shy;gram&shy;mlis&shy;te";						break;
		case "Programmlisting":					$erg = "Programm&shy;listing";								break;
		case "Reaktionstest":					$erg = "Reak&shy;tions&shy;test";							break;
		case "Reaktionszeitmesser":				$erg = "Reaktions&shy;zeit&shy;messer";						break;
		case "Redaktionsarbeit":				$erg = "Redaktions&shy;arbeit";								break;
		case "Regierungsspiel":					$erg = "Re&shy;gie&shy;rungs&shy;spiel";					break;
		case "Rekorder-Fernsteuerung":			$erg = "Re&shy;kor&shy;der-Fern&shy;steue&shy;rung";		break;
		case "Renumberprogramm":				$erg = "Re&shy;num&shy;ber&shy;pro&shy;gramm";				break;
		case "Schachprogramm":					$erg = "Schach&shy;pro&shy;gramm";							break;
		case "Schachprogramm<!--":				$erg = "Schach&shy;pro&shy;gramm<!--";						break;
		case "Schachversion":					$erg = "Schach&shy;ver&shy;sion";							break;
		case "Schreibmaschine":					$erg = "Schreib&shy;maschine";								break;
		case "Schreibmaschinen-Ansteuerung":	$erg = "Schreib&shy;maschinen-An&shy;steue&shy;rung";		break;
		case "Schreibmaschinentreiber":			$erg = "Schreib&shy;maschinen&shy;treiber";					break;
		case "Schwingkreisberechnung":			$erg = "Schwingkreis&shy;berechnung";						break;
		case "Softcontroller":					$erg = "Soft&shy;con&shy;trol&shy;ler";						break;
		case "Softwaretreiber":					$erg = "Software&shy;treiber";								break;
		case "Sonderangebot":					$erg = "Sonder&shy;angebot";								break;
		case "Sonderangebote":					$erg = "Sonder&shy;ange&shy;bote";							break;
		case "Sortieralgorithmen":				$erg = "Sortier&shy;algorithmen";							break;
		case "Sortierprogramm":					$erg = "Sor&shy;tier&shy;pro&shy;gramm";					break;
		case "Soundgenerator":					$erg = "Sound&shy;generator";								break;
		case "Soundgenerator-Platine":			$erg = "Sound&shy;generator-Platine";						break;
		case "Spacepotatoes":					$erg = "Space&shy;po&shy;ta&shy;toes";						break;
		case "Spannungsüberwachung":			$erg = "Spannungs&shy;überwachung";							break;
		case "Speichererweiterung":				$erg = "Spei&shy;cher&shy;er&shy;wei&shy;te&shy;rung";		break;
		case "Speichererweiterungen":			$erg = "Spei&shy;cher&shy;er&shy;wei&shy;te&shy;rungen";	break;
		case "Speicherfehler":					$erg = "Spei&shy;cher&shy;feh&shy;ler";						break;
		case "Speicherschutz":					$erg = "Spei&shy;cher&shy;schutz";							break;
		case "Sprachausgabe":					$erg = "Sprach&shy;aus&shy;gabe";							break;
		case "Spracherkennung":					$erg = "Sprach&shy;erkennung";								break;
		case "Sprachsynthese":					$erg = "Sprach&shy;syn&shy;the&shy;se";						break;
		case "Sprachsynthesizer":				$erg = "Sprach&shy;syn&shy;the&shy;si&shy;zer";				break;
		case "Stichwortsuche":					$erg = "Stich&shy;wort&shy;su&shy;che";						break;
		case "Streifenkiller":					$erg = "Strei&shy;fen&shy;kil&shy;ler";						break;
		case "Strichcodeprogramme":				$erg = "Strich&shy;code&shy;pro&shy;gram&shy;me";			break;
		case "Synchronisierung":				$erg = "Syn&shy;chro&shy;ni&shy;sie&shy;rung";				break;
		case "Systemtestprogramm":				$erg = "Sys&shy;tem&shy;test&shy;pro&shy;gramm";			break;
		case "Taschenrechner":					$erg = "Taschen&shy;rechner";								break;
		case "Tastaturabfrage":					$erg = "Tastatur&shy;abfrage";								break;
		case "Textverarbeitung":				$erg = "Text&shy;verarbeitung";								break;
		case "Typenraddrucker":					$erg = "Typenrad&shy;drucker";								break;
		case "Unterprogramm":					$erg = "Un&shy;ter&shy;pro&shy;gramm";						break;
		case "Unterprogramme":					$erg = "Un&shy;ter&shy;pro&shy;gram&shy;me";				break;
		case "Verbesserungen":					$erg = "Verbes&shy;serungen";								break;
		case "Vergleichsprogramm":				$erg = "Vergleichs&shy;pro&shy;gramm";						break;
		case "Verschiebungsvektor":				$erg = "Ver&shy;schie&shy;bungs&shy;vek&shy;tor";			break;
		case "Vertriebsstelle":					$erg = "Vertriebs&shy;stelle";								break;
		case "Videomonitoren":					$erg = "Video&shy;moni&shy;toren";							break;
		case "Videoprogramm":					$erg = "Video&shy;programm";								break;
		case "Winkelprogramm":					$erg = "Winkel&shy;programm";								break;
		case "ZEAP-Verschiebungsvektor":		$erg = "ZEAP-Ver&shy;schie&shy;bungs&shy;vek&shy;tor";		break;
		case "Zahlenwandlung":					$erg = "Zahlen&shy;wandlung";								break;
		case "Zeichengenerator":				$erg = "Zeichen&shy;generator";								break;
		case "Zeilennummern":					$erg = "Zei&shy;len&shy;num&shy;mern";						break;
		case "Zufallszahlen":					$erg = "Zu&shy;falls&shy;zah&shy;len";						break;
		case "Zustandsanzeige":					$erg = "Zustands&shy;anzeige";								break;
		case "Zweispaltiger":					$erg = "Zwei&shy;spal&shy;ti&shy;ger";						break;
		case "disassembliert":					$erg = "di&shy;sas&shy;sem&shy;bliert";						break;
		case "hochauflösenden":					$erg = "hoch&shy;auf&shy;lö&shy;sen&shy;den";				break;
		// Author
		case "Brockmöller":						$erg = "Brock&shy;möller";									break;
		case "Böttchers":						$erg = "Bött&shy;chers";									break;
		case "Christian":						$erg = "Chris&shy;ti&shy;an";								break;
		case "Christoph":						$erg = "Chris&shy;toph";									break;
		case "Constantin":						$erg = "Con&shy;stan&shy;tin";								break;
		case "Dietmann":						$erg = "Diet&shy;mann";										break;
		case "Digitaltechnik":					$erg = "Digital&shy;technik";								break;
		case "Emmelmann":						$erg = "Emmel&shy;mann";									break;
		case "Emmelmann<br>Karl":				$erg = "Emmel&shy;mann<br>Karl";							break;
		case "Gundermann":						$erg = "Gun&shy;der&shy;mann";								break;
		case "Hornburger":						$erg = "Horn&shy;burger";									break;
		case "Huntemann":						$erg = "Hunte&shy;mann";									break;
		case "Johannes":						$erg = "Johan&shy;nes";										break;
		case "Kastrup<br>Wolfgang":				$erg = "Kastrup<br>Wolf&shy;gang";							break;
		case "Kwasnitza":						$erg = "Kwas&shy;nitza";									break;
		case "Mombaur":							$erg = "Mom&shy;baur";										break;
		case "Poschmann":						$erg = "Posch&shy;mann";									break;
		case "Rüdebusch":						$erg = "Rüde&shy;busch";									break;
		case "Sauerbrey":						$erg = "Sauer&shy;brey";									break;
		case "Schneider":						$erg = "Schnei&shy;der";									break;
		case "Schreiner":						$erg = "Schrei&shy;ner";									break;
		case "Schuhmacher":						$erg = "Schuh&shy;macher";									break;
		case "Schulmeister":					$erg = "Schul&shy;meister";									break;
		case "Schweizer":						$erg = "Schwei&shy;zer";									break;
		case "Stegemann":						$erg = "Stege&shy;mann";									break;
		case "Systemtechnik":					$erg = "System&shy;technik";								break;
		case "Szymanski":						$erg = "Szy&shy;man&shy;ski";								break;
		case "Vermeulen":						$erg = "Ver&shy;meulen";									break;
		case "Vermeulen<br>Hans Rietveld":		$erg = "Ver&shy;meulen<br>Hans Rietveld";					break;
		case "Waltenberger":					$erg = "Wal&shy;ten&shy;ber&shy;ger";						break;
		case "Weiermann":						$erg = "Wei&shy;er&shy;mann";								break;
		case "Widmann":							$erg = "Wid&shy;mann";										break;
		case "Wolfgang":						$erg = "Wolf&shy;gang";										break;
		case "Wurditsch":						$erg = "Wur&shy;ditsch";									break;
		// Category	
		case "Anzeige":							$erg = "An&shy;zeige";										break;
		case "Applikation":						$erg = "Appli&shy;kation";									break;
		case "Assembler":						$erg = "Assem&shy;bler";									break;
		case "Assembler<br>Basic":				$erg = "Assem&shy;bler<br>Basic";							break;
		case "Assembler<br>Pascal":				$erg = "Assem&shy;bler<br>Pascal";							break;
		case "Basic<br>Assembler":				$erg = "Basic<br>Assem&shy;bler";							break;
		case "Basic<br>Hardware":				$erg = "Basic<br>Hard&shy;ware";							break;
		case "Basic<br>Pascal":					$erg = "Basic<br>Pascal";									break;
		case "Editorial":						$erg = "Edi&shy;torial";									break;
		case "Hardware":						$erg = "Hard&shy;ware";										break;
		case "Hardware<br>Assembler":			$erg = "Hard&shy;ware<br>Assem&shy;bler";					break;
		case "Hardware<br>Assembler<br>Basic":	$erg = "Hard&shy;ware<br>Assem&shy;bler<br>Basic";			break;
		case "Hardware<br>Basic":				$erg = "Hard&shy;ware<br>Basic";							break;
		case "Pascal":							$erg = "Pascal";											break;
		case "Pascal<br>Assembler":				$erg = "Pascal<br>Assem&shy;bler";							break;
		case "Software":						$erg = "Soft&shy;ware";										break;
		// Magazine	
		case "Nascom":							$erg = "Nas&shy;com";										break;
		case "Journal":							$erg = "Jour&shy;nal";										break;
		// Default	
		default:								$erg = $value;												break;
		}
		$erg = str_replace("/", "/&#x200b;", $erg);
		$erg = str_replace(".", ".&#x200b;", $erg);
		$eco = $eco." ".$erg;
	}
	$eco = trim($eco);
	echo($eco);
}

//---------------------------------------------------------------------------

function trJournal($path, $tail, $magazine, $title, $author, $category, $year, $issue, $page, $article=1)
{
	if ($title == "") {
		if ($category != "") {
			$title = $category;
		} else if ($author != "") {
			$title = $author;
		} else {
			$title = $issue;
		}
	}
	$page2 = str_pad($page, 2, "0", STR_PAD_LEFT);
	echo "\t<tr>\n";
	echo "\t\t".'<td class="clTitle">';
	if ($tail == "/text/") {	// text
		echo "<a href=\"$path$page2$tail"."#article$article\">"; echoShy($title); echo "</a>";
	} else if ($tail == "/") {	// graphic
		echo "<a href=\"$path$page2$tail#article\">"; echoShy($title); echo "</a>";
	} else {					// error
		echo "<a href=\"error/$path$page2$tail\">$title</a>";
	}
	echo "</td>\n";
	echo "\t\t".'<td class="clAuthor">'; echoShy($author); echo "</td>\n";
	echo "\t\t".'<td class="clCategory">'; echoShy($category); echo "</td>\n";
	echo "\t\t".'<td class="clMagazine">'; echoShy($magazine); echo"</td>\n";
	echo "\t\t".'<td class="clYear">'."$year</td>\n";
	echo "\t\t".'<td class="clIssue">'; echoShy($issue); echo "</td>\n";
	echo "\t\t".'<td class="clPage">'."$page</td>\n";
	echo "\t</tr>\n";
}

//---------------------------------------------------------------------------

?>

<!-- /top.php -->
