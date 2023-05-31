<?php
	$magazine	= "80-Bus Journal";
	$title      = "März 1983 &middot; Ausgabe 3";
	$issue		= "03";
	$year		= "83";
	$first		= 1;
	$last		= 32;
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
