(function () {
    var feedback = angular.module('feedback', ['ng.shims.placeholder']).config(function($interpolateProvider){
            $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
        }
    );

    feedback.controller('FeedbackController', ['$scope', function ($scope) {
        $scope.clear = function(){
            $scope.user = {};
        };

        $scope.submit=function(){
            $.post($('form').attr('action'), $('form').serialize(), function(data){
                if(data == 'ok'){
                    $('input[type=text], input[type=email], textarea#message').val('');
                    $('input[type=checkbox]').prop('checked', false);
                    $('button#submit').attr('disabled', 'disabled');
                    $scope.clear();
                    alert('Письмо успешно отправлено!');
                }else{
                    alert("Ошибка");
                }
            });
        }
    }]);

}());