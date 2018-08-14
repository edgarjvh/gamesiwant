jQuery.expr[':'].contains = function(a, i, m) {
	return jQuery(a).text().toUpperCase()
		.indexOf(m[3].toUpperCase()) >= 0;
};

$(document).ready(function () {
	//getPublishers();
});

function getPublishers() {
	myData = {
		action:"getPublishers"
	};
	
	$.ajax({
		async:true,
		type:'post',
		url:'controllers/c_products.php',
		data: myData,
		success: function(data){
			publishers_on_success(data);
		},
		error: function (a,b,c) {
			publishers_on_error(a,b,c);
		}
	});
}

function publishers_on_success(data) {
	var brandList = $('.tbl-brand-list');
	var rows = JSON.parse(data);
	
	var html = '';
	
	if (rows.length > 0){
		for (var i = 0; i < rows.length; i++){
			
			html += '<div class="brand-container">' +
						'<div class="brand">' +
						'<div class="front-tag"><div id="tag-name">' + rows[i].name + '</div></div>' +
						'<div class="back-tag"></div>' +
						'<div class="product"><img src="img/publishers/' + rows[i].image + '" alt="' + rows[i].name + '"/></div>' +
							'<a href="brands.php?id='+ rows[i].publisher_id +'"></a>' +
						'</div>' +
					'</div>';
		}
		
		brandList.html(html);
	}else{
	
	}
	$(document).find('.loading').fadeOut();
}

function publishers_on_error(a, b, c) {

}

function filterTextChanged() {
	var text = $('#txt-search-filter').val().trim();
	var results = $('#search-results');
	var found = 0;
	
	if (text === ''){
		$('.tbl-brand-list').children('.brand-container').each(function () {
			if ($(this).hasClass('hidden')){
				$(this).removeClass('hidden');
			}
		});
		results.html('');
	}else{
		$('.tbl-brand-list').children('.brand-container').each(function () {
			
			if ($(this).find("#tag-name:contains('" + text + "')").length > 0){
				found++;
				if ($(this).hasClass('hidden')){
					$(this).removeClass('hidden');
				}
				
			}else{
				if (!$(this).hasClass('hidden')){
					$(this).addClass('hidden');
				}
			}
			
			if (found === 0) {
				results.html('<span id="qty" data-type="no">0</span> matches found');
			}else if (found === 1) {
				results.html('<span id="qty" data-type="yes">1</span> match found');
			}else{
				
				results.html('<span id="qty" data-type="yes">'+ found +'</span> matches found');
			}
			
		});
	}
}