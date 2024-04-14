<?php
	$magazine	= "Nascom Journal";
	$title		= '<span class="nowrap">Juli/August 1982 &middot;</span> <span class="nowrap">Ausgabe 7/8</span>';
	$issue		= "07";
	$year		= "82";
	$first		= 1;
	$last		= 60;
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
