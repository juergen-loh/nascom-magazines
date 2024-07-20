<?php
	require			( "./SetIncludePath.php");
	SetIncludePath	( ".");
//	$include_path	= "../cgi-bin";
	$gHtmlRoot		= ".";
	require "$include_path/global.php";
	httpLastModified(array_merge(get_included_files(), array($navi_head_php, $navi_body_php, $navi_footer_php)), $lastModified);
	$nascom = true;
	require "$include_path/navi-head.php";
?>

	<meta name="keywords" content="Nascom Journal, 80-Bus Journal, Nascom Magazines">
	<title>Nascom Journal - 80-Bus Journal - Nascom Magazines</title>

<?php include "$navi_body_php";	?>

<div class="row hyphenate">
<div class="col-<?php echo BootstrapTier(); ?>-12">

<h1 class="FirstHeading">
TODO
</h1>
<p>
Place content here.
</p>

</div>
</div>

<?php	bottomGap();	?>
<?php	include "$include_path/navi-footer.php";	?>
