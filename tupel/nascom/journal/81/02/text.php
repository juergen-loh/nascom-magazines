<?php

	$magazine	= "Nascom Journal";
	$title		= "2/81";
	$issue		= "02";
	$year		= "81";
	$first		= 1;
	$last		= 20;
	$graphic	= true;
	$text		= true;
	$pdf		= true;

	if (!isset($thumb)) $thumb = false;
	if ($thumb) {
		include "../../../../text.php";
	} else {
		include "../../text.php";
	}
?>
