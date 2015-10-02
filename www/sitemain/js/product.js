function loadImage($img, width){
    $img.one("load", function() {
        if(width){
            cropImage($img, width);
        }else{
            cropImage($img);
        }
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

    loadImage($img, 800);

    $(window).resize(function(){
        cropImage($img, 800);
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

function cropImage($img, w){
    if($img.width() > $img.height()){
        var width = $img.width(),
            height = $img.height();

        var coef = width/height;

        if($(".wrap-window-product .image").width() > w){
            width = w;
        }else{
            width = $(".wrap-window-product .image").width();
        }

        $img.css({
            "width" : width,
            "height" : "auto"
        });

        if($img.height() > $(".wrap-window-product .image").height()){

            if($(".wrap-window-product .image").height()*coef > w){
                height = w/coef;
            }else{
                height = $(".wrap-window-product .image").height();
            }

            $img.css({
                "width" : "auto",
                "height" : height
            });
        }
    }else{
        var width = $img.width(),
            height = $img.height();

        var coef = width/height;

        if($(".wrap-window-product .image").height()*coef > w){
            height = w/coef;
        }else{
            height = $(".wrap-window-product .image").height();
        }

        $img.css({
            "width" : "auto",
            "height" : height
        });

        if($img.width() > $(".wrap-window-product .image").width()){
            if($(".wrap-window-product .image").width() > w){
                width = w;
            }else{
                width = $(".wrap-window-product .image").width();
            }

            $img.css({
                "width" : width,
                "height" : "auto"
            });
        }
    }
}

function showThumbnailProduct(src, first){
    var $img = $(".wrap-window-product .image img"),
        width = 500;


    if(first){
        width = 800;
    }

    $img.attr('src', src);
    $img.css({
        "width" : "auto",
        "height" : "auto",
        "visibility" : "hidden"
    });
    loadImage($img, width);
}