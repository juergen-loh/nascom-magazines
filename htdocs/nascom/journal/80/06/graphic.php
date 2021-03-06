<?php

	$magazine	= "Nascom Journal";
	$title		= "6/80 7/80";
	$issue		= "06";
	$year		= "80";
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
