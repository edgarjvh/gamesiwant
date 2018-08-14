<?php
	session_start();
	
	$user_logged = isset($_SESSION['username']) ? $_SESSION['username'] == '' ? 'hidden' : '' : 'hidden';

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Games I Want | User Accounts</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/png" />
	<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
	
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<link rel="stylesheet" href="css/useraccounts.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script src="js/useraccounts.js"></script>
	<script type="text/javascript" src="js/header.js"></script>
</head>
<body>

<?php
	include_once ('header.php');
?>

<div class="account">
	<a href="account.php">Log in</a>
	<span>|</span>
	<a href="registration.php">Register</a>
</div>

<div class="auth">
	<div class="container">
		<div class="title">Type your access key</div>
		<input type="password" title="Access Key" id="txt-access-key" placeholder="access key" autocomplete="access-key">
		<input type="button" id="btn-access" value="Access" />
		<div id="auth-message" data-type="normal"></div>
	</div>
</div>



<div class="content-page">

</div>


<?php
	include_once ('footer.php');
?>
</body>
</html>