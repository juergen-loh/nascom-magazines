<?php

	$magazine	= "80-Bus Journal";
	$title		= "Mitteilungs&shy;blatt Nr. 1 &ndash; Februar 1984";
	$issue		= "m1";
	$year		= "84";
	$first		= 1;
	$last		= 12;
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
