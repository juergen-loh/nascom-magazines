<?php
	$magazine	= "80-Bus Journal";
	$title		= '<span class="nowrap">Februar 1983 &middot;</span> <span class="nowrap">Ausgabe 2</span>';
	$issue		= "02";
	$year		= "83";
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
