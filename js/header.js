$(document).ready(function () {
	var menuHeader = $('header#menu-header');
	var stickyHeaderTop = menuHeader.offset().top;
	
	var stickyHeader = function(){
		var scrollTop = $(window).scrollTop();
		
		if (scrollTop > stickyHeaderTop) {
			menuHeader.addClass('sticky');
		} else {
			menuHeader.removeClass('sticky');
		}
		
		var scrollUp = $('a.scrollUp');
		if (scrollTop > 800){
			scrollUp.css('bottom', '20px');
			scrollUp.css('opacity', '1');
		}else{
			scrollUp.css('bottom', '-50px');
			scrollUp.css('opacity', '0');
		}
	};
	
	$("a[href='#top']").click(function() {
		$("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	});
	
	stickyHeader();
	
	$(window).scroll(function() {
		stickyHeader();
	});
});

$(document).on('mouseover', 'ul#main-menu > li', function () {
	$(this).find('.sub-list-container').show();
});

$(document).on('mouseleave', 'ul#main-menu > li', function () {
	$(this).find('.sub-list-container').hide();
});