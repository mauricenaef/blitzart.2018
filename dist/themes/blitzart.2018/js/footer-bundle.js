"use strict";function goBack(){window.history.back()}function isIE(e){return(e=e||navigator.userAgent).indexOf("MSIE ")>-1||e.indexOf("Trident/")>-1||e.indexOf("Edge/")>-1}jQuery(document).ready(function(e){e(window).on("load",function(){var a=anime.timeline({autoplay:!1,duration:5e3}),o=anime({targets:"#loader .bird",d:[{value:["M422.92,269.44c-11.84,0-11.82-18.37,0-18.37S434.74,269.44,422.92,269.44Zm6.72,14.34c28.36-4.54,17.92-46.44-11.1-39.64C384.37,251.91,403.87,287.91,429.64,283.78Zm-290.7,49c2.27-11.88,11.12-27.36,12.93-33.2a32.25,32.25,0,0,1-15.36-.58c1.05-22.6,19-43.12,35.87-55.21-9,3.2-20.28,8.24-30.59,4.85,5.19-10.94,13.64-24.05,23.13-31.48a43.9,43.9,0,0,1,11.41-6.48c-1,.18-2.09.39-3.17.64l-2.39-1.84c-6.06,2.95-18.4,3.73-22.24-2.63-7.38-13.62,28.25-26.49,36.13-31.82A32.32,32.32,0,0,1,173,165c14.93-17,41.76-21.83,62.5-20.71-9-3.1-21-6.24-26.92-15.32,10.89-5.3,25.67-10.26,37.71-10.14,20.15-.1,38.33,17.24,56.69,16.53-10.89-23.88,15.69-4.65,22.23,2.63,10.7,12.75,18.08,26.36,25.15,40.88,8.12,16.66,12.44,33.51,15.07,51.9,31.81-12.72,57.27-19.06,71-12.54a78.85,78.85,0,0,1,14.15,8.57c3.73-18.54,11.23-37.79,15.8-56.06,2.66,16-1.34,41.29,6.65,54.61,13.32,22.64,59.94,9.32,86.57,20-21.77.9-62.09,13.16-87.69,9.36a69.59,69.59,0,0,1,4.74,21.39c1.59,24.71-8.76,52.91-31.43,78.72s-51.54,53.32-91.54,67.83A138.07,138.07,0,0,1,278.52,428c-8.3,4.12-34.29,16.74-45.21,18.92-13.07,2.62-22.83,4-29.48-2.38S200,426.72,200,426.72s15.61,10.79,16.18,11.11c13.5,7.67-32.09,6.33,17.11,2.93,5.21-.36,23.74-10.88,32.54-16a115.78,115.78,0,0,1-13.07-5c-5.92,2.64-11.84,4.92-16.24,5.79-13.08,2.62-22.83,4.05-29.48-2.38s-3.81-17.84-3.81-17.84,15.61,10.78,16.17,11.11c13.51,7.66-32.09,6.33,17.12,2.93,2-.14,5.35-1.37,9.1-3.05-25.81-13-67.92-37.88-115.47-48.57-51-11.45-86.95-20.27-51.95-21.62C95.76,345.47,116.45,340.48,138.94,332.82Z"]},{value:["M433.79,266.44c-11.84,0-11.82-18.37,0-18.37S445.61,266.44,433.79,266.44Zm-4.15,17.34c28.36-4.54,17.92-46.44-11.1-39.64C384.37,251.91,403.87,287.91,429.64,283.78Zm-290.7,49c2.27-11.88,11.12-27.36,12.93-33.2a32.25,32.25,0,0,1-15.36-.58c1.05-22.6,19-43.12,35.87-55.21-9,3.2-20.28,8.24-30.59,4.85,5.19-10.94,13.64-24.05,23.13-31.48a43.9,43.9,0,0,1,11.41-6.48c-1,.18-2.09.39-3.17.64l-2.39-1.84c-6.06,2.95-18.4,3.73-22.24-2.63-7.38-13.62,28.25-26.49,36.13-31.82A32.32,32.32,0,0,1,173,165c14.93-17,41.76-21.83,62.5-20.71-9-3.1-21-6.24-26.92-15.32,10.89-5.3,25.67-10.26,37.71-10.14,20.15-.1,38.33,17.24,56.69,16.53-10.89-23.88,15.69-4.65,22.23,2.63,10.7,12.75,18.08,26.36,25.15,40.88,8.12,16.66,12.44,33.51,15.07,51.9,31.81-12.72,57.27-19.06,71-12.54a78.85,78.85,0,0,1,14.15,8.57c3.73-18.54,11.23-37.79,15.8-56.06,2.66,16-1.34,41.29,6.65,54.61,13.32,22.64,59.94,9.32,86.57,20-21.77.9-62.09,13.16-87.69,9.36a69.59,69.59,0,0,1,4.74,21.39c1.59,24.71-8.76,52.91-31.43,78.72s-51.54,53.32-91.54,67.83A138.07,138.07,0,0,1,278.52,428c-8.3,4.12-34.29,16.74-45.21,18.92-13.07,2.62-22.83,4-29.48-2.38S200,426.72,200,426.72s15.61,10.79,16.18,11.11c13.5,7.67-32.09,6.33,17.11,2.93,5.21-.36,23.74-10.88,32.54-16a115.78,115.78,0,0,1-13.07-5c-5.92,2.64-11.84,4.92-16.24,5.79-13.08,2.62-22.83,4.05-29.48-2.38s-3.81-17.84-3.81-17.84,15.61,10.78,16.17,11.11c13.51,7.66-32.09,6.33,17.12,2.93,2-.14,5.35-1.37,9.1-3.05-25.81-13-67.92-37.88-115.47-48.57-51-11.45-86.95-20.27-51.95-21.62C95.76,345.47,116.45,340.48,138.94,332.82Z"]}],duration:2e3,loop:!0,direction:"alternate",easing:"cubicBezier(.5, .5, .1, .3)",translateY:"-=100",translateX:150,elasticity:800,offset:2500}),i=anime({targets:"#loader",duration:1e3,background:"#fff",offset:2500});a.add(o).add({targets:"#loader .bird",translateX:"100000px",direction:"normal",duration:550,easing:"easeInExpo",loop:!1}).add({targets:"#loader .bird",offset:150,translateX:"100000px",opacity:0}).add(i),a.play(),setTimeout(function(){e("#loader").fadeOut(250,function(){e(this).remove()})},2500)})}),$(window).on("load",function(){$(".gallery, .images, .wp-block-gallery, .wp-block-image").length>0&&$(".gallery, .images, .wp-block-gallery, .wp-block-image").lightGallery({selector:"a",share:!1,thumbnail:!0,download:!0,controls:!0,html:!0,getCaptionFromTitleOrAlt:!0,hash:!1})});var isMobile=/iPad|iPhone|iPod|Android|webOS|iPhone|BlackBerry|IEMobile|Opera Mini/.test(navigator.userAgent)&&!window.MSStream,header=$(".site-header"),shadow=$(".shadow");$(window).on("load",function(){$(window).scrollTop(0),setTimeout(function(){$(window).scroll(function(){$(window).scrollTop()>=50?(header.addClass("scrolled"),shadow.addClass("scrolled")):(header.removeClass("scrolled"),shadow.removeClass("scrolled"))})},2e3)});