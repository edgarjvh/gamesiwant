<?php
	$root = $_SERVER['DOCUMENT_ROOT'];
	$action = $_POST['action'];
	
	if ($action == "getFullDesc"){
		$news_id = $_POST['news_id'];
		
		require_once ('connection.php');
		$conn = new connection();
		$conn->connect();
		
		$query = "select fulldesc from news where news_id = '$news_id'";
		
		$result = $conn->command->query($query);
		
		if ($result){
			$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
			if (count($row) > 0){
				die(utf8ize($row[0]{"fulldesc"}));
			}
		}
	}
	
	function utf8ize($d) {
		if (is_array($d)) {
			foreach ($d as $k => $v) {
				$d[$k] = utf8ize($v);
			}
		} else if (is_string ($d)) {
			return utf8_encode($d);
		}
		return $d;
	}
?>