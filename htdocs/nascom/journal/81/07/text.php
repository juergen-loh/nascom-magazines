<?php
	$magazine	= "Nascom Journal";
	$title		= "Juli 1981 &middot; Ausgabe 7";
	$issue		= "07";
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
