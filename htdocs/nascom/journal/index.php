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
	$paths = [
// 1980
		"80/00/"
	,	"80/01/"
	,	"80/02/"
	,	"80/03/"
	,	"80/04/"
	,	"80/05/"
	,	"80/06/"
// 1981
	,	"81/01/"
	,	"81/02/"
	,	"81/03/"
	,	"81/04/"
	,	"81/06/"
	,	"81/07/"
	,	"81/08/"
	,	"81/09/"
	,	"81/10/"
	,	"81/12/"
// 1982
	,	"82/01/"
	,	"82/02/"
	,	"82/03/"
	,	"82/05/"
	,	"82/06/"
	,	"82/07/"
	,	"82/09/"
	,	"82/10/"
	,	"82/12/"
// 1983
	,	"83/01/"
	,	"83/02/"
	,	"83/03/"
	,	"83/04/"
	,	"83/05/"
	,	"83/06/"
	,	"83/07/"
	,	"83/09/"
	,	"83/11/"
	,	"83/12/"
// 1984
	,	"84/m1/"
	,	"84/01/"
	,	"84/02/"
	,	"84/m2/"
	,	"84/03/"
	,	"84/04/"
// 1985
	,	"85/m3/"
	];
	require "$tppath/top.php";
	printPages($paths, $tppath);
	require "$tppath/bottom.php";
?>
