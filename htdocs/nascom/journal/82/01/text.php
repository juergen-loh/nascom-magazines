<?php
	$magazine	= "Nascom Journal";
	$title		= "Januar 1982 &middot; Ausgabe 1";
	$issue		= "01";
	$year		= "82";
	$first		= 1;
	$last		= 35;
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
