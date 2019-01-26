jQuery(document).ready(function($) {  
    $(window).on('load', function () {
        
        const timeline = anime.timeline({
            autoplay: true,
            direction: 'alternate',
            targets: ['#frog #body', '#frog #eye_left', '#frog #eye_right'],
            loop: true,
            offset: '-=1000',
            easing: "easeInOutQuart",
            elasticity: 2000,
            duration: 1750,
        });

        timeline
        .add({
            targets: ['#frog #eye_left', '#frog #eye_right'],
            duration: 3000,
            easing: "easeInOutBack",
            keyframes: [
                {translateY: -5},
                {translateX: 5},
                {translateY: 7},
                {translateX: 0},
                {translateX: -3},
                {translateY: 0},
            ],
            offset: '+=0',
        })
        .add({
            translateY: '+=25',
        })
        .add({
            translateY: '-=20',
        });

        timeline.play();
   
    });    
});