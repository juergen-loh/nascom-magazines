<?php
	$magazine	= "80-Bus Journal";
	$title      = '<span class="nowrap">Juni 1983</span> &middot; <span class="nowrap">Ausgabe 6</span>';
	$issue		= "06";
	$year		= "83";
	$first		= 1;
	$last		= 28;
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
