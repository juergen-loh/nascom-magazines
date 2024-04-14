<?php
	$magazine	= "Nascom Journal";
	$title		= '<span class="nowrap">August 1981 &middot;</span> <span class="nowrap">Ausgabe 8</span>';
	$issue		= "08";
	$year		= "81";
	$first		= 1;
	$last		= 24;
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
