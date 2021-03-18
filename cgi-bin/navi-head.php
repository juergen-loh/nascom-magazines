<?php
	header('Content-Type: text/html; charset=utf-8');
?><!doctype html><?php /* DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" */ ?>

<html lang="de">

<!-- navi-head.php -->
<head>
	<meta charset="utf-8">

<?php	if ($nascom) {	?>
	<?php echo "<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"$gHtmlRoot/nascom/nascom.ico\">\n"; ?>
	<?php echo "<link rel=\"icon\" type=\"image/png\" href=\"$gHtmlRoot/nascom/apple-touch-icon.png\" sizes=\"32x32\">\n"; ?>
	<?php echo "<link rel=\"icon\" type=\"image/png\" href=\"$gHtmlRoot/nascom/apple-touch-icon.png\" sizes=\"96x96\">\n"; ?>
	<?php echo "<link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"$gHtmlRoot/nascom/apple-touch-icon.png\">\n"; ?>
<?php	} else { // nascom	?>
	<?php echo "<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"$gHtmlRoot/favicon.ico\">\n"; ?>
	<?php echo "<link rel=\"icon\" type=\"image/png\" href=\"$gHtmlRoot/apple-touch-icon.png\" sizes=\"32x32\">\n"; ?>
	<?php echo "<link rel=\"icon\" type=\"image/png\" href=\"$gHtmlRoot/apple-touch-icon.png\" sizes=\"96x96\">\n"; ?>
	<?php echo "<link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"$gHtmlRoot/apple-touch-icon.png\">\n"; ?>
<?php	} // nascom	?>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--bootstrap-->
	<?php echo "<link rel=\"stylesheet\" href=\"$gHtmlRoot/cdn/bootstrap/css/bootstrap.min.css\">\n"; ?>
<?php //<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"?>

	<!--font awesome-->
<?php //<link rel="stylesheet" href="/cdn/fontawesome/css/all.css"?>
	<?php echo "<link rel=\"stylesheet\" href=\"$gHtmlRoot/cdn/fontawesome/css/fontawesome.min.css\">\n"; ?>
	<?php echo "<link rel=\"stylesheet\" href=\"$gHtmlRoot/cdn/fontawesome/css/solid.min.css\">\n"; ?>
<?php //<link rel="stylesheet" href="/cdn/fontawesome/css/v4-shims.css"?>

	<?php echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$gHtmlRoot/style.css\">\n"; ?>
<!-- /navi-head.php -->
