$(document).ready(function () {
	$(document).on('click','.accordion-title', function () {
		var accordion = $(this).closest('.accordion');
		var item = $(this).closest('.accordion-item');
		
		if (item.hasClass('shown')){
			item.find('.accordion-answer').slideUp();
			item.removeClass('shown');
		}else{
			accordion.find('.accordion-item').removeClass('shown');
			accordion.find('.accordion-answer').slideUp();
			
			item.addClass('shown');
			item.find('.accordion-answer').slideDown();
		}
		
	});
	
	$(document).on('click','#btn-submit', function () {
		var name = $('#txt-name').val().trim();
		var email = $('#txt-email').val().trim();
		var subject = $('#txt-subject').val().trim();
		var contentMessage = $('#txt-message').val().trim();
		var message = $('#contact-message');
		
		message.attr('data-type','normal');
		
		if (name === ''){
			message.attr('data-type','error');
			message.html(
				'<i class="fas fa-exclamation-circle"></i> You must fill in the <u>Name</u> field'
			);
			$(document).find('.form-contact input').prop('disabled',false);
			$(document).find('.form-contact textarea').prop('disabled',false);
			return;
		}
		if (email === ''){
			message.attr('data-type','error');
			message.html(
				'<i class="fas fa-exclamation-circle"></i> You must fill in the <u>Email</u> field'
			);
			$(document).find('.form-contact input').prop('disabled',false);
			$(document).find('.form-contact textarea').prop('disabled',false);
			return;
		}
		if (!validateEmail(email)){
			message.attr('data-type','error');
			message.html(
				'<i class="fas fa-exclamation-circle"></i> You must enter a valid email in the <u>Email</u> field'
			);
			$(document).find('.form-contact input').prop('disabled',false);
			$(document).find('.form-contact textarea').prop('disabled',false);
			return;
		}
		if (subject === ''){
			message.attr('data-type','error');
			message.html(
				'<i class="fas fa-exclamation-circle"></i> You must fill in the <u>Subject</u> field'
			);
			$(document).find('.form-contact input').prop('disabled',false);
			$(document).find('.form-contact textarea').prop('disabled',false);
			return;
		}
		if (contentMessage === ''){
			message.attr('data-type','error');
			message.html(
				'<i class="fas fa-exclamation-circle"></i> You must fill in the <u>Message</u> field'
			);
			$(document).find('.form-contact input').prop('disabled',false);
			$(document).find('.form-contact textarea').prop('disabled',false);
			return;
		}
		
		$(document).find('.form-contact input').prop('disabled',true);
		$(document).find('.form-contact textarea').prop('disabled',true);
		
		message.attr('data-type','processing');
		message.html(
			'<i class="fas fa-spin fa-spinner"></i> Sending your message, please wait'
		);
		
		var myData = {
			action : "sendMessage",
			name : name,
			email : email,
			subject : subject,
			contentMessage : contentMessage
		};
		
		$.ajax({
			type:'post',
			url:'controllers/c_users.php',
			data:myData,
			success: function (data) {
				console.log(data);
				switch (data) {
					case "SENT":
						message.attr('data-type','success');
						message.html(
							'<i class="fas fa-check-circle"></i> Your message has been successfully sent'
						);
						
						setTimeout(function () {
							$(document).find('.form-contact input').prop('disabled',false);
							$(document).find('.form-contact textarea').prop('disabled',false);
							$(document).find('.form-contact input').val('');
							$(document).find('.form-contact textarea').val('');
							message.attr('data-type','normal');
							message.html('');
						},3000);
						break;
					default:
						message.attr('data-type','error');
						message.html(
							'<i class="fas fa-times-circle"></i> Error communicating with the server'
						);
						$(document).find('.form-contact input').prop('disabled',false);
						$(document).find('.form-contact textarea').prop('disabled',false);
						break;
				}
			},
			error: function (a,b,c) {
				message.attr('data-type','error');
				message.html(
					'<i class="fas fa-times-circle"></i> Error sending data'
				);
				$(document).find('.form-contact input').prop('disabled',false);
				$(document).find('.form-contact textarea').prop('disabled',false);
			}
		});
	});
});

function validateEmail(email) {
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}