jQuery(document).ready(function($) {  
    $(window).on('load', function () {

        const timeline = anime.timeline({
            autoplay: true,
            direction: 'alternate',
            targets: '#eye',
            loop: true,
            offset: '-=900',
            duration: 800,
        });

        timeline
        .add({
            translateY: '+=3',
            translateX: '+=3',
        })
        .add({
            translateY: '+=2',
            translateX: 0,
            delay: 1000,
        })
        .add({
            translateY: '-=3',
            translateX: '-=3',
        })
        .add({
            translateY: '+=3',
            translateX: '+=3',
            delay: 1000,
        })
        .add({
            translateY: 0,
            translateX: 0,
        })
        .add({
            translateY: '-=3',
            translateX: '+=3',
        });

        timeline.play();

    });    
});