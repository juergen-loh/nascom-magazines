<?php
	$magazine	= "Nascom Journal";
	$title		= "Juni 1981 &middot; Ausgabe 6";
	$issue		= "06";
	$year		= "81";
	$first		= 1;
	$last		= 20;
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
