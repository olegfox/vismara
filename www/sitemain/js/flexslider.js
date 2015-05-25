$(window).load(function () {
    $('.flexslider').flexslider({
        animation: "fade",
        animationSpeed: 1000,
        slideshowSpeed: 3000,
        controlNav: false,
        before: function(slider) {
            if(slider.currentSlide == 0){
                $('.flexslider').flexslider("pause");
                setTimeout(function(){
                    $('.flexslider').flexslider("play");
                }, 10000);
            }
        }
    });
});