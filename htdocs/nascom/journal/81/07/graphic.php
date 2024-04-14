<?php
	$magazine	= "Nascom Journal";
	$title		= '<span class="nowrap">Juli 1981 &middot;</span> <span class="nowrap">Ausgabe 7</span>';
	$issue		= "07";
	$year		= "81";
	$first		= 1;
	$last		= 20;
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
