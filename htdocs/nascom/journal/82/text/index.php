<?php
	$tail="/text/";
	$title="Nascom Journal";
	$issue="Jahrgang 1982";
	$tppath="../..";
	$imgName="/81/07/Image-03-1.jpeg";
	$paths = [
// 1982
		"../01/"
	,	"../02/"
	,	"../03/"
	,	"../05/"
	,	"../06/"
	,	"../07/"
	,	"../09/"
	,	"../10/"
	,	"../12/"
	];
	require "$tppath/top.php";
	printPages($paths, $tppath);
	require "$tppath/bottom.php";
?>
