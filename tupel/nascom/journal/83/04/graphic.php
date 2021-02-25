<?php

	$magazine	= "80-Bus Journal";
	$title		= "April 1983 &middot; Ausgabe 4";
	$issue		= "04";
	$year		= "83";
	$first		= 1;
	$last		= 28;
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
