$(document).on('mouseover', 'ul#main-menu > li', function () {
	$(this).find('.sub-list-container').show();
});

$(document).on('mouseleave', 'ul#main-menu > li', function () {
	$(this).find('.sub-list-container').hide();
});