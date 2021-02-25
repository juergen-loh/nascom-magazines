<?php

	$magazine	= "80-Bus Journal";
	$title		= "Mit&shy;tei&shy;lungs&shy;blatt Nr. 3 &ndash; Juni 1985";
	$issue		= "m3";
	$year		= "85";
	$first		= 1;
	$last		= 12;
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
