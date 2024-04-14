<?php
	$magazine	= "Nascom Journal";
	$title		= '<span class="nowrap">Oktober 1981 &middot;</span> <span class="nowrap">Ausgabe 10</span>';
	$issue		= "10";
	$year		= "81";
	$first		= 1;
	$last		= 28;
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
