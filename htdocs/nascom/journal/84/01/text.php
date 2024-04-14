<?php
	$magazine	= "80-Bus Journal";
	$title      = '<span class="nowrap">Jan&#x200b;/&#x200b;Feb&#x200b;/&#x200b;März 1984 &middot;</span> <span class="nowrap">Ausgabe 1</span>';
	$issue		= "01";
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
