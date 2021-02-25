<?php

	$magazine	= "80-Bus Journal";
	$title		= "Mitteilungs&shy;blatt Nr. 2 &ndash; August 1984";
	$issue		= "m2";
	$year		= "84";
	$first		= 1;
	$last		= 8;
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
