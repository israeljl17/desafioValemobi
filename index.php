<!DOCTYPE html>
<html>
  <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Lista de Operações</title>

      <!-- include material design CSS -->
      <link rel="stylesheet" href="libs/css/materialize.min.css" />

      <link rel="stylesheet" href="libs/css/custom.css" />

      <!-- include material design icons-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

  </head>
  <body>

    <!-- page content and controls will be here -->
    <!-- js/mercadoriasCtrl.js using AngularJS to control requisitions -->
    <div class="container" ng-app="myApp" ng-controller="mercadoriasCtrl">
        <div class="row">
            <div class="col s12">
                <h4>Lista de Operações</h4>
                <!-- used for searching the current list -->
                <input type="text" ng-model="search" class="form-control" placeholder="Pesquisar..." />

                <!-- table that shows mercadoria record list -->
                <table class="hoverable bordered">

                    <thead>
                        <tr>
                            <th class="text-align-center">Codigo</th>
                            <th class="width-30-pct">Tipo Mercadoria</th>
                            <th class="width-30-pct">Nome Mercadoria</th>
                            <th class="text-align-center">Quantidade</th>
                            <th class="text-align-center">Preco</th>
                            <th class="text-align-center">Tipo Negocio</th>
                        </tr>
                    </thead>

                    <tbody ng-init="getAll()">
                        <tr dir-paginate="m in mercadorias | filter:search | orderBy:sortKey:reverse | itemsPerPage:6" pagination-id="prodx">
                            <td class="text-align-center">{{ m.codigoMercadoria }}</td>
                            <td>{{ m.tipoMercadoria }}</td>
                            <td>{{ m.nomeMercadoria }}</td>
                            <td class="text-align-center">{{ m.quantidade }}</td>
                            <td class="text-align-center">{{ m.preco }}</td>
                            <td class="text-align-center">{{ m.tipoNegocio }}</td>
                        </tr>
                    </tbody>
                </table>

                <!-- angular pagination -->
                <dir-pagination-controls pagination-id="prodx" boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="dir_pagination.tpl.html"></dir-pagination-controls>

                <!-- modal for creating new mercadoria -->
                <div id="modal-mercadoria-form" class="modal">
                    <div class="modal-content">
                        <h4 id="modal-mercadoria-title">Nova Mercadoria</h4>

                        <form name="formMercadoria">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input ng-model="tipoMercadoria" type="text" name="tipoMercadoria" ng-required="true">
                                    <label for="tipoMercadoria">Tipo Mercadoria</label>
                                </div>

                                <div class="input-field col s12">
                                    <input ng-model="nomeMercadoria" type="text" name="nomeMercadoria" ng-required="true"/>
                                    <label for="nomeMercadoria">Nome Mercadoria</label>
                                </div>

                                <div class="input-field col s4">
                                    <input ng-model="quantidade" type="number" name="quantidade" ng-required="true"/>
                                    <label data-error="wrong" for="quantidade">Quantidade</label>
                                </div>

                                <div class="input-field col s4">
                                    <input ng-model="preco" type="number" step="any" name="preco" ng-required="true"/>
                                    <label for="preco">Preco</label>
                                </div>

                                <div class="input-field col s4">
                                    <select ng-model="tipoNegocio" type="text" name="tipoNegocio" ng-required="true">
                                       <option value="" disabled selected>Escolha uma opção:</option>
                                       <option value="Compra">Compra</option>
                                       <option value="Venda">Venda</option>
                                   </select>
                                   <label for="tipoNegocio">Tipo Negocio</label>
                                </div>

                                <div class="input-field col s4">
                                    <span ng-show="formMercadoria.$invalid">Preencha todos os campos!</span>
                                </div>

                                <div class="input-field col s12">
                                    <a id="btn-create-mercadoria" class="waves-effect waves-light btn margin-bottom-1em" ng-disabled="formMercadoria.$invalid" ng-click="createMercadoria()"><i class="material-icons left">add</i>Create</a>
                                    <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em" ng-click="clearForm()"><i class="material-icons left">close</i>Close</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- floating button for creating mercadoria -->
                <div class="fixed-action-btn" style="bottom:45px; right:24px;">
                    <a class="waves-effect waves-light btn modal-trigger btn-floating btn-large red" href="#modal-mercadoria-form" ng-click="showCreateForm()"><i class="large material-icons">add</i></a
                </div>
            </div> <!-- end col s12 -->
        </div> <!-- end row -->
    </div> <!-- end container -->

    <!-- include jquery -->
    <script type="text/javascript" src="libs/js/jquery.js"></script>

    <!-- material design js -->
    <script src="libs/js/materialize.min.js"></script>

    <!-- include angular js -->
    <script src="libs/js/angular.min.js"></script>

    <!-- include angular pagination -->
    <script src="libs/js/dirPagination.js"></script>

    <!-- js/mercadoriasCtrl.js using AngularJS to control requisitions -->
    <script src="libs/js/mercadoriasCtrl.js"></script>

    <script>
      // jquery codes will be here
      $(document).ready(function(){
          // initialize modal
          $('.modal').modal();
          // initialize select
          $('select').material_select();
      });
    </script>

  </body>
</html>
