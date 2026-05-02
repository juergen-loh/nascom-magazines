<?php
	$tail="/text/";
	$title="80-Bus Journal";
	$issue="Jahrgang 1984";
	$tppath="../..";
	$imgName="/83/03/Image-02-1.jpeg";
	$paths = [
// 1984
		"../m1/"
	,	"../01/"
	,	"../02/"
	,	"../m2/"
	,	"../03/"
	,	"../04/"
	];
	require "$tppath/top.php";
	printPages($paths, $tppath);
	require "$tppath/bottom.php";
?>
