<?php
	$root = $_SERVER['DOCUMENT_ROOT'];
	require_once('connection.php');
	
	$action = $_POST['action'];
	
	if ($action == "getAllProducts"){
		$indeFrom = $_POST['indexFrom'];
		$indexTo = $indeFrom == 0 ? 500 : 1100;
		
		$conn = new connection();
		$conn->connect();
		
		$query = "select
					pro.product_id,
					pro.sku,
					CONVERT(pro.name using utf8) as name,
					pla.name as platform,
					pub.name as publisher
					from products as pro
					left join platforms as pla on pro.platform_id = pla.platform_id
					left join publishers as pub on pro.publisher_id = pub.publisher_id limit $indeFrom, $indexTo";
		
		$result = $conn->command->query($query);
		
		if($result){
			$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
			 
			 echo json_encode(utf8ize($rows));
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