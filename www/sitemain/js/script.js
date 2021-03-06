var speed = 500;
$(function () {
    if($(window).width() > 800){
        $(".logo, nav.layout, .main *").css("opacity", 0);
    }
    $(".slider").animate({
        "opacity" : 1
    }, {
        duration: speed*2,
        complete: function(){
            $(".logo").animate({
                    "opacity" : 1
                },
                {
                    duration: speed
                }
            );
            $(".nav.layout").animate({
                    "opacity" : 1
                },
                {
                    duration: speed
                }
            );
        }
    });
});

$(window).scroll(function () {
    if($(window).width() < 800){
        if ($(".main *").css("opacity") == 0) {
            $(".main *").animate({opacity: 1}, speed);
        }
        //if ($(".gallery div").eq(0).css("opacity") == 0) {
        //    $(".gallery div").each(function (i) {
        //        $(this).delay((i++) * 100).fadeTo(speed, 1);
        //    });
        //}
    }else{
        if ($(window).scrollTop() + $(window).height() - 100 >= $(".main").offset().top) {
            if ($(".main *").css("opacity") == 0) {
                $(".main *").animate({opacity: 1}, speed);
            }
        }
        //if ($(window).scrollTop() + $(window).height() - 100 >= $(".gallery").offset().top) {
        //    if ($(".gallery div").eq(0).css("opacity") == 0) {
        //        $(".gallery div").each(function (i) {
        //            $(this).delay((i++) * 100).fadeTo(speed, 1);
        //        });
        //    }
        //}
    }
});