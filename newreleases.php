<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Games I Want | New Releases</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/png" />
	<link rel="stylesheet" href="css/productlist.css">
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
</head>
<body>
<?php
	include_once ('header.php');
?>

<?php
	$new_release_page = 1;
	$isaccessory = 0;
	include_once ('productlist.php');
?>

<?php
	include_once ('footer.php');
?>
<input type="hidden" id="hidden-platform-id" value="0" />
<script type="text/javascript" src="js/productlist.js"></script>
<script type="text/javascript" src="js/header.js"></script>
</body>
</html>