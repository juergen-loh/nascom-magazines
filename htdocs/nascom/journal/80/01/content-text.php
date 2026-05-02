<?php
	$title="Nascom Journal";
	$issue="1/80";
	$tail="/text/";
	$path="../";
	$tppath="../..";

	$paths = [""];
	require "$tppath/top.php";
	printPages($paths, $tppath);
	require "$tppath/bottom.php";
?>
