const test = 'Babel is doing the job. Test';

$(window).on('load', function () {
	console.log(test);
});


const isMobile = /iPad|iPhone|iPod|Android|webOS|iPhone|BlackBerry|IEMobile|Opera Mini/.test(navigator.userAgent) && !window.MSStream;
const header = $('.site-header');
const shadow = $('.shadow');


function isIE(userAgent) {
	userAgent = userAgent || navigator.userAgent;
	return userAgent.indexOf("MSIE ") > -1 || userAgent.indexOf("Trident/") > -1 || userAgent.indexOf("Edge/") > -1;
}

$(window).on('load', function () {
	$(window).scrollTop(0);
	setTimeout(function () {
		$(window).scroll(function () {
			let scroll = $(window).scrollTop();
			if (scroll >= 50) {
				header.addClass('scrolled');
				shadow.addClass('scrolled');
				search.addClass('scrolled');
			} else {
				header.removeClass('scrolled');
				shadow.removeClass('scrolled');
				search.removeClass('scrolled');
			}
		});

	}, 2000);
});
