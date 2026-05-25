
<!-- navi-footer.php / $Date: 2026-05-25 15:29:11 +0200 (Mo, 25. Mai 2026) $ -->

<!--********************************************************************************-->

	</div>

<?php
		if (isset($naviBottom)) {
			$tierBottom = BootstrapTier("NaviBottom");
		} else {
			$tierBottom = BootstrapTier("Bottom");
		}
?>
	<nav class="nav flex-column flex-<?php echo $tierBottom; ?>-row style-navbar-bottom robots-nocontent"> <!--nav-pills-->
		<a title="Nach oben" class="sm-fill nav-link" href="#top">
			<!--<span class="fa fa-chevron-up" aria-hidden=true></span>-->
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"/>
			</svg>
		</a>
<?php
		if (isset($naviBottom)) {
			echo $naviBottom;
		} else {
			echo navBottom("datenschutzerklaerung", "Datenschutzerklärung");
			echo navBottom("impressum", "Impressum");
		}
?>
	</nav>

	<!--bootstrap-->
<?php
	if (isset($bootstrap_js)) {
		requireJs($bootstrap_js);
	} else {
//		linkJs("$gHtmlRoot/cdn/bootstrap/js/bootstrap.js");
//		linkJs("$gHtmlRoot/cdn/bootstrap/js/bootstrap.custom.js");
//		linkJs("$gHtmlRoot/cdn/bootstrap/js/bootstrap.custom.min.js");
//		linkJs("$gHtmlRoot/cdn/bootstrap/js/bootstrap.js");
//		linkJs("$gHtmlRoot/cdn/bootstrap/js/bootstrap.custom.js");
		linkJs("$gHtmlRoot/cdn/bootstrap/js/bootstrap.custom.min.js");
	}
?>
</body>

<!-- /navi-footer.php -->
</html>
