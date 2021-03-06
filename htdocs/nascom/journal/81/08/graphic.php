<?php

	$magazine	= "Nascom Journal";
	$title		= "August 1981 &middot; Ausgabe 8";
	$issue		= "08";
	$year		= "81";
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
