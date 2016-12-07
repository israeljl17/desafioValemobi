// angular js codes will be here
var app = angular.module('myApp', ['angularUtils.directives.dirPagination']);
app.controller('mercadoriasCtrl', function($scope, $http) {
    // more angular JS codes will be here
    $scope.showCreateForm = function(){
        // clear form
        $scope.clearForm();

        // change modal title
        $('#modal-mercadoria-title').text("Nova Mercadoria");

        // show create mercadoria button
        $('#btn-create-mercadoria').show();

    };

    // clear variable / form values
    $scope.clearForm = function(){
        $scope.codigoMercadoria = "";
        $scope.tipoMercadoria  = "";
        $scope.nomeMercadoria  = "";
        $scope.quantidade  = "";
        $scope.preco = "";
        $scope.tipoNegocio = "";

        $scope.formMercadoria.$setPristine();
    };

    // create new mercadoria
    $scope.createMercadoria = function(){

        // fields in key-value pairs
        $http.post('create_mercadoria.php', {
                'tipoMercadoria' : $scope.tipoMercadoria,
                'nomeMercadoria' : $scope.nomeMercadoria,
                'quantidade' : $scope.quantidade,
                'preco' : $scope.preco,
                'tipoNegocio' : $scope.tipoNegocio
            }
        ).success(function (data, status, headers, config) {
            console.log(data);
            // tell the user new mercadoria was saved
            Materialize.toast(data, 4000);

            // close modal
            $('#modal-mercadoria-form').modal('close');

            // clear modal content
            $scope.clearForm();

            // refresh the list
            $scope.getAll();
        });
    };

    // read products
    $scope.getAll = function(){
        $http.get("read_mercadorias.php").success(function(response){
            $scope.mercadorias = response.records;
        });
    };

});
