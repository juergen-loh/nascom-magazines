<?php
	require			( "../SetIncludePath.php");
	SetIncludePath	( "..");
//	$include_path	= "../../cgi-bin";
	$gHtmlRoot		= "..";
	require "$include_path/global.php";
	httpLastModified(array_merge(get_included_files(), array($navi_head_php, $navi_body_php, $navi_footer_php)), $lastModified);
	$nascom = true;
	include "$navi_head_php";
?>

	<meta name="keywords" content="Nascom Journal, 80-Bus Journal, Nascom Computer, Nascom 1, Nascom 2">
	<title>Nascom Journal &ndash; 80-Bus Journal</title>
	<!-- $Date: 2024-12-31 14:24:33 +0100 (Di, 31. Dez 2024) $ / <?php echo "$lastModified"; ?> -->

<?php include "$navi_body_php";	?>

<div class="row hyphenate">
<div class="col-<?php echo BootstrapTier(); ?>-6">

<h1 id="nascomjournal" class="FirstHeading">
<?php imageInsert("", "81", "07", "03", "journal/81/07/Image-03-1.jpeg"); echo "\n"; ?>
</h1>
<p>
Das Nascom&nbsp;Journal war eine Zeitschrift für die
<?php externalLink("Z80","",""); ?>-<?php externalLink("Einplatinencomputer"); ?>
<?php if (is_dir("1/")) echo '<a href="1/">'; ?>
Nascom&nbsp;1
<?php if (is_dir("1/")) echo '</a>'; ?> und Nascom&nbsp;2. Es wurde ab 
<a href="journal/80/00/01/text/#article1"><!--#head"-->Mai 1980</a> monatlich von
<?php externalLink("Michael Klein"); ?>
und seiner Firma
<?php externalLink("MK Systemtechnik","MK&nbsp;Systemtechnik"); ?>
herausgegeben. 
<a href="journal/82/12/02/text/#article1">Ende 1982</a>
wurde das Nascom&nbsp;Journal eingestellt.
</p>

</div>
<div class="col-<?php echo BootstrapTier(); ?>-6">

<h1 id="80busjournal" class="FirstHeading">
<?php imageInsert("", "83", "03", "02", "journal/83/03/Image-02-1.jpeg"); echo "\n"; ?>
</h1>
<p>
Nach dem Ende des Nascom&nbsp;Journals
gründete die damalige Redaktion 
<a href="journal/83/01/02/text/#article1">Anfang 1983</a>
das 80-Bus&nbsp;Journal.  Die Zielgruppe wurde
erweitert auf &bdquo;<span class="uppercase">Nascom, Gemini</span> und andere
Z80-Anwender&ldquo;.  Die letzte Ausgabe erschien im
<a href="journal/85/m3/02/text/#article1">Juni 1985</a>.
</p>

</div>
</div>

<br>

<div class="row">
<div class="col-<?php echo BootstrapTier(); ?>-12">

<h1>Heftarchiv</h1>

<p>
Die folgenden Hefte der beiden Zeitschriften sind erschienen:
</p>

<?php
function thumbInsert($year, $issue, $alt)
{
	global $nl;

	if ("$year-$issue" == "81-04") {
		$page = "00";
	} else {
		$page = "01";
	}

	$linkName  = "journal/$year/$issue/$page/text/";
//	$linkName  = "journal/$year/$issue/thumb/text/";
//	$linkName  = "journal/$year/$issue/thumb/";

	$imageName = "journal/$year/$issue/thumb/$page.gif";
	list($width, $height, $type, $attr) = getimagesize($imageName);
	{
		$newWidth  = 48;
		$newHeight = (int) (1.41 * $newWidth);
	}
	if ((int) $year <= 82) {
		$magazine = "Nascom Journal";
	} else {
		$magazine = "80-Bus Journal";
	}

//	echo "<div style=\"border: 1px solid #000; padding: 0\">";
	echo "<a href=\"$linkName\">";
	echo "<img src=\"$imageName\" width=$newWidth height=$newHeight title=\"$magazine$nl$alt\" alt=\"$magazine $alt\">";
	echo "</a>";
//	echo "</div>";
}
?>

<div class="table-responsive">
<table>
	<tr style="background-color:#E8E8E8">
		<th class="hefte">Jahrgang</th>
		<th class="hefte" style="text-align:center">Jan</th>
		<th class="hefte" style="text-align:center">Feb</th>
		<th class="hefte" style="text-align:center">Mär</th>
		<th class="hefte" style="text-align:center">Apr</th>
		<th class="hefte" style="text-align:center">Mai</th>
		<th class="hefte" style="text-align:center">Jun</th>
		<th class="hefte" style="text-align:center">Jul</th>
		<th class="hefte" style="text-align:center">Aug</th>
		<th class="hefte" style="text-align:center">Sep</th>
		<th class="hefte" style="text-align:center">Okt</th>
		<th class="hefte" style="text-align:center">Nov</th>
		<th class="hefte" style="text-align:center">Dez</th>
	</tr>
	<tr>
		<td class="hefte" style="text-align:center; vertical-align:middle"><a href="journal/80/text/" style="display:block"><br>1980<br><br></a></td>
		<td class="hefte"></td>
		<td class="hefte"></td>
		<td class="hefte"></td>
		<td class="hefte"></td>
		<td class="hefte"><?php thumbInsert("80", "00", "0/80"); ?></td>
		<td class="hefte"><?php thumbInsert("80", "01", "1/80"); ?></td>
		<td class="hefte"><?php thumbInsert("80", "02", "2/80"); ?></td>
		<td class="hefte"><?php thumbInsert("80", "03", "3/80"); ?></td>
		<td class="hefte"><?php thumbInsert("80", "04", "4/80"); ?></td>
		<td class="hefte"><?php thumbInsert("80", "05", "5/80"); ?></td>
		<td class="hefte"><?php thumbInsert("80", "06", "6/80".$nl."7/80"); ?></td>
		<td class="hefte"></td>
	</tr>
	<tr>
		<td class="hefte" style="text-align:center; vertical-align:middle"><a href="journal/81/text/" style="display:block"><br>1981<br><br></a></td>
		<td class="hefte"><?php thumbInsert("81", "01", "1/81"); ?></td>
		<td class="hefte"><?php thumbInsert("81", "02", "2/81"); ?></td>
		<td class="hefte"><?php thumbInsert("81", "03", "3/81"); ?></td>
		<td class="hefte"><?php thumbInsert("81", "04", "4/81".$nl."5"); ?></td>
		<td class="hefte"></td>
		<td class="hefte"><?php thumbInsert("81", "06", "Juni 1981".$nl."Ausgabe 6"); ?></td>
		<td class="hefte"><?php thumbInsert("81", "07", "Juli 1981".$nl."Ausgabe 7"); ?></td>
		<td class="hefte"><?php thumbInsert("81", "08", "August 1981".$nl."Ausgabe 8"); ?></td>
		<td class="hefte"><?php thumbInsert("81", "09", "September 1981".$nl."Ausgabe 9"); ?></td>
		<td class="hefte"><?php thumbInsert("81", "10", "Oktober 1981".$nl."Ausgabe 10"); ?></td>
		<td class="hefte"></td>
		<td class="hefte"><?php thumbInsert("81", "12", "Dezember 1981".$nl."Ausgabe 11/12"); ?></td>
	</tr>
	<tr>
		<td class="hefte" style="text-align:center; vertical-align:middle"><a href="journal/82/text/" style="display:block"><br>1982<br><br></a></td>
		<td class="hefte"><?php thumbInsert("82", "01", "Januar 1982".$nl."Ausgabe 1"); ?></td>
		<td class="hefte"><?php thumbInsert("82", "02", "Februar 1982".$nl."Ausgabe 2"); ?></td>
		<td class="hefte"><?php thumbInsert("82", "03", "März/April 1982".$nl."Ausgabe 3/4"); ?></td>
		<td class="hefte"></td>                                                                      
		<td class="hefte"><?php thumbInsert("82", "05", "Mai 1982".$nl."Ausgabe 5"); ?></td>
		<td class="hefte"><?php thumbInsert("82", "06", "Juni 1982".$nl."Ausgabe 6"); ?></td>
		<td class="hefte"><?php thumbInsert("82", "07", "Juli/August".$nl."Ausgabe 7/8"); ?></td>
		<td class="hefte"></td>                                                                      
		<td class="hefte"><?php thumbInsert("82", "09", "September 1982".$nl."Ausgabe 9"); ?></td>
		<td class="hefte"><?php thumbInsert("82", "10", "Oktober/November 1982".$nl."Ausgabe 10/11"); ?></td>
		<td class="hefte"></td>
		<td class="hefte"><?php thumbInsert("82", "12", "12/82"); ?></td>
	</tr>
	<tr>
		<td class="hefte" style="text-align:center; vertical-align:middle"><a href="journal/83/text/" style="display:block"><br>1983<br><br></a></td>
		<td class="hefte"><?php thumbInsert("83", "01", "Januar 1983".$nl."Ausgabe 1"); ?></td>
		<td class="hefte"><?php thumbInsert("83", "02", "Februar 1983".$nl."Ausgabe 2"); ?></td>
		<td class="hefte"><?php thumbInsert("83", "03", "März 1983".$nl."Ausgabe 3"); ?></td>
		<td class="hefte"><?php thumbInsert("83", "04", "April 1983".$nl."Ausgabe 4"); ?></td>
		<td class="hefte"><?php thumbInsert("83", "05", "Mai 1983".$nl."Ausgabe 5"); ?></td>
		<td class="hefte"><?php thumbInsert("83", "06", "Juni 1983".$nl."Ausgabe 6"); ?></td>
		<td class="hefte"><?php thumbInsert("83", "07", "Doppelheft Juli/Aug. 1983".$nl."Ausgabe 7/8"); ?></td>
		<td class="hefte"></td>
		<td class="hefte"><?php thumbInsert("83", "09", "September 1983".$nl."Ausgabe 9"); ?></td>
		<td class="hefte"></td>
		<td class="hefte"><?php thumbInsert("83", "11", "November 1983".$nl."Ausgabe 10/11"); ?></td>
		<td class="hefte"><?php thumbInsert("83", "12", "Dezember 1983".$nl."Ausgabe 12"); ?></td>
	</tr>
	<tr>
		<td class="hefte" style="text-align:center; vertical-align:middle"><a href="journal/84/text/" style="display:block"><br>1984<br><br></a></td>
		<td class="hefte"></td>
		<td class="hefte"><?php thumbInsert("84", "m1", "Mitteilungsblatt Nr. 1".$nl."Februar 1984"); ?></td>
		<td class="hefte"><?php thumbInsert("84", "01", "Jan/Feb/März 1984".$nl."Ausgabe 1"); ?></td>
		<td class="hefte"></td>
		<td class="hefte"></td>
		<td class="hefte"><?php thumbInsert("84", "02", "April/Mai/Juni 1984".$nl."Ausgabe 2"); ?></td>
		<td class="hefte"></td>
		<td class="hefte"><?php thumbInsert("84", "m2", "Mitteilungsblatt Nr.2".$nl."August 1984"); ?></td>
		<td class="hefte"><?php thumbInsert("84", "03", "Juli/Aug./September 1984".$nl."Ausgabe 3"); ?></td>
		<td class="hefte"></td>
		<td class="hefte"></td>
		<td class="hefte"><?php thumbInsert("84", "04", "Okt./Nov./Dezember 1984".$nl."Ausgabe 4"); ?></td>
	</tr>
	<tr>
		<td class="hefte" style="text-align:center; vertical-align:middle"><a href="journal/85/text/" style="display:block"><br>1985<br><br></a></td>
		<td class="hefte"></td>
		<td class="hefte"></td>
		<td class="hefte"></td>
		<td class="hefte"></td>
		<td class="hefte"></td>
		<td class="hefte"><?php thumbInsert("85", "m3", "Mitteilungsblatt Nr. 3".$nl."Juni 85"); ?></td>
		<td class="hefte"></td>
		<td class="hefte"></td>
		<td class="hefte"></td>
		<td class="hefte"></td>
		<td class="hefte"></td>
		<td class="hefte"></td>
	</tr>
</table>
</div>

</div>
</div>

<br>

<div class="row hyphenate">
<div class="col-<?php echo BootstrapTier(); ?>-12">

<div class="style-multi-column-2">
<p>
Alle Artikel können auch über das
<a href="journal/text/">Ge&shy;samt-In&shy;halts&shy;ver&shy;zeich&shy;nis</a>
gefunden werden.
</p>

<p>
Die Hefte liegen im Grafik-, Text- und PDF-Format vor.
Die <a href="journal/80/00/01/">Grafik-Version</a>
entstand direkt aus den
eingescannten Heften.  Um die Dateien klein zu halten,
wurde die Farbtiefe auf 1 Bit (schwarz/<?php spChar("zwsp"); ?>weiß) reduziert,
nur die wenigen
<a href="journal/82/05/15/">Fotos</a>
wurden auf 8 Bit (Graustufen) belassen.
Private Telefonnummern und Adressen wurden
<a href="journal/80/00/09/">unkenntlich</a>
gemacht.

Die <a href="journal/80/00/01/text/">Text-Version</a>
wurde mit einem <?php externalLink("OCR", "OCR-Programm"); ?>
aus den gescannten Seiten erzeugt,
<!-- (außer Grafiken und Programmlistings) -->
korrekturgelesen und in
<?php externalLink("HTML"); ?>
formatiert.

Das Ergebnis entspricht inhaltlich dem Original, weicht aber
in der Gestaltung etwas ab.

Die <a href="journal/pdf/80-00.pdf" download>PDF-Version</a>
fasst die Seiten der Grafik-Version heftweise zusammen.

Außerdem gibt es für jedes Heft noch eine Übersicht mit
<a href="journal/80/00/thumb/text/">Miniaturbildern</a>
(<?php externalLink("Vorschaubild", "Thumbnails", ""); ?>)
und ein
<a href="journal/80/00/text/">Inhaltsverzeichnis</a>.
</p>

<p>
In England, dem Mutterland des Nascom Computers, sind ebenfalls
<a href="magazines/issues/">Nascom-Magazine</a>
erschienen. Auch dazu gibt es ein
<a href="magazines/text/">Ge&shy;samt-In&shy;halts&shy;ver&shy;zeich&shy;nis</a>.
<!--
Für sie hat
< ?php externalLink("Mike Strange"); ?> die
<a href="magazines/">Inhaltsverzeichnisse</a>
gesammelt.
-->
</p>
</div>

</div>
</div>

<h1>Serien</h1>

<div class="row">
<div class="col-<?php echo BootstrapTier(); ?>-6">

<h2>Blue Label Software Pascal</h2>
<p>
<a href="journal/82/05/21/text/#article1">Teil 1</a><br>
<a href="journal/82/06/08/text/#article1">Teil 2</a><br>
<a href="journal/82/07/45/text/#article1">Teil 3</a><br>
<a href="journal/83/05/06/text/#article1">Teil 4</a><br>
</p>

<h2>Forth für den <span class="uppercase">Nascom</span></h2>
<p>
<a href="journal/81/08/03/text/#article1">Teil 1</a><br>
<a href="journal/81/09/10/text/#article1">Teil 2</a> &nbsp;
<a href="journal/81/09/16/text/#article1">Assembler-Listing</a> &nbsp;
<a href="journal/81/09/22/text/#article1">Hex-Dump</a><br>
<a href="journal/81/10/02/text/#article3">Teil 3</a><br>
<a href="journal/81/12/03/text/#article1">Teil 4</a><br>
<a href="journal/82/02/18/text/#article1">Teil 5</a><br>
<a href="journal/82/03/03/text/#article2">Teil 6</a><br>
<a href="journal/82/07/47/text/#article1">Teil 7</a><br>
<a href="journal/83/07/10/text/#article1">T-Forth</a><!-- &nbsp;
<a href="journal/83/07/10/text/#article1">Assembler-Listing</a>--><br>
</p>

<h2>Seite(n) für Einsteiger</h2>
<p>
<a href="journal/81/12/06/text/#article1">Binär-Arithmetik</a><br>
<a href="journal/82/01/25/text/#article1">BCD-Arithmetik</a><br>
<a href="journal/82/02/23/text/#article1">Ladebefehle</a><br>
<a href="journal/82/05/18/text/#article1">Sprünge</a><br>
<a href="journal/82/06/20/text/#article1">BASIC</a><br>
<a href="journal/82/07/37/text/#article1">Stack</a><br>
<a href="journal/82/09/14/text/#article1">NASBUG/NASSYS</a><br>
<a href="journal/82/10/08/text/#article1">Interrupts</a><br>
<a href="journal/83/02/12/text/#article1">NASBUG/NASSYS</a><br>
<a href="journal/83/04/15/text/#article1">Verschieben, Drucken</a><br>
</p>

<h2>Seite(n) für Floppy-Einsteiger</h2>
<p>
<a href="journal/83/09/06/text/#article1">Seite(n) für Floppy-Einsteiger</a><br>
<a href="journal/83/11/09/text/#article1">Seite(n) für Floppy-Einsteiger</a><br>
<a href="journal/83/12/13/text/#article1">Seite(n) für Floppy-Einsteiger</a><br>
<a href="journal/84/01/45/text/#article1">Seite(n) für Floppy-Einsteiger</a><br>
<a href="journal/84/02/20/text/#article1">Floppyseite</a><br>
</p>

<h2>Sortieren in BASIC</h2>
<p>
<a href="journal/81/07/13/text/#article1">Hauruck-Sortieren</a><br>
<a href="journal/81/08/14/text/#article1">Sortieren durch Einfügen</a><br>
<a href="journal/81/09/25/text/#article1">Bubble Sortieren</a><br>
<a href="journal/81/10/24/text/#article1">Shaker Sortierverfahren</a><br>
<a href="journal/81/12/27/text/#article1">Shell Sortieren</a><br>
<a href="journal/82/01/05/text/#article1">Heap Sortieren</a><br>
<a href="journal/82/02/16/text/#article2">Quick-Sort</a><br>
</p>

<h2>Datenverwaltung</h2>
<p>
<a href="journal/82/03/09/text/#article1">Datenverwaltung Teil 1</a><br>
<a href="journal/82/05/24/text/#article1">Datenverwaltung Teil 2</a><br>
<a href="journal/83/01/16/text/#article1">Sort</a><br>
<a href="journal/83/07/34/text/#article1">Adreßverwaltung Teil 1</a><br>
<a href="journal/84/02/41/text/#article1">Adreßverwaltung Teil 2</a><br>
</p>

<h2>Selbstbau-Plotter</h2>
<p>
<a href="journal/80/01/16/text/#article1">Beispiel-Computergraphik</a><br>
<a href="journal/80/03/03/text/#article1">Ein Plotter für den <span class="uppercase">Nascom</span></a><br>
<a href="journal/80/03/16/text/#article1">Beispiel-Computergraphik</a><br>
<a href="journal/80/05/02/text/#article1">Software für den <span class="uppercase">Nascom</span>-Plotter</a><br>
<a href="journal/80/06/11/text/#article1">Kompensation des mechanischen Spieles</a><br>
<a href="journal/80/06/36/text/#article1">Listing des Plotterprogramms</a><br>
<a href="journal/81/12/25/text/#article1">Selbstbau-Plotter</a><br>
</p>

<h2>CLD-DOS Unterprogramme</h2>
<p>
<a href="journal/81/07/05/text/#article1">Teil 1</a><br>
<a href="journal/81/08/18/text/#article1">Teil 2</a><br>
<a href="journal/81/09/04/text/#article1">Teil 3</a><br>
<a href="journal/81/10/09/text/#article2">Teil 4</a><br>
<br>
</p>

</div>
<div class="col-<?php echo BootstrapTier(); ?>-6">

<h2 class="uppercase">Nascompl</h2>
<p>
<a href="journal/nascompl/"><!--#head"-->Alle <span class="uppercase">Nascompl</span> auf einen Blick</a><br>
</p>
<p>
<a href="journal/81/06/07/text/#article1">Hallo, liebe Leser</a><br>
<a href="journal/81/07/17/text/#article1">Geschlechtstypen bei Computern</a><br>
<a href="journal/81/08/19/text/#article1">Platinismus</a><br>
<a href="journal/81/09/13/text/#article1">Platzmangel</a><br>
<a href="journal/81/10/27/text/#article1">Computermisshandlung</a><br>
<a href="journal/81/12/54/text/#article1">Weihnachtliches</a><br>
<a href="journal/82/01/35/text/#article1">Ein Heft mit zwei Mitten</a><br>
<a href="journal/82/02/30/text/#article1">Ostereiersuchprogramm</a><br>
<a href="journal/82/03/51/text/#article1">Programmiersprache BIRNE</a><br>
<a href="journal/82/05/31/text/#article1">Sex und Computer</a><br>
<a href="journal/82/06/23/text/#article1">Reisezeit</a><br>
<a href="journal/82/07/59/text/#article1">Greeting Messages</a><br>
<a href="journal/82/09/11/text/#article1">Früh-Herbst</a><br>
<a href="journal/82/10/07/text/#article1">Strickmuster-Dienst</a><br>
<a href="journal/83/01/16/text/#article2">mh, mh, mh</a><br>
<a href="journal/83/02/07/text/#article1">Die linke Hand der Redaktion</a><br>
<a href="journal/83/03/11/text/#article1">Druckfehler</a><br>
<a href="journal/83/04/26/text/#article2">Wetterprogramm</a><br>
<a href="journal/83/05/04/text/#article1">Computer-Treff</a><br>
<a href="journal/83/06/10/text/#article1">Cassetten-Legasthenie</a><br>
<a href="journal/83/07/48/text/#article1">Original und Fälschung</a><br>
<a href="journal/83/09/26/text/#article1">Traurige Zeiten</a><br>
<a href="journal/83/11/40/text/#article1">Geschenkideen</a><br>
<a href="journal/83/12/08/text/#article1">Phönix aus der Asche</a><br>
</p>

<h2>Jahres&shy;inhalts&shy;verzeichnis</h2>
<p>
<a href="journal/81/06/15/text/#article1">1980</a><br>
<a href="journal/82/01/18/text/#article1">1981</a><br>
<a href="journal/83/04/27/text/#article1">1982</a><br>
<a href="journal/84/m1/05/text/#article1">1983</a><br>
<a href="journal/85/m3/11/text/#article1">1984</a><br>
</p>

<h2>Grafik</h2>
<p>
<a href="journal/82/02/27/text/#article1">Grafikroutinen</a><br>
<a href="journal/83/02/11/text/#article2">Klötzchengrafik</a><br>
<a href="journal/83/03/18/text/#article1">Vektorgrafik</a><br>
<a href="journal/83/05/06/text/#article1">3D-Grafik</a><br>
<a href="journal/83/05/18/text/#article1">Point</a><br>
<a href="journal/83/07/27/text/#article1">Projektion</a><br>
<a href="journal/83/07/49/text/#article2">Stereogramm</a><br>
<a href="journal/84/02/39/text/#article1">Sterne</a><br>
</p>

<h2>MDCR</h2>
<p>
<a href="journal/81/03/02/text/#article1">Schneller Kassettenspeicher für den Nascom</a><br>
<a href="journal/81/06/11/text/#article1">In Darmstadt nichts Neues&hellip;</a><br>
<a href="journal/81/07/14/text/#article1">MDCR-Monitor Teil 1</a><br>
<a href="journal/81/12/35/text/#article1">MDCR-Monitor Teil 2</a><br>
<a href="journal/82/01/09/text/#article1">MDCR Interface Teil 3</a><br>
<a href="journal/82/09/05/text/#article1">MDCR-Controller Karte</a><br>
<a href="journal/83/05/24/text/#article1">MDCR-Controller</a><br>
</p>

<h2><span class="uppercase">Nascom</span> Praxis</h2>
<p>
<a href="journal/83/04/20/text/#article1">Teil 1</a><br>
<a href="journal/83/05/03/text/#article1">Teil 2</a><br>
<a href="journal/83/06/13/text/#article1">Teil 3</a><br>
<a href="journal/83/07/09/text/#article2">Teil 4</a><br>
<a href="journal/83/09/23/text/#article1">Teil 5</a><br>
</p>

<h2>Typenrad-Terminal</h2>
<p>
<a href="journal/82/05/06/text/#article1">Teil 1</a><br>
<a href="journal/82/07/10/text/#article1">Teil 2</a><br>
<a href="journal/82/09/06/text/#article1">Teil 3</a><br>
</p>

</div>
</div>

<?php	bottomGap();	?>
<?php	include "$navi_footer_php";	?>
