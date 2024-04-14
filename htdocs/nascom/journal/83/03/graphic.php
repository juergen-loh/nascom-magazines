<?php
	$magazine	= "80-Bus Journal";
	$title		= '<span class="nowrap">März 1983 &middot;</span> <span class="nowrap">Ausgabe 3</span>';
	$issue		= "03";
	$year		= "83";
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
