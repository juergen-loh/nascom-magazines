<?php
	$magazine	= "Nascom Journal";
	$title		= '<span class="nowrap">September 1981 &middot;</span> <span class="nowrap">Ausgabe 9</span>';
	$issue		= "09";
	$year		= "81";
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
