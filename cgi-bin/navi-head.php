<?php
	header('Content-Type: text/html; charset=utf-8');
?><!doctype html><?php /* DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" */ ?>

<?php $lang = "de";
	echo "<html lang=\"$lang\">\n";
?>

<!-- navi-head.php / $Date: 2025-01-05 17:13:18 +0100 (So, 05. Jan 2025) $ -->
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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

	<!--bootstrap-->
	<?php echo "<link rel=\"stylesheet\" href=\"$gHtmlRoot/cdn/bootstrap/css/bootstrap.min.css\">\n"; ?>

	<!--font awesome-->
	<?php echo "<link rel=\"stylesheet\" href=\"$gHtmlRoot/cdn/fontawesome/css/fontawesome.min.css\">\n"; ?>
	<?php echo "<link rel=\"stylesheet\" href=\"$gHtmlRoot/cdn/fontawesome/css/solid.min.css\">\n"; ?>

	<?php echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$gHtmlRoot/style.css\">\n"; ?>
<?php
//	echo "<!--\n";
	echo "\t<link rel=\"canonical\" href=\"$gCanonicalRoot";
	$stripChars	= '/[^a-zA-Z0-9\-\/ ]+/';
	$requestUri = $_SERVER["REQUEST_URI"];

	// infinityfree hängt ?i=1 an die URI
	$requestUri = str_replace("?i=1", "", $requestUri);

	$requestUri = preg_replace($stripChars, '', $requestUri);
	
	echo $requestUri;
	echo "\">\n";
//	echo "-->\n";
?>
<!-- /navi-head.php -->
