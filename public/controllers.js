app.controller('CompraCtrl', ['$scope', '$http', 'CompraService', '$location',
    function($scope, $http, CompraService, $location) {
        $scope.compra = {};
        $scope.compra.desconto = 0;
        $scope.compra.imposto = '';
        $scope.compra.obs = '';
        $scope.compra.tags = '';
        $scope.compra.vendedor_caixa = '';
        $scope.compra.itensCupom = [];

        $scope.load = function() {
            $scope.compras = CompraService.query();
        };


        $scope.processar = function(compra) {
            if (compra.id) {
                $scope.result = CompraService.update({id: compra.id}, compra, function(data) {
                    $location.path('/compra-pedido');
                });
            } else {
                $scope.result = CompraService.save(compra);
                //$location.path('/compra-pedido');
            }
        };

        $scope.init = function() {
            $scope.adicionar($scope.compra.itensCupom);

            $http.get('http://gerenciagaia.local/compra-pedido/autocomplete-item').success(function(data) {
                $scope.produtos = data.dados;
            });

            $http.get(PATH_API + 'tipocompra').success(function(data) {
                $scope.tiposCompra = data.tipos;
            });

            $http.get(PATH_API + 'formapgto').success(function(data) {
                $scope.formasPgto = data.formas;
            });

            $http.get(PATH_API + 'categoriaestabelecimento').success(function(data) {
                $scope.categoriasEstab = data.categorias;
            });

            $scope.$watch('compra.categoriaestab', function(newVal) {
                if (newVal)
                    $http.get(PATH_API + 'estabelecimentocat/' + newVal).success(function(data) {
                        $scope.estabelecimentos = data.estabelecimentos;
                    });
            });
//            $scope.$watch('city', function(newVal) {
//                if (newVal)
//                    $scope.suburbs = ['SOMA', 'Richmond', 'Sunset'];
//            });
        };

        $scope.sumVTotal = function(item) {
            var vt = item.vQtd * item.vVal_unit;
            var vtf = vt - item.vDesconto;
            item.vTotal = $scope.arredondar(vtf);
            $scope.totalCupom();
        };

        $scope.arredondar = function(valor) {
            if (!isNaN(valor)) {
                return Math.round(valor * 100) / 100;
            } else {
                return 0;
            }

        };

        $scope.adicionar = function(t) {
            t.push({
                vQtd: '',
                vVal_unit: '',
                vDesconto: '',
                vTotal: 0,
                vDescricao: ''
            });
        };

        $scope.totalCupom = function() {
            var total = 0;
            for (var i = 0, len = $scope.compra.itensCupom.length; i < len; i++) {
                total = total + $scope.compra.itensCupom[i].vTotal; //$scope.compra.itensCupom[i].vVal_unit * $scope.compra.itensCupom[i].vQtd;
            }
            $scope.compra.subtotal = $scope.arredondar(total);
            $scope.compra.valor_total = $scope.arredondar(total);
            $scope.verificarFormaPgto();
        };

        $scope.verificarFormaPgto = function() {
            if ($scope.compra.forma_pagamento === 4 || $scope.compra.forma_pagamento === 5 || $scope.compra.forma_pagamento === 6) {
                $scope.compra.dinheiro = $scope.compra.valor_total;
            } else {
                $scope.compra.dinheiro = '';
            }
            $scope.calculaTroco($scope.compra.dinheiro, $scope.compra.valor_total);
        };

        $scope.calculaDesconto = function(desconto, subtotal) {
            $scope.compra.valor_total = subtotal - desconto;
        };

        $scope.calculaTaxa = function(taxa, subtotal, desconto) {
            $scope.compra.valor_total = (parseFloat(taxa) + (subtotal - desconto));
        };

        $scope.calculaTroco = function(dinheiro, valor_total) {
            var troco = dinheiro - valor_total;
            $scope.compra.troco = $scope.arredondar(troco);
        };

        $scope.arredondar = function(valor) {
            if (!isNaN(valor)) {
                return Math.round(valor * 100) / 100;
            } else {
                return 0;
            }

        };

        $scope.remove = function(index) {
            $scope.compra.itensCupom.splice(index, 1);
            $scope.totalCupom();
        };

    }
]);

app.controller('AutorCtrl', ['$scope', 'AutorService', '$routeParams', '$location',
    function($scope, AutorService, $routeParams, $location) {
        $scope.load = function() {
            $scope.autores = AutorService.query();
        };
        $scope.delete = function(id, index) {
            if (confirm('Deseja realmente excluir esse registro?')) {
                AutorService.remove({id: id});
                $scope.load();
            }
        };
        $scope.processar = function(autor) {
            if (autor.id) {
                $scope.result = AutorService.update({id: autor.id}, autor, function(data) {
                    $location.path('/autor');
                });
            } else {
                $scope.result = AutorService.save(autor);
                $location.path('/autor');
            }
        };
        $scope.get = function() {
            if ($routeParams.id) {
                $scope.autor = AutorService.get({id: $routeParams.id});
            }
        };
    }
]);

app.controller('LivroCtrl', ['$scope', '$http',
    function($scope, $http) {
        $http.get(PATH_API + 'livro').success(function(data) {
            $scope.livros = data;
        });
    }
]);