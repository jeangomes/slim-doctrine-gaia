app.config(['$routeProvider', function($routeProvider) {
        $routeProvider.
                when('/add-compra-pedido', {title: 'Compras', templateUrl: 'views/compra/cadastrar.html', controller: 'CompraCtrl'}).
                when('/compra-pedido', {title: 'Lista de Compras', templateUrl: 'views/compra/lista.html', controller: 'CompraCtrl'}).
                when('/livro', {title: 'Lista de Livros', templateUrl: 'views/livro/lista.html', controller: 'LivroCtrl'}).
                when('/autor', {title: 'Lista de Autor', templateUrl: 'views/autor/lista.html', controller: 'AutorCtrl'}).
                when('/add-autor', {title: 'Cadastro de Autor', templateUrl: 'views/autor/form.html', controller: 'AutorCtrl'}).
                when('/edit-autor/:id', {title: 'Edição de Autor', templateUrl: 'views/autor/form.html', controller: 'AutorCtrl'}).
                //when('/add-livro', {templateUrl: 'views/add-new.html', controller: AddCtrl}).
                otherwise({redirectTo: '/'});
    }]);