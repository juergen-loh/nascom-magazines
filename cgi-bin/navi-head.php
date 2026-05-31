<?php
	header('Content-Type: text/html; charset=utf-8');
?><!doctype html><?php /* DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" */ ?>

<?php
	if (!isset($lang)) {
		$lang = "de";
	}
	echo "<html lang=\"$lang\">\n";

	// CSS
	function requireCss($css)
	{
		$name = basename($css);
		echo "<!-- $name --><style>\n";
		require $css;
		echo "\n</style><!-- /$name -->\n";
	}

	function linkCss($css)
	{
		echo "\t<link rel=\"stylesheet\" href=\"$css\">\n";
	}

	// JS
	function requireJs($js)
	{
		$name = basename($js);
		echo "<!-- $name --><script>\n";
		require $js;
		echo "\n</script><!-- /$name -->\n";
	}

	function linkJs($js)
	{
		echo "\t<script src=\"$js\"></script>\n";
	}

	if ($server == "t480") {
		$link_style_css		= "$gHtmlRoot/style.css";
		$link_bootstrap_css	= "$gHtmlRoot/cdn/bootstrap/css/bootstrap.custom.css";
		$link_bootstrap_js	= "$gHtmlRoot/cdn/bootstrap/js/bootstrap.custom.js";

//		$style_css			= "$document_root/style.css";
//		$bootstrap_css		= "$document_root/cdn/bootstrap/css/bootstrap.css";
//		$bootstrap_js		= "$document_root/cdn/bootstrap/js/bootstrap.custom.js";
//		$included_files		= array_merge($included_files, [$style_css, $bootstrap_css, $bootstrap_js]);
	} else if (!$requireCssJs) {
		$link_style_css		= "$gHtmlRoot/style.min.css";
		$link_bootstrap_css	= "$gHtmlRoot/cdn/bootstrap/css/bootstrap.custom.min.css";
		$link_bootstrap_js	= "$gHtmlRoot/cdn/bootstrap/js/bootstrap.custom.min.js";
	} else {
		// https://www.toptal.com/developers/cssminifier
		$link_style_css		= "$gHtmlRoot/style.min.css";
		$link_bootstrap_css	= "$gHtmlRoot/cdn/bootstrap/css/bootstrap.custom.min.css";
		$link_bootstrap_js	= "$gHtmlRoot/cdn/bootstrap/js/bootstrap.custom.min.js";

		$style_css			= "$document_root/style.min.css";
		$bootstrap_css		= "$document_root/cdn/bootstrap/css/bootstrap.custom.min.css";
		$bootstrap_js		= "$document_root/cdn/bootstrap/js/bootstrap.custom.min.js";
		$included_files		= array_merge($included_files, [$style_css, $bootstrap_css, $bootstrap_js]);
	}
?>

<!-- navi-head.php / $Date: 2026-05-31 12:49:38 +0200 (So, 31. Mai 2026) $ -->
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">

<?php
	if ($nascom) {
		echo "\t<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"$gHtmlRoot/nascom/nascom.ico\">\n";
		echo "\t<link rel=\"icon\" type=\"image/png\" href=\"$gHtmlRoot/nascom/apple-touch-icon.png\" sizes=\"32x32\">\n";
		echo "\t<link rel=\"icon\" type=\"image/png\" href=\"$gHtmlRoot/nascom/apple-touch-icon.png\" sizes=\"96x96\">\n";
		echo "\t<link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"$gHtmlRoot/nascom/apple-touch-icon.png\">\n";
	} else { // nascom
		echo "\t<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"$gHtmlRoot/favicon.ico\">\n";
		echo "\t<link rel=\"icon\" type=\"image/png\" href=\"$gHtmlRoot/apple-touch-icon.png\" sizes=\"32x32\">\n";
		echo "\t<link rel=\"icon\" type=\"image/png\" href=\"$gHtmlRoot/apple-touch-icon.png\" sizes=\"96x96\">\n";
		echo "\t<link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"$gHtmlRoot/apple-touch-icon.png\">\n";
	} // nascom

	// Canonical
//	echo "<!--\n";
	echo "\t<link rel=\"canonical\" href=\"$gCanonicalRoot";
	$requestUri = $_SERVER["REQUEST_URI"];

	// infinityfree hängt ?i=1 an die URI
	$requestUri = str_replace("?i=1", "", $requestUri);
	$requestUri = preg_replace('/[^a-zA-Z0-9\-\/ ]+/', '', $requestUri);
	
	echo $requestUri;
	echo "\">\n";
//	echo "-->\n";
?>

	<!--bootstrap-->
<?php
	if (isset($bootstrap_css)) {
		requireCss($bootstrap_css);
	} else if (isset($link_bootstrap_css)) {
		linkCss("$link_bootstrap_css");
	} else {
		// https://www.toptal.com/developers/cssminifier
		linkCss("$gHtmlRoot/cdn/bootstrap/css/bootstrap.css");
//		linkCss("$gHtmlRoot/cdn/bootstrap/css/bootstrap.min.css");
//		linkCss("$gHtmlRoot/cdn/bootstrap/css/bootstrap.custom.min.css");
//		linkCss("$gHtmlRoot/cdn/bootstrap/css/bootstrap.custom.css");
//		linkCss("$gHtmlRoot/cdn/bootstrap/css/bootstrap.custom.min.css");
	}
/*
	// font awesome
	echo "\t<link rel=\"stylesheet\" href=\"$gHtmlRoot/cdn/fontawesome/css/fontawesome.min.css\">\n";
	echo "\t<link rel=\"stylesheet\" href=\"$gHtmlRoot/cdn/fontawesome/css/solid.min.css\">\n";
*/
	if (isset($style_css)) {
		requireCss($style_css);
	} else if (isset($link_style_css)) {
		linkCss("$link_style_css");
	} else {
		linkCss("$gHtmlRoot/style.css");
	}
?>
<!-- /navi-head.php -->
