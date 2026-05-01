<?php
	$magazine	= "Nascom Journal";
	$title		= "4/80";
	$issue		= "04";
	$year		= "80";
	$first		= 1;
	$last		= 20;
	$graphic	= true;
	$text		= true;
	$pdf		= true;

	if (!isset($thumb)) $thumb = false;
	if ($thumb) {
		require "../../../graphic.php";
	} else {
		require "../../graphic.php";
	}
?>
