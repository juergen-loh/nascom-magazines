<?php
	$magazine	= "80-Bus Journal";
	$title		= 'Mit&shy;tei&shy;lungs&shy;blatt <span class="nowrap">Nr. 3 &ndash;</span> <span class="nowrap">Juni 1985</span>';
	$issue		= "m3";
	$year		= "85";
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
