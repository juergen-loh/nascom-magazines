<?php

	$magazine	= "Nascom Journal";
	$title		= "4/81 5";
	$issue		= "04";
	$year		= "81";
	$first		= 0;
	$last		= 31;
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
