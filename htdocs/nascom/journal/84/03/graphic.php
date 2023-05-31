<?php
	$magazine	= "80-Bus Journal";
	$title		= "Juli&#x200b;/&#x200b;Aug.&#x200b;/&#x200b;September 1984 &middot; Ausgabe 3";
	$issue		= "03";
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
