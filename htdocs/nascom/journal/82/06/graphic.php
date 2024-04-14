<?php
	$magazine	= "Nascom Journal";
	$title		= '<span class="nowrap">Juni 1982 &middot;</span> <span class="nowrap">Ausgabe 6</span>';
	$issue		= "06";
	$year		= "82";
	$first		= 1;
	$last		= 24;
	$graphic	= true;
	$text		= true;
	$pdf		= true;

	if (!isset($thumb)) $thumb = false;
	if ($thumb) {
		include "../../../graphic.php";
	} else {
		include "../../graphic.php";
	}
?>
