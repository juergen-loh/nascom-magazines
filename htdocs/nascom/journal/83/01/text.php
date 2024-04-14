<?php
	$magazine	= "80-Bus Journal";
	$title		= '<span class="nowrap">Januar 1983 &middot;</span> <span class="nowrap">Ausgabe 1</span>';
	$issue		= "01";
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
