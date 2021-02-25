<?php

	$magazine	= "Nascom Journal";
	$title		= "März/April 1982 &middot; Ausgabe 3/4";
	$issue		= "03";
	$year		= "82";
	$first		= 1;
	$last		= 52;
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
