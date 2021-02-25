<?php

	$magazine	= "Nascom Journal";
	$title		= "Oktober/November 1982 &middot; Ausgabe 10/11";
	$issue		= "10";
	$year		= "82";
	$first		= 1;
	$last		= 28;
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
