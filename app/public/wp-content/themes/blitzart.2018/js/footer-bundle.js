'use strict';

// Show the progress bar
NProgress.start();

// Increase randomly
var interval = setInterval(function () {
	NProgress.inc();
}, 1000);

// Trigger finish when page fully loaded
$(window).on('load', function () {
	clearInterval(interval);
	NProgress.done();
	$('html').addClass('js');
	console.log('Yuuppy');
});

// Trigger bar when exiting the page
window.onbeforeunload = function () {
	console.log("triggered");
	NProgress.start();
};
'use strict';

var test = 'Babel is doing the job. Test';

$(window).on('load', function () {
	console.log(test);
});

var isMobile = /iPad|iPhone|iPod|Android|webOS|iPhone|BlackBerry|IEMobile|Opera Mini/.test(navigator.userAgent) && !window.MSStream;
var header = $('.site-header');
var shadow = $('.shadow');

function isIE(userAgent) {
	userAgent = userAgent || navigator.userAgent;
	return userAgent.indexOf("MSIE ") > -1 || userAgent.indexOf("Trident/") > -1 || userAgent.indexOf("Edge/") > -1;
}

$(window).on('load', function () {
	$(window).scrollTop(0);
	setTimeout(function () {
		$(window).scroll(function () {
			var scroll = $(window).scrollTop();
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
//# sourceMappingURL=footer-bundle.js.map
