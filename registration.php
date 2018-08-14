<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Games I Want | Registration</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/png" />
	<link rel="stylesheet" href="css/registration.css">
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/registration.js"></script>
	<script type="text/javascript" src="js/header.js"></script>
</head>
<body>

<?php
	include_once ('header.php');
?>

<div class="container">
	<div class="form-register">
		<div class="w-100">
			<label for="" class="is-required">User Name</label>
			<input type="text" id="txt_username" title="User Name" placeholder="User Name" required />
		</div>
		<div class="w-100">
			<label for="" class="is-required">User Email</label>
			<input type="email" id="txt_useremail" title="User Email" placeholder="User Email" required />
		</div>
		<div class="w-100">
			<label for="" class="is-required">User Password</label>
			<input type="password" id="txt_userpass" title="User Password" placeholder="User Password" required />
		</div>
		<div class="w-50">
			<label for="" class="is-required">Phone Number</label>
			<input type="text" id="txt_phonenumber" title="Phone Number" placeholder="Phone Number" required />
		</div>
		<div class="w-50">
			<label for="">Whatsapp Number</label>
			<input type="text" id="txt_whatsappnumber" title="WhatsApp Number" placeholder="WhatsApp Number">
		</div>
		<div class="w-50">
			<label for="" class="is-required">Company Name</label>
			<input type="text" id="txt_companyname" title="Company Name" placeholder="Company Name" required />
		</div>
		<div class="w-50">
			<label for="" class="is-required">Owner Name</label>
			<input type="text" id="txt_ownername" title="Owner Name" placeholder="Owner Name" required />
		</div>
		<div class="w-50">
			<label for="" class="is-required">Company Email</label>
			<input type="email" id="txt_companyemail" title="Company Email" placeholder="Company Email" required />
		</div>
		<div class="w-50">
			<label for="">How did you hear about us?</label>
			<select id="cbo-how" title="How did you hear about us?">
				<option value="Social Networks" class="w-50">Social Networks</option>
				<option value="Internet Search" class="w-50">Internet Search</option>
				<option value="Customer Service" class="w-50">Customer Service</option>
				<option value="Email" class="w-50">Email</option>
				<option value="Events" class="w-50">Events</option>
				<option value="Referral of friends" class="w-50">Referral of friends</option>
				<option value="It is already an old client" class="w-50">It is already an old client</option>
				<option value="Other" class="w-50">Other</option>
			</select>
		</div>
		<div class="w-100">
			<label for="" class="is-required">Billing Address</label>
			<input type="text" id="txt_billingaddress" title="Billing Address" placeholder="Billing Address" required />
		</div>
		<div class="w-33">
			<label for="" >City</label>
			<input type="text" id="txt_city" title="City" placeholder="City">
		</div>
		<div class="w-33">
			<label for="" >State</label>
			<input type="text" id="txt_state" title="State" placeholder="State">
		</div>
		<div class="w-33">
			<label for="" >Zip Code</label>
			<input type="text" id="txt_zipcode" title="Zip Code" placeholder="Zip Code">
		</div>
		<div class="w-33">
			<label for="" >Type of Business</label>
			<input type="text" id="txt_typebusiness" title="Type of Business" placeholder="Type of Business">
		</div>
		<div class="w-33">
			<label for="" >Been in Business Since</label>
			<input type="text" id="txt_inbusiness" title="Been in Business Since" placeholder="Been in Business Since">
		</div>
		<div class="w-33">
			<label for="" >Company Shipping Name</label>
			<input type="text" id="txt_shippingname" title="Company Shipping Name" placeholder="Company Shipping Name">
		</div>
		<div class="w-100 submit">
			<input type="submit" value="submit" id="btn_submit">
		</div>
		
	</div>
	<div id="register-message" data-type="normal">
	
	</div>
</div>

<?php
	include_once ('footer.php');
?>

</body>
</html>