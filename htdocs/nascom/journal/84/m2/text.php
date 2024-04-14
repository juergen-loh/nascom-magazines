<?php
	$magazine	= "80-Bus Journal";
	$title      = 'Mit&shy;tei&shy;lungs&shy;blatt <span class="nowrap">Nr. 2 &ndash;</span> <span class="nowrap">August 1984</span>';
	$issue		= "m2";
	$year		= "84";
	$first		= 1;
	$last		= 8;
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
