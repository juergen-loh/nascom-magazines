<?php
	require			( "./SetIncludePath.php");
	SetIncludePath	( ".");
//	$include_path	= "../cgi-bin";
	$gHtmlRoot		= ".";
	require "$include_path/global.php";
	httpLastModified(array_merge(get_included_files(), [$navi_head_php, $navi_body_php, $navi_footer_php]), $lastModified);
	$nascom = true;
	require "$include_path/navi-head.php";
?>
	<meta name="keywords" content="Nascom Journal, 80-Bus Journal, Nascom Magazines">
	<title>Nascom Journal &ndash; 80-Bus Journal &ndash; Nascom Magazines</title>

<?php require "$navi_body_php";	?>
	<!-- $Date: 2025-12-23 18:53:35 +0100 (Di, 23. Dez 2025) $ / <?php echo "lastModified: $lastModified"; ?> -->

<div class="row hyphenate">
<div class="col-<?php echo BootstrapTier(); ?>-12">
<!--
<h1 class="FirstHeading">
TODO
</h1>
<p>
Place content here.
</p>
-->
<p>
<br>
<a href="nascom/#nascomjournal">Nascom Journal</a>
</p>
<p>
<a href="nascom/#80busjournal">80-Bus Journal</a>
</p>
<p>
<a href="nascom/magazines/issues/#inmc-news">INMC News</a>
</p>
<p>
<a href="nascom/magazines/issues/#inmc-80-news">INMC 80 News</a>
</p>
<p>
<a href="nascom/magazines/issues/#80-bus-news">80-Bus News</a>
</p>
<p>
<a href="nascom/magazines/issues/#scorpio-news">Scorpio News</a>
</p>
<p>
<a href="nascom/magazines/issues/#micropower">Micropower</a>
</p>
<p>
<a href="nascom/magazines/issues/#nascom-newsletter">Nascom Newsletter</a>
</p>
</div>
</div>

<?php	bottomGap();	?>
<?php	require "$include_path/navi-footer.php";	?>
