<?php
	$magazine	= "Nascom Journal";
	$title		= '<span class="nowrap">Dezember 1981 &middot;</span> <span class="nowrap">Ausgabe 11/12</span>';
	$issue		= "12";
	$year		= "81";
	$first		= 1;
	$last		= 55;
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
