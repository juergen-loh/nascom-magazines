<!-- bottom.php -->
<?php
	if (isset($evalRequire)) {
		$count = count($evalRequire);
		for ($i = 0; $i < $count; $i++) {
			// evil eval()
			eval($evalRequire[$i]);
		}
	}
?>
</table>

<?php	bottomGap();	?>
<?php	require "$navi_footer_php";	?>
<!-- /bottom.php -->
