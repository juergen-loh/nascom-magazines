<?php
	$magazine	= "Nascom Journal";
	$title		= '<span class="nowrap">Januar 1982 &middot;</span> <span class="nowrap">Ausgabe 1</span>';
	$issue		= "01";
	$year		= "82";
	$first		= 1;
	$last		= 35;
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
