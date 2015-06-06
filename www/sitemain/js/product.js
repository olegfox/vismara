function loadImage($img){
    $img.one("load", function() {
        cropImage($img);
        setTimeout(function(){
            $img.css({
                'visibility' : 'visible'
            });
        }, 200);
    }).each(function() {
        if(this.complete) $(this).load();
    });
};

function showProduct(product){
    var isEmpty = 0;
    if($(".wrap-window-product").length > 0){
        $(".wrap-window-product").remove();
        isEmpty = 1;
    }

    $('body').append(JSON.parse($(product).data("html")));

    if(isEmpty == 1){
        $(".wrap-window-product .left").removeClass('wowload');
        $(".wrap-window-product .right").removeClass('wowload');
    }

    $(".wrap-window-product *").unbind('click').click(function(e) {
        e.stopPropagation();
    });

    $(".wrap-window-product, .wrap-window-product .close").unbind('click').click(function(){
        $(".wrap-window-product").remove();
    });

    var $img = $(".wrap-window-product .image img");

    loadImage($img);

    $(window).resize(function(){
        cropImage($img);
    });

    $(".wrap-window-product .right").unbind('click').click(function(){
        showProduct($(product).parent().next().find('a:first'));
    });

    $(".wrap-window-product .left").unbind('click').click(function(){
        showProduct($(product).parent().prev().find('a:first'));
    });

    if($(product).parent().next().find('a:first').length <= 0){
        $(".wrap-window-product .right").hide();
    }else{
        $(".wrap-window-product .right").show();
    }

    if($(product).parent().prev().find('a:first').length <= 0){
        $(".wrap-window-product .left").hide();
    }else{
        $(".wrap-window-product .left").show();
    }

    //  Инициализация вау-эффектов
    var wow = new WOW(
        {
            boxClass: 'wowload',      // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 0,          // distance to the element when triggering the animation (default is 0)
            mobile: true,       // trigger animations on mobile devices (default is true)
            live: true        // act on asynchronously loaded content (default is true)
        }
    );
    wow.init();

    $(".wrap-window-product").css({
        'visibility' : 'visible'
    });
}

function cropImage($img){
    if($img.width() > $img.height()){
        $img.css({
            "width" : $(".wrap-window-product .image").width(),
            "height" : "auto"
        });

        if($img.height() > $(".wrap-window-product .image").height()){
            $img.css({
                "width" : "auto",
                "height" : $(".wrap-window-product .image").height()
            });
        }
    }else{
        $img.css({
            "width" : "auto",
            "height" : $(".wrap-window-product .image").height()
        });

        if($img.width() > $(".wrap-window-product .image").width()){
            $img.css({
                "width" : $(".wrap-window-product .image").width(),
                "height" : "auto"
            });
        }
    }
}

function showThumbnailProduct(src){
    var $img = $(".wrap-window-product .image img");

    $img.attr('src', src);
    $img.css({
        "width" : "auto",
        "height" : "auto",
        "visibility" : "hidden"
    });
    loadImage($img);
}