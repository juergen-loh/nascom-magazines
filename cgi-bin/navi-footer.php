
<!-- navi-footer.php / $Date: 2023-03-11 15:22:20 +0100 (Sa, 11. Mrz 2023) $ -->

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
		<a class="sm-fill nav-link" href="#top"><span title="Nach oben" class="fa fa-chevron-up" aria-hidden=true></span></a>
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
	<?php echo "<script src=\"$gHtmlRoot/cdn/bootstrap/js/bootstrap.bundle.min.js\"></script>\n"; ?>
</body>

<!-- /navi-footer.php -->
</html>
