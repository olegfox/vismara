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

function showProduct(product, animate){
    var isEmpty = 0;

    animate = animate || 1;

    if($(".wrap-window-product").length > 0){
        $(".wrap-window-product").remove();
        isEmpty = 1;
    }

    $('body').append(JSON.parse($(product).data("html")));

    if (window.history.pushState) {
        window.history.pushState(null, null, $(product).attr("href"));
    }

    if(isEmpty == 1){
        $(".wrap-window-product .left").removeClass('wowload');
        $(".wrap-window-product .right").removeClass('wowload');
    }

    if(animate == 2){
        $('.wowload').removeClass('wowload');
        $('.window-product').css({
            'visibility': 'visible'
        });
    }

    $(".wrap-window-product *").unbind('click').click(function(e) {
        e.stopPropagation();
    });

    $(".wrap-window-product, .wrap-window-product .close").unbind('click').click(function(){
        $(".wrap-window-product").remove();
        window.history.back();
    });

    $(".wrap-window-product .sendMessage").unbind('click').click(function(){
        $(".wrap-window-product .sendMessage").hide();
        $(".wrap-window-product .box-product .description").hide();
        $(".wrap-window-product .box-product .form").show();
        $(".wrap-window-product .form #submit").click(function(){
            var $form = $(".wrap-window-product .form form");
            $.post($form.attr('action'), $form.serialize(), function(response){
                if(response.status == "OK"){
                    $form[0].reset();
                    $form.find('input[type="text"]').removeClass('error');
                    $form.find('input[type="email"]').removeClass('error');
                    $form.find('textarea').removeClass('error');
                    $form.find('.successfully').show();
                    setTimeout(function(){
                        $form.find('.successfully').hide();
                    }, 4000);
                }else{
                    if(response.firstname.status != "OK"){
                        $form.find('#firstname').addClass('error');
                    } else {
                        $form.find('#firstname').removeClass('error');
                    }
                    if(response.lastname.status != "OK"){
                        $form.find('#lastname').addClass('error');
                    } else {
                        $form.find('#lastname').removeClass('error');
                    }
                    if(response.country.status != "OK"){
                        $form.find('#country').addClass('error');
                    } else {
                        $form.find('#country').removeClass('error');
                    }
                    if(response.email.status != "OK"){
                        $form.find('#email_first').addClass('error');
                        $form.find('#email_second').addClass('error');
                    } else {
                        $form.find('#email_first').removeClass('error');
                        $form.find('#email_second').removeClass('error');
                    }
                    if(response.phone.status != "OK"){
                        $form.find('#phone').addClass('error');
                    } else {
                        $form.find('#phone').removeClass('error');
                    }
                }
            });
        });
    });

    $(".wrap-window-product #back").unbind('click').click(function(){
        $(".wrap-window-product .sendMessage").show();
        $(".wrap-window-product .box-product .description").show();
        $(".wrap-window-product .box-product .form").hide();
    });

    var $img = $(".wrap-window-product .image img");

    loadImage($img, 800);

    $(window).resize(function(){
        cropImage($img, 800);
    });

    $(".wrap-window-product .right").unbind('click').click(function(){
        showProduct($(product).parent().next().find('a:first'), 2);
    });

    $(".wrap-window-product .left").unbind('click').click(function(){
        showProduct($(product).parent().prev().find('a:first'), 2);
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

    $("body").unbind('keydown').keydown(function(e) {
        if(e.keyCode == 37) { // left
            $(".wrap-window-product .left").click();
        }
        else if(e.keyCode == 39) { // right
            $(".wrap-window-product .right").click();
        }
        else if(e.keyCode == 27) { // close
            $(".wrap-window-product, .wrap-window-product .close").click();
        }
    });

    // Кнопки переключения фотографий в окошке продукта
    $(".wrap-window-product .n-left").click(function(){
        var url = $(".wrap-window-product .table-cell img").attr('src');

        $(".wrap-window-product .gallery-list ul li a").each(function(i, e){
            if($(e).attr('href').indexOf(url) != -1) {
                if ($(e).parent().prev().find('a').attr('href') == undefined) {
                    window.location.href = $(".wrap-window-product .gallery-list ul li a:last").attr('href');
                } else {
                    window.location.href = $(e).parent().prev().find('a').attr('href');
                }
            }
        });
    });

    $(".wrap-window-product .n-right").click(function(){
        var url = $(".wrap-window-product .table-cell img").attr('src');

        $(".wrap-window-product .gallery-list ul li a").each(function(i, e){
            if($(e).attr('href').indexOf(url) != -1){
                if($(e).parent().next().find('a').attr('href') == undefined){
                    window.location.href = $(".wrap-window-product .gallery-list ul li a:first").attr('href');
                }else{
                    window.location.href = $(e).parent().next().find('a').attr('href');
                }
            }
        });
    });

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

    return false;
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
    console.log('click product');
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