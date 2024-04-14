<?php
	$magazine	= "Nascom Journal";
	$title		= '<span class="nowrap">März/April 1982 &middot;</span> <span class="nowrap">Ausgabe 3/4</span>';
	$issue		= "03";
	$year		= "82";
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
