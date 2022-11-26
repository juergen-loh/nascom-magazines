<?php
	ini_set('html_errors', true);
	ini_set('docref_root', '/error/');
	error_reporting(E_ALL);

	function exception_error_handler($errno, $errstr, $errfile, $errline ) {
		throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
	}
	set_error_handler("exception_error_handler");

	$redirect_php = "$include_path/redirect.php";
	if (file_exists($redirect_php)) {
		include "$redirect_php";
	}

	$navi_body_php		= "$include_path/navi-body.php";
	$navi_head_php		= "$include_path/navi-head.php";
	$navi_footer_php	= "$include_path/navi-footer.php";

	$document_root = pathinfo($include_path, PATHINFO_DIRNAME);
	if ($document_root == "..") {
		$document_root = ".";	// only valid in rootdir
	} else if (substr($document_root, 1, 2) == ":/") {	// Absoluter Pfad mit Laufwerk ("C:/")
		$document_root = $document_root . "/htdocs";
	} else {// if (substr($document_root, 0, 3) == "../") {
		$document_root = substr($document_root, 3);	// remove ../
//	} else {
//		echo "document_root = $document_root";	// fehler
	}
/*	echo "<!--\n"
	.	"include_path = $include_path\n"
	.	"document_root = $document_root\n"
	.	"-->\n";
*/
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
