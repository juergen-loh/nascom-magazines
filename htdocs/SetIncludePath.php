<?php

function SetIncludePath($path)
{
	global $include_path, $document_root;

	$include_path  = "$path/cgi-bin";
	$document_root = $path;
	if (!is_dir($include_path)) {
		$include_path  = "$path/../cgi-bin";
		$document_root = $path;
	}
}

?>
