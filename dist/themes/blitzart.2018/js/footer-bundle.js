"use strict";function isIE(e){return(e=e||navigator.userAgent).indexOf("MSIE ")>-1||e.indexOf("Trident/")>-1||e.indexOf("Edge/")>-1}NProgress.start();var interval=setInterval(function(){NProgress.inc()},1e3);$(window).on("load",function(){clearInterval(interval),NProgress.done(),$("html").addClass("js"),console.log("Yuuppy")}),window.onbeforeunload=function(){console.log("triggered"),NProgress.start()};var test="Babel is doing the job. Test";$(window).on("load",function(){console.log(test)});var isMobile=/iPad|iPhone|iPod|Android|webOS|iPhone|BlackBerry|IEMobile|Opera Mini/.test(navigator.userAgent)&&!window.MSStream,header=$(".site-header"),shadow=$(".shadow");$(window).on("load",function(){$(window).scrollTop(0),setTimeout(function(){$(window).scroll(function(){$(window).scrollTop()>=50?(header.addClass("scrolled"),shadow.addClass("scrolled"),search.addClass("scrolled")):(header.removeClass("scrolled"),shadow.removeClass("scrolled"),search.removeClass("scrolled"))})},2e3)});