var app = angular.module('CrudApp', ["ngRoute", "ui.bootstrap", "ngResource",
    'angular-loading-bar', 'ngAnimate', 'ui.bootstrap.datetimepicker']);
var PATH_API = "http://gaia.local/";

app.run(['$location', '$rootScope', function($location, $rootScope) {
        $rootScope.$on('$routeChangeSuccess', function(event, current, previous) {
            $rootScope.title = current.$$route.title;
        });
    }]);

//app.config(function($httpProvider) {
//    $httpProvider.defaults.transformRequest = function(data) {
//        var str = [];
//        for (var p in data) {
//            data[p] !== undefined && str.push(encodeURIComponent(p) + '=' + encodeURIComponent(data[p]));
//        }
//        return str.join('&');
//    };
//    $httpProvider.defaults.headers.put['Content-Type'] = $httpProvider.defaults.headers.post['Content-Type'] =
//            'application/x-www-form-urlencoded; charset=UTF-8';
//});

app.controller('CtrlMenu', ['$scope', function($scope) {
        $scope.povoarMenu = function() {
            $scope.mainMenu = [
                {"lbl": "Compras", "url": 'compra-pedido', "icon": 'shopping-cart'},
                {"lbl": "Estabelecimentos", "url": 'estabelecimento', "icon": 'university'},
                {"lbl": "Favoritos", "url": 'favorito', "icon": 'bookmark'},
                {"lbl": "Filmes", "url": 'filme', "icon": 'film'},
                {"lbl": "Autor", "url": 'autor', "icon": 'users'},
                {"lbl": "Livros", "url": 'livro', "icon": 'book'},
                {"lbl": "Pasta de Fotos", "url": 'pasta-fotos', "icon": 'folder'},
                {"lbl": "Contato", "url": 'contato', "icon": 'users'},
                {"lbl": "Seriado", "url": 'serie', "icon": 'file-video-o'}
            ];
        };
    }]);