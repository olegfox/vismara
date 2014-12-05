$(function () {
    catalogFeedback();
});

function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function catalogFeedback() {
    var $form = $('#catalogFeedback');

    $form
        .submit(function () {

            if (IsEmail($form.find("#email").val())) {
                $.post($form.attr('action'), $form.serialize(), function(data){
                    if(data == "ok"){
                        $form.find("#email").val('');
                        $form.find('.form-group').hide();
                        $form.parent().find('h2').hide();
                        $form.find(".successfully").show();
                    }
                });
            }

            return false;
        });
}