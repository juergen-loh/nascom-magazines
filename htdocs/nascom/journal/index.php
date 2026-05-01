<?php
	$tail="/";
	$title="Nascom Journal<br>80-Bus Journal";
	$desc='Dies ist das Gesamt-Inhaltsverzeichnis der '
	.	'<a href="../">deutschsprachigen Nascom-Zeitschriften</a>,'
	.	"\n\t\t\t"
	.	'die von 1980 bis 1985 erschienen sind.'
	.	"\n\t\t</p>"
	.	"\n\t\t<p class=\"hyphenate\">"
	.	"\n\t\t\tEs gibt auch ein "
	.	'<a href="../magazines/">Gesamt-Inhaltsverzeichnis</a> der '
	.	'<a href="../magazines/issues/">englischsprachigen Nascom-Magazine</a>.';
	$tppath=".";
	require "$tppath/top.php";

// 1980

	$path="80/00/";	require $path."content.php";	require "gap.php";
	$path="80/01/";	require $path."content.php";	require "gap.php";
	$path="80/02/";	require $path."content.php";	require "gap.php";
	$path="80/03/";	require $path."content.php";	require "gap.php";
	$path="80/04/";	require $path."content.php";	require "gap.php";
	$path="80/05/";	require $path."content.php";	require "gap.php";
	$path="80/06/";	require $path."content.php";	require "gap.php";

// 1981

	$path="81/01/";	require $path."content.php";	require "gap.php";
	$path="81/02/";	require $path."content.php";	require "gap.php";
	$path="81/03/";	require $path."content.php";	require "gap.php";
	$path="81/04/";	require $path."content.php";	require "gap.php";
	$path="81/06/";	require $path."content.php";	require "gap.php";
	$path="81/07/";	require $path."content.php";	require "gap.php";
	$path="81/08/";	require $path."content.php";	require "gap.php";
	$path="81/09/";	require $path."content.php";	require "gap.php";
	$path="81/10/";	require $path."content.php";	require "gap.php";
	$path="81/12/";	require $path."content.php";	require "gap.php";

// 1982

	$path="82/01/";	require $path."content.php";	require "gap.php";
	$path="82/02/";	require $path."content.php";	require "gap.php";
	$path="82/03/";	require $path."content.php";	require "gap.php";
	$path="82/05/";	require $path."content.php";	require "gap.php";
	$path="82/06/";	require $path."content.php";	require "gap.php";
	$path="82/07/";	require $path."content.php";	require "gap.php";
	$path="82/09/";	require $path."content.php";	require "gap.php";
	$path="82/10/";	require $path."content.php";	require "gap.php";
	$path="82/12/";	require $path."content.php";	require "gap.php";

// 1983

	$path="83/01/";	require $path."content.php";	require "gap.php";
	$path="83/02/";	require $path."content.php";	require "gap.php";
	$path="83/03/";	require $path."content.php";	require "gap.php";
	$path="83/04/";	require $path."content.php";	require "gap.php";
	$path="83/05/";	require $path."content.php";	require "gap.php";
	$path="83/06/";	require $path."content.php";	require "gap.php";
	$path="83/07/";	require $path."content.php";	require "gap.php";
	$path="83/09/";	require $path."content.php";	require "gap.php";
	$path="83/11/";	require $path."content.php";	require "gap.php";
	$path="83/12/";	require $path."content.php";	require "gap.php";

// 1984

	$path="84/m1/";	require $path."content.php";	require "gap.php";
	$path="84/01/";	require $path."content.php";	require "gap.php";
	$path="84/02/";	require $path."content.php";	require "gap.php";
	$path="84/m2/";	require $path."content.php";	require "gap.php";
	$path="84/03/";	require $path."content.php";	require "gap.php";
	$path="84/04/";	require $path."content.php";	require "gap.php";

// 1985

	$path="85/m3/";	require $path."content.php"; //	require "gap.php";

	require "$tppath/bottom.php"
?>
