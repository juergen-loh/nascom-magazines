<?php
	$tail="/text/";
	$title="Nascom Journal";
	$issue="Jahrgang 1980";
	$tppath="../..";
	$imgName="/81/07/Image-03-1.jpeg";
	$paths = [
// 1980
		"../00/"
	,	"../01/"
	,	"../02/"
	,	"../03/"
	,	"../04/"
	,	"../05/"
	,	"../06/"
	];
	require "$tppath/top.php";
	printPages($paths, $tppath);
	require "$tppath/bottom.php";
?>
