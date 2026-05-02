<?php
	$tail="/";
	$title="80-Bus Journal";
	$issue="Jahrgang 1983";
	$tppath="..";
	$imgName="/83/03/Image-02-1.jpeg";
	$paths = [
// 1983
		"01/"
	,	"02/"
	,	"03/"
	,	"04/"
	,	"05/"
	,	"06/"
	,	"07/"
	,	"09/"
	,	"11/"
	,	"12/"
	];
	require "$tppath/top.php";
	printPages($paths, $tppath);
	require "$tppath/bottom.php";
?>
