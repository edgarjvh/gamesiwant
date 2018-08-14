<?php
	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$action = $_POST['action'];
	
	if ($action == "checkAdmin"){
		$accesskey = $_POST['accesskey'];
	}

?>