$(document).ready(function () {
	$(document).on('click','#btn-access',function () {
		$(document).find('div.auth input').prop('disabled',true);
		
		var message = $('#auth-message');
		var accesskey = $('#txt-access-key').val().trim();
		
		message.attr('data-type','normal');
		
		if (accesskey === ''){
			message.attr('data-type','error');
			message.html(
				'<i class="fas fa-exclamation-circle"></i> You must fill in the <u>Access Key</u> field'
			);
			$(document).find('div.auth input').prop('disabled',false);
			return;
		}
		
		message.attr('data-type','processing');
		message.html(
			'<i class="fas fa-spin fa-spinner"></i> Accessing, please wait'
		);
		
		var myData = {
			action : "checkAdmin",
			accesskey : accesskey
		};
	});
});