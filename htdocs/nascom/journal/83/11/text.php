<?php
	$magazine	= "80-Bus Journal";
	$title      = '<span class="nowrap">November 1983 &middot;</span> <span class="nowrap">Ausgabe 10/11</span>';
	$issue		= "11";
	$year		= "83";
	$first		= 1;
	$last		= 52;
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
