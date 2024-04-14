<?php
	$magazine	= "80-Bus Journal";
	$title      = '<span class="nowrap">April&#x200b;/&#x200b;Mai&#x200b;/&#x200b;Juni 1984 &middot;</span> <span class="nowrap">Ausgabe 2</span>';
	$issue		= "02";
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
