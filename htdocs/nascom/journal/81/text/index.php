<?php
	$tail="/text/";
	$title="Nascom Journal";
	$issue="Jahrgang 1981";
	$tppath="../..";
	$imgName="/81/07/Image-03-1.jpeg";
	$paths = [
// 1981
		"../01/"
	,	"../02/"
	,	"../03/"
	,	"../04/"
	,	"../06/"
	,	"../07/"
	,	"../08/"
	,	"../09/"
	,	"../10/"
	,	"../12/"
	];
	require "$tppath/top.php";
	printPages($paths, $tppath);
	require "$tppath/bottom.php";
?>
