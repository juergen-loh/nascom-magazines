<?php
	$title="Nascom Journal";
	$issue="0/80";
	$path="../";
	$tail="/text/";
	$tppath="../..";

	$paths = [""];
	require "$tppath/top.php";
	printPages($paths, $tppath);
	require "$tppath/bottom.php";
?>
