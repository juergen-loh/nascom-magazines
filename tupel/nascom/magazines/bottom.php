<!-- bottom.php -->
</table>

<?php
	if (isset($bottom)) {
		echo "<p>\n";
		echo "\t$bottom\n";
		echo "</p>\n";
	}
?>

<p>
	Based on a work of
	<?php externalLink("Mike Strange"); ?>
	who collected an overall
	<a href="/nascom/magazines/Nascom%20Magazine%20Index.xls">table of contents</a>
	of Nascom magazines.
</p>

</div>

<?php
	bottomGap();
	include "$include_path/navi-footer.php";
?>
<!-- /bottom.php -->
