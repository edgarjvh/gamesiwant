<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Games I Want</title>
	<link rel="stylesheet" href="css/allproducts.css">
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
</head>
<body>
	<?php
		include_once ('header.php');
	?>
	
	<div class="container">
		<div class="account">
			<a href="account.php">Log in</a>
			<span>|</span>
			<a href="registration.php">Register</a>
		</div>
	
		<div class="minimun-order">Minimum order is 25 Item or 850USD</div>
		
		<div class="tbl-product-list">
			<div class="thead">
				<div class="trow">
					<div class="tcol psku">SKU</div>
					<div class="tcol pcategories">CATEGORIES</div>
					<div class="tcol pname">NAME</div>
					<div class="tcol pquantity">QUANTITY</div>
					<div class="tcol pprice">PRICE</div>
					<div class="tcol padd-to-cart"></div>
					<div class="tcol pcbox"><input type="checkbox" id="cbox-select-all-products" title="select all"></div>
				</div>
			</div>
			<div class="tbody">
			</div>
			<div class="loading">
				<i class="fas fa-spin fa-spinner"></i>
				<h4>Loading products...</h4>
			</div>
		</div>
	</div>
	
	<?php
		include_once ('footer.php');
	?>
	<script type="text/javascript" src="js/allproducts.js"></script>
	<script type="text/javascript" src="js/header.js"></script>
</body>
</html>