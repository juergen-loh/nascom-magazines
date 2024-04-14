<?php
	$magazine	= "Nascom Journal";
	$title		= '<span class="nowrap">Mai 1982 &middot;</span> <span class="nowrap">Ausgabe 5</span>';
	$issue		= "05";
	$year		= "82";
	$first		= 1;
	$last		= 32;
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
