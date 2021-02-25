<?php

	$magazine	= "Nascom Journal";
	$title		= "0/80";
	$issue		= "00";
	$year		= "80";
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
