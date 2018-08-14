jQuery.expr[':'].contains = function(a, i, m) {
	return jQuery(a).text().toUpperCase()
		.indexOf(m[3].toUpperCase()) >= 0;
};

jQuery.fn.ForceNumericOnly = function(control,decimal,date) {
	return this.each(function()
	{
		$(this).keydown(function(e)
		{
			var key = e.charCode || e.keyCode || 0;
			// allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
			// home, end, period, and numpad decimal
			
			return (
				key === 8 ||
				key === 9 ||
				key === 13 ||
				key === 46 ||
				key === 107 ||
				key === 109 ||
				(decimal ? (control.val().indexOf('.') < 0 ? (key === 110 || key === 190) : 0) : 0) ||
				(date ? key === 109 || key === 173 : 0) ||
				(key >= 35 && key <= 40) ||
				(key >= 48 && key <= 57) ||
				(key >= 96 && key <= 105));
			
		});
	});
};

var platform_id = $('#hidden-platform-id').val();

$(document).ready(function () {
	$(document).find('.loading').fadeOut();
	$(document).find('input#txt-qty').ForceNumericOnly($(document).find('input#txt-qty'),false,false);
	
	$(document).on('click','span.qty-minus',function () {
		decreaseQty($(this).parent().find('input'));
	});
	
	$(document).on('click','span.qty-plus',function () {
		increaseQty($(this).parent().find('input'));
	});
	
	$(document).on('keydown','input#txt-qty',function (e) {
		if (e.keyCode === 38 || e.keyCode === 107){
			e.preventDefault();
			increaseQty($(this));
		}else if(e.keyCode === 40 || e.keyCode === 109){
			e.preventDefault();
			decreaseQty($(this));
		}
		
		var cbox = $(this).parent().parent().find('input#cbox-select');
		
		if ((e.keyCode >= 48 && e.keyCode <= 57) ||	(e.keyCode >= 96 && e.keyCode <= 105)){
			if(Number($(this).val().trim()) > 0){
				cbox.prop('checked',true);
			}else{
				cbox.prop('checked',false);
			}
		}
	});
	
	$(document).on('keyup','input#txt-qty',function (e) {
		var cbox = $(this).parent().parent().find('input#cbox-select');
		
		if ((e.keyCode >= 48 && e.keyCode <= 57) ||
			(e.keyCode >= 96 && e.keyCode <= 105) ||
			 e.keyCode === 8 ||
			 e.keyCode === 46){
			
			if ($(this).val().trim() === ''){
				cbox.prop('checked',false);
			}else if(Number($(this).val().trim()) > 0){
				cbox.prop('checked',true);
			}else{
				cbox.prop('checked',false);
			}
		}
	});
	
	$(document).on('click','a.p-name', function (e) {
		e.preventDefault();
	});
	
	$(document).on('click','a.p-platform', function (e) {
		//e.preventDefault();
	});
	
	filterTextChanged();
});

function increaseQty(input) {
	input.val(Number(input.val().trim()) + 1);
	
	var cbox = input.parent().parent().find('input#cbox-select');
	cbox.prop('checked',true);
}

function decreaseQty(input) {
	if(Number(input.val().trim()) > 0){
		input.val(Number(input.val().trim()) - 1);
	}
	
	var cbox = input.parent().parent().find('input#cbox-select');
	if (Number(input.val().trim() > 0)){
		cbox.prop('checked',true);
	}else{
		cbox.prop('checked',false);
	}
}

function onControlLeave(ctl) {
	var num = Number($(ctl).val().trim());
	
	if (num.toString() === 'NaN'){
		$(ctl).val('0');
	}else if(num < 0){
		$(ctl).val('0');
	}else{
		$(ctl).val(num);
	}
}

function getProducts(indexFrom, platform_id) {
	myData = {
		action:"getProducts",
		platformId:platform_id,
		indexFrom: indexFrom
	};
	
	$.ajax({
		async:true,
		type:'post',
		url:'controllers/c_products.php',
		data: myData,
		success: function(data){
			products_on_success(data);
		},
		error: function (a,b,c) {
			products_on_error(a,b,c);
		}
	});
}

function products_on_success(data) {
	var rows = JSON.parse(data);
	
	var html = '';
	
	if (rows.length > 0){
		for (var i = 0; i < rows.length; i++){
			var url = platform_id > 0 ? '#' : rows[i].url;
			
			html += '<div class="trow">\n' +
				'<div class="tcol psku">'+ rows[i].sku +'</div>\n' +
				'<div class="tcol pplatform"><a href="'+ url +'">'+ rows[i].platform +'</a></div>\n' +
				'<div class="tcol pname"><a href="#">'+ rows[i].name +'</a></div>\n' +
				'<div class="tcol pquantity"><input type="number" min="0" max="1000" value="0" id="txt-qty" title="Quantity"></div>\n' +
				'<div class="tcol pprice"></div>\n' +
				'<div class="tcol padd-to-cart"><div class="btn-single-add-to-card">CLICK FOR PRICE</div></div>\n' +
				'<div class="tcol pcbox"><input type="checkbox" id="cbox-select-all-products" title="select all"></div>\n' +
				'</div>';
		}
		$(document).find('.tbody').append(html);
		
		console.log(rows[rows.length - 1].product_id);
		getProducts(rows[rows.length - 1].product_id, platform_id);
	}else{
		$(document).find('.loading').fadeOut();
	}
}

function products_on_error(a,b,c) {

}

function filterTextChanged() {
	var text = $('#txt-filter-search').val().trim();
	var results = $('#search-results');
	var found = 0;
	
	if (text === ''){
		$('.tbody').children('.trow').each(function () {
			if ($(this).hasClass('hidden')){
				$(this).removeClass('hidden');
			}
		});
		results.html('');
	}else{
		$('.tbody').children('.trow').each(function () {
			
			if ($(this).find("a.p-name:contains('" + text + "')").length > 0){
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