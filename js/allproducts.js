$(document).ready(function () {
	getAllProducts(0);
});

function getAllProducts(indexFrom) {
	myData = {
		action:"getAllProducts",
		indexFrom: indexFrom
	};
	
	$.ajax({
		async:true,
		type:'post',
		url:'controllers/c_products.php',
		data: myData,
		success: function(data){
			all_products_on_success(data);
		},
		error: function (a,b,c) {
			all_products_on_success(a,b,c);
		}
	});
}

function all_products_on_success(data) {
	var rows = JSON.parse(data);
	
	var html = '';
	
	if (rows.length > 0){
		for (var i = 0; i < rows.length; i++){
			html += '<div class="trow">\n' +
				'<div class="tcol psku">'+ rows[i].sku +'</div>\n' +
				'<div class="tcol pcategories"><a href="xboxone.php">'+ rows[i].platform +'</a></div>\n' +
				'<div class="tcol pname"><a href="#">'+ rows[i].name +'</a></div>\n' +
				'<div class="tcol pquantity"><input type="number" min="0" max="1000" value="0" id="txt-qty" title="Quantity"></div>\n' +
				'<div class="tcol pprice"></div>\n' +
				'<div class="tcol padd-to-cart"><div class="btn-single-add-to-card">CLICK FOR PRICE</div></div>\n' +
				'<div class="tcol pcbox"><input type="checkbox" id="cbox-select-all-products" title="select all"></div>\n' +
				'</div>';
		}
		$(document).find('.tbody').append(html);
		
		console.log(rows[rows.length - 1].product_id);
		getAllProducts(rows[rows.length - 1].product_id);
	}else{
		$(document).find('.loading').fadeOut();
	}
}

function all_products_on_error(a,b,c) {

}