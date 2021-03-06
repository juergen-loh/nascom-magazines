<?php

	$magazine	= "Nascom Journal";
	$title		= "Juli/August 1982 &middot; Ausgabe 7/8";
	$issue		= "07";
	$year		= "82";
	$first		= 1;
	$last		= 60;
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
