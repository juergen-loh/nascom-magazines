<?php
	$magazine	= "80-Bus Journal";
	$title		= '<span class="nowrap">Juli$ZeroWidthSpace/{$ZeroWidthSpace}Aug.$ZeroWidthSpace/{$ZeroWidthSpace}September 1984 &middot;</span> <span class="nowrap">Ausgabe 3</span>';
	$issue		= "03";
	$year		= "84";
	$first		= 1;
	$last		= 52;
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
