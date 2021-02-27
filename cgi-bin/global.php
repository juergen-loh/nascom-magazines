<?php
	$redirect_php = "$include_path/redirect.php";
	if (file_exists($redirect_php)) {
		include "$redirect_php";
	}

//	$include_path		=   $_SERVER['DOCUMENT_ROOT'] .   "/../../cgi-bin";
	$navi_body_php		= /*$_SERVER['DOCUMENT_ROOT'] .*/ "$include_path/navi-body.php";
	$navi_head_php		= /*$_SERVER['DOCUMENT_ROOT'] .*/ "$include_path/navi-head.php";
	$navi_footer_php	= /*$_SERVER['DOCUMENT_ROOT'] .*/ "$include_path/navi-footer.php";

	function httpLastModified($files, &$lastModified)
	{
		$lasttime = 0;
		foreach ($files as $i => $file) {
			$filemtime = filemtime($file);
			if ($lasttime < $filemtime) $lasttime = $filemtime;
//			echo "$file $filemtime $lasttime<br>\n";
		}

		setlocale(LC_TIME, 'en_US');
		$gmstrftime = gmstrftime("%a, %d %b %Y %H:%M:%S GMT", $lasttime);
		setlocale(LC_TIME, '');

//		$headers = http_get_request_headers();
//		$ifModifiedSince = addslashes($headers['If-Modified-Since']);

		if(array_key_exists("HTTP_IF_MODIFIED_SINCE", $_SERVER)) {
			$ifModifiedSince = preg_replace('/;.*$/','', $_SERVER["HTTP_IF_MODIFIED_SINCE"]);
//			echo "<!-- headers=$ifModifiedSince gmstrftime=$gmstrftime -->\n";

			// Checking if the client is validating his cache and if it is current.
			if (isset($ifModifiedSince) && ($ifModifiedSince == $gmstrftime)) {
				// Client's cache IS current, so we just respond '304 Not Modified'.
				header('Last-Modified: ' . $gmstrftime, true, 304);
				exit;
			} else {
				header('Last-Modified: ' . $gmstrftime);
			}
		} else {
			header('Last-Modified: ' . $gmstrftime);
		}
		$lastModified = $gmstrftime;
/*		echo "<!-- httpLastModified()\n";
		print_r($files);
//		echo "--".$_SERVER['HTTP_IF_MODIFIED_SINCE']."--".$_SERVER['HTTP_IF_NONE_MATCH']."--\n";
		echo "-->\n";
*/	}

?>
