<?php
	$magazine	= "80-Bus Journal";
	$title		= '<span class="nowrap">Okt.&#x200b;/&#x200b;Nov.&#x200b;/&#x200b;Dezember 1984 &middot;</span> <span class="nowrap">Ausgabe 4</span>';
	$issue		= "04";
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
