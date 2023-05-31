<?php
	$magazine	= "Nascom Journal";
	$title		= "Februar 1982 &middot; Ausgabe 2";
	$issue		= "02";
	$year		= "82";
	$first		= 1;
	$last		= 32;
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
