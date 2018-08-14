$(document).ready(function () {
	$(document).on('click', '#btn-close-modal',function () {
		var modal = $(this).closest('.news-modal');
		modal.fadeOut('slow');
	});
	
	$(document).on('click', '.news-container',function () {
		var news_id = $(this).attr('id');
		var modal = $(document).find('.news-modal');
		var modal_content = $(document).find('.modal-content');
		modal_content.html('<div class="preloader"></div>');
		
		modal.fadeIn('slow' , function () {
			var myData = {
				action: "getFullDesc",
				news_id: news_id
			};
			
			$.ajax({
				async:true,
				type:'post',
				url:'controllers/c_news.php',
				data: myData,
				success: function (data) {
					modal_content.html(data);
					
				},
				error: function (a,b,c) {
				
				}
			});
		});
	});
});