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
});