<?php

	$magazine	= "Nascom Journal";
	$title		= "Dezember 1981 &middot; Ausgabe 11/12";
	$issue		= "12";
	$year		= "81";
	$first		= 1;
	$last		= 55;
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
