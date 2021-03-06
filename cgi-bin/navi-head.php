<?php
	header('Content-Type: text/html; charset=utf-8');
?><!doctype html><?php /* DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" */ ?>

<html lang="de">

<!-- navi-head.php -->
<head>
	<meta charset="utf-8">

<?php	if ($nascom) {	?>
	<link rel="shortcut icon" type="image/x-icon" href="/nascom/nascom.ico">
	<link rel="icon" type="image/png" href="/nascom/apple-touch-icon.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/nascom/apple-touch-icon.png" sizes="96x96">
	<link rel="apple-touch-icon" sizes="180x180" href="/nascom/apple-touch-icon.png">
<?php	} else { // nascom	?>
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<link rel="icon" type="image/png" href="/apple-touch-icon.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/apple-touch-icon.png" sizes="96x96">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<?php	} // nascom	?>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--bootstrap-->
	<link rel="stylesheet" href="/cdn/bootstrap/css/bootstrap.min.css">
	<!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"-->

	<!--font awesome-->
	<!--link rel="stylesheet" href="/cdn/fontawesome/css/all.css"-->
	<link rel="stylesheet" href="/cdn/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="/cdn/fontawesome/css/solid.min.css">
	<!--link rel="stylesheet" href="/cdn/fontawesome/css/v4-shims.css"-->

	<link rel="stylesheet" type="text/css" href="/style.css">
<!-- /navi-head.php -->
