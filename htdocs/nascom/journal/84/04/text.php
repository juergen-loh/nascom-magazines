<?php

	$magazine	= "80-Bus Journal";
	$title      = "Okt.&#x200b;/&#x200b;Nov.&#x200b;/&#x200b;Dezember 1984 &middot; Ausgabe 4";
	$issue		= "04";
	$year		= "84";
	$first		= 1;
	$last		= 52;
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
