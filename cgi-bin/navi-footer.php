
<!-- navi-footer.php -->

<!--********************************************************************************-->

	</div>

<?php
		if (isset($naviBottom)) {
			$tierBottom = BootstrapTier("NaviBottom");
		} else {
			$tierBottom = BootstrapTier("Bottom");
		}
?>
	<nav class="nav flex-column flex-<?php echo $tierBottom; ?>-row tupel-navbar-bottom robots-nocontent"> <!--nav-pills-->
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

	<!--jquery-->
	<script src="/cdn/jquery/js/jquery.slim.min.js"></script>
	<!--script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script-->

	<!--popper-->
	<!--script src="/cdn/popper/js/popper.min.js"></script-->
	<!--script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script-->

	<!--bootstrap-->
	<script src="/cdn/bootstrap/js/bootstrap.min.js"></script>
	<!--script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script-->
</body>

<!-- /navi-footer.php -->
</html>
