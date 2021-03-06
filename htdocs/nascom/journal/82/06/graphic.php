<?php

	$magazine	= "Nascom Journal";
	$title		= "Juni 1982 &middot; Ausgabe 6";
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
