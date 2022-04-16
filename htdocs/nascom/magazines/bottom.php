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
	This table of contents is based on a work of
	<?php externalLink("Mike Strange"); ?>
	who collected an overall
	<?php echo "\t<a href=\"$gHtmlRoot/nascom/magazines/Nascom%20Magazine%20Index.xls\">table of contents</a>\n"; ?>
	of Nascom magazines.
</p>

</div>

<?php
	bottomGap();
	include "$navi_footer_php";
?>
<!-- /bottom.php -->
