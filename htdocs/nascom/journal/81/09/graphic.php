<?php
	$magazine	= "Nascom Journal";
	$title		= "September 1981 &middot; Ausgabe 9";
	$issue		= "09";
	$year		= "81";
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
