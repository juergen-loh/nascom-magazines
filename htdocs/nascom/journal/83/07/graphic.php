<?php
	$magazine	= "80-Bus Journal";
	$title		= '<span class="nowrap">Juli/Aug. 1983 &middot;</span> <span class="nowrap">Ausgabe 7/8</span>';
	$issue		= "07";
	$year		= "83";
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
