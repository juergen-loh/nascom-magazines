<?php
	$magazine	= "Nascom Journal";
	$title		= "12/82";
	$issue		= "12";
	$year		= "82";
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
