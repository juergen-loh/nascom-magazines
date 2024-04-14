<?php
	$magazine	= "80-Bus Journal";
	$title		= 'Mit&shy;tei&shy;lungs&shy;blatt <span class="nowrap">Nr. 1 &ndash;</span> <span class="nowrap">Februar 1984</span>';
	$issue		= "m1";
	$year		= "84";
	$first		= 1;
	$last		= 12;
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
