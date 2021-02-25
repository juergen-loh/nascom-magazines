<?php

	$magazine	= "Nascom Journal";
	$title		= "1/81";
	$issue		= "01";
	$year		= "81";
	$first		= 1;
	$last		= 16;
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
