<?php
	$magazine	= "Nascom Journal";
	$title		= "3/80";
	$issue		= "03";
	$year		= "80";
	$first		= 1;
	$last		= 16;
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
