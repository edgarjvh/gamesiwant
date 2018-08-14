$(document).ready(function () {
	$(document).on('click', '#btn_submit', function () {
		formRegisterOnSubmit();
	});
	
	$(document).on('keydown', '#txt_username', function () {
		var txtUserName = $('#txt_username');
		
		txtUserName.val(txtUserName.val().toUpperCase());
	});
});

function formRegisterOnSubmit() {
	//  BLOQUEAR CAMPOS PARA VALIDAR
	$(document).find('.form-register input').prop('disabled',true);
	$(document).find('.form-register select').prop('disabled',true);
	
	//  VARIABLES
	var message = $('#register-message');
	var username = $('#txt_username').val().trim();
	var useremail = $('#txt_useremail').val().trim();
	var userpass = $('#txt_userpass').val().trim();
	var phonenumber = $('#txt_phonenumber').val().trim();
	var whatsappnumber = $('#txt_whatsappnumber').val().trim();
	var companyname = $('#txt_companyname').val().trim();
	var ownername = $('#txt_ownername').val().trim();
	var companyemail = $('#txt_companyemail').val().trim();
	var how = $('#cbo-how').val();
	var billingaddress = $('#txt_billingaddress').val().trim();
	var city = $('#txt_city').val().trim();
	var state = $('#txt_state').val().trim();
	var zipcode = $('#txt_zipcode').val().trim();
	var typebusiness = $('#txt_typebusiness').val().trim();
	var inbusiness = $('#txt_inbusiness').val().trim();
	var shippingname = $('#txt_shippingname').val().trim();
	
	username = 'EDGARJVH';
	useremail = 'edgarjvh@gmail.com';
	userpass = '123';
	phonenumber = '04246557963';
	whatsappnumber = '04246557963';
	companyname = 'VILLA SOFT GPS, CA';
	ownername = 'EDGAR VILLASMIL';
	companyemail = 'villasoftgps@gmail.com';
	how = 'Social Networks';
	billingaddress = 'CABIMAS';
	city = 'CABIMAS';
	state = 'ZULIA';
	zipcode = '4013';
	typebusiness = 'SEGURIDAD ELECTRONICA';
	inbusiness = '3 AÑOS';
	shippingname = 'EDGAR VILLASMIL';
	
	//  VALIDACIONES
	message.attr('data-type','normal');
	
	if (username === ''){
		message.attr('data-type','error');
		message.html(
			'<i class="fas fa-exclamation-circle"></i> You must fill in the <u>User Name</u> field'
		);
		$(document).find('.form-register input').prop('disabled',false);
		$(document).find('.form-register select').prop('disabled',false);
		return;
	}
	if (useremail === ''){
		message.attr('data-type','error');
		message.html(
			'<i class="fas fa-exclamation-circle"></i> You must fill in the <u>User Email</u> field'
		);
		$(document).find('.form-register input').prop('disabled',false);
		$(document).find('.form-register select').prop('disabled',false);
		return;
	}
	if (!validateEmail(useremail)){
		message.attr('data-type','error');
		message.html(
			'<i class="fas fa-exclamation-circle"></i> You must enter a valid email in the <u>User Email</u> field'
		);
		$(document).find('.form-register input').prop('disabled',false);
		$(document).find('.form-register select').prop('disabled',false);
		return;
	}
	if (userpass === ''){
		message.attr('data-type','error');
		message.html(
			'<i class="fas fa-exclamation-circle"></i> You must fill in the <u>User Pass</u> field'
		);
		$(document).find('.form-register input').prop('disabled',false);
		$(document).find('.form-register select').prop('disabled',false);
		return;
	}
	if (phonenumber === ''){
		message.attr('data-type','error');
		message.html(
			'<i class="fas fa-exclamation-circle"></i> You must fill in the <u>Phone Number</u> field'
		);
		$(document).find('.form-register input').prop('disabled',false);
		$(document).find('.form-register select').prop('disabled',false);
		return;
	}
	if (companyname === ''){
		message.attr('data-type','error');
		message.html(
			'<i class="fas fa-exclamation-circle"></i> You must fill in the <u>Company Name</u> field'
		);
		$(document).find('.form-register input').prop('disabled',false);
		$(document).find('.form-register select').prop('disabled',false);
		return;
	}
	if (ownername === ''){
		message.attr('data-type','error');
		message.html(
			'<i class="fas fa-exclamation-circle"></i> You must fill in the <u>Owner Name</u> field'
		);
		$(document).find('.form-register input').prop('disabled',false);
		$(document).find('.form-register select').prop('disabled',false);
		return;
	}
	if (companyemail === ''){
		message.attr('data-type','error');
		message.html(
			'<i class="fas fa-exclamation-circle"></i> You must fill in the <u>Company Email</u> field'
		);
		$(document).find('.form-register input').prop('disabled',false);
		$(document).find('.form-register select').prop('disabled',false);
		return;
	}
	if (!validateEmail(companyemail)){
		message.attr('data-type','error');
		message.html(
			'<i class="fas fa-exclamation-circle"></i> You must enter a valid email in the <u>Company Email</u> field'
		);
		$(document).find('.form-register input').prop('disabled',false);
		$(document).find('.form-register select').prop('disabled',false);
		return;
	}
	if (billingaddress === ''){
		message.attr('data-type','error');
		message.html(
			'<i class="fas fa-exclamation-circle"></i> You must fill in the <u>Billing Address</u> field'
		);
		$(document).find('.form-register input').prop('disabled',false);
		$(document).find('.form-register select').prop('disabled',false);
		return;
	}
	
	message.attr('data-type','processing');
	message.html(
		'<i class="fas fa-spin fa-spinner"></i> Creating your account, please wait'
	);
	
	var myData = {
		action : "createAccount",
		username : username,
		useremail : useremail,
		userpass : userpass,
		phonenumber : phonenumber,
		whatsappnumber : whatsappnumber,
		companyname : companyname,
		ownername : ownername,
		companyemail : companyemail,
		how : how,
		billingaddress : billingaddress,
		city : city,
		state : state,
		zipcode : zipcode,
		typebusiness : typebusiness,
		inbusiness : inbusiness,
		shippingname : shippingname
	};
	
	$.ajax({
		type:'post',
		url:'controllers/c_users.php',
		data:myData,
		success: function (data) {
			console.log(data);
			switch (data) {
				case "REGISTERED":
					message.attr('data-type','success');
					message.html(
						'<i class="fas fa-check-circle"></i> Your account has been successfully registered. You will be notified by email of the administrator&#39;s approval'
					);
					
					setTimeout(function () {
						window.location = '/';
					},3000);
					break;
				case "ERROR REGISTERING":
					message.attr('data-type','error');
					message.html(
						'<i class="fas fa-times-circle"></i> An error has occurred in the registration process'
					);
					$(document).find('.form-register input').prop('disabled',false);
					$(document).find('.form-register select').prop('disabled',false);
					break;
				case "DUPLICATED":
					message.attr('data-type','error');
					message.html(
						'<i class="fas fa-exclamation-circle"></i> the email provided already exists'
					);
					$(document).find('.form-register input').prop('disabled',false);
					$(document).find('.form-register select').prop('disabled',false);
					break;
				case "FOR APPROVAL":
					message.attr('data-type','error');
					message.html(
						'<i class="fas fa-exclamation-circle"></i> the email provided already exists, but waiting for the administrator&#39;s approval'
					);
					$(document).find('.form-register input').prop('disabled',false);
					$(document).find('.form-register select').prop('disabled',false);
					break;
				default:
					message.attr('data-type','error');
					message.html(
						'<i class="fas fa-times-circle"></i> Error communicating with the server'
					);
					$(document).find('.form-register input').prop('disabled',false);
					$(document).find('.form-register select').prop('disabled',false);
					break;
			}
		},
		error: function (a,b,c) {
			message.attr('data-type','error');
			message.html(
				'<i class="fas fa-times-circle"></i> Error sending data'
			);
			$(document).find('.form-register input').prop('disabled',false);
			$(document).find('.form-register select').prop('disabled',false);
		}
	});
}

function validateEmail(email) {
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}