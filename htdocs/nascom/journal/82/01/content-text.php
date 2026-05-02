<?php
	$title="Nascom Journal";
	$issue="Januar 1982 &middot; Ausgabe 1";
	$tail="/text/";
	$path="../";
	$tppath="../..";

	$paths = [""];
	require "$tppath/top.php";
	printPages($paths, $tppath);
	require "$tppath/bottom.php";
?>
