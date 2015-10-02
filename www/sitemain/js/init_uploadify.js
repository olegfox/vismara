$(function () {
    var uploadEnd = 0,
        image = [],
        i = 0;
    $('.uploadify').parent().append("<input type='hidden' name='gallery' class='gallery' />");
    $('.uploadify').uploadifive({
        'auto': false,
        'fileTypeDesc' : 'Image Files',
        'fileTypeExts' : '*.gif; *.jpg; *.png',
        'uploadScript': '/sitemain/js/uploadifive/uploadifive.php',
        'onQueueComplete': function (queueData) {
            uploadEnd = 1;
            $(".gallery").val(JSON.stringify(image));
            $("form").submit();
        },
        'onUploadError': function (file, errorCode, errorMsg, errorString) {
            alert('Файл ' + file.name + ' не может быть загружен: ' + errorString);
        },
        'onUploadComplete': function (file, data, response) {
            image[i] = data;
            i++;
        }
    });

    $("button[type='submit']").click(function () {
        $("form .type-button").remove();
        $("form").prepend("<input type='hidden' class='type-button' name='"+$(this).attr("name")+"' value='1' />");
        $("form").submit(function(){
            if (uploadEnd == 0 && $(".uploadifive-queue *").length > 0) {
                $('.uploadify').uploadifive('upload');
                return false;
            }
        });
    });
});