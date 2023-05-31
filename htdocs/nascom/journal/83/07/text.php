<?php
	$magazine	= "80-Bus Journal";
	$title      = "Juli/Aug. 1983 &middot; Ausgabe 7/8";
	$issue		= "07";
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
