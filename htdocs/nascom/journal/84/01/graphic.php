<?php
	$magazine	= "80-Bus Journal";
	$title		= "Jan&#x200b;/&#x200b;Feb&#x200b;/&#x200b;März 1984 &middot; Ausgabe 1";
	$issue		= "01";
	$year		= "84";
	$first		= 1;
	$last		= 52;
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
