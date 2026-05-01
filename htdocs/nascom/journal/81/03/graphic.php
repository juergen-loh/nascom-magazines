<?php
	$magazine	= "Nascom Journal";
	$title		= "3/81";
	$issue		= "03";
	$year		= "81";
	$first		= 1;
	$last		= 24;
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
