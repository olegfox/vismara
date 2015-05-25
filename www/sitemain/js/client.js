(function () {
    var client = angular.module('client', ['ng.shims.placeholder']).config(function($interpolateProvider){
            $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
        }
    );

    client.controller('ClientController', ['$scope', function ($scope) {
        $scope.clear = function(){
            $scope.user = {};
        };

        $scope.submit=function(){
            $.post($('form').attr('action'), $('form').serialize(), function(data){
                window.location.href = data;
            }).fail(function(){
                alert($('.error').html());
            });
        }
    }]);

}());