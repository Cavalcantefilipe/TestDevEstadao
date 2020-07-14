<!DOCTYPE html><html class=''>
<head>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link href="{{ URL::asset('css/Carro.css') }}" rel="stylesheet">
    <script src="{{ asset('js/Carro.js') }}" defer></script>
</head>
<body>
<div class="menu">
    <article class="session">
        <div id="div-add">
        <button id="add-row" type="button" class="btn btn-primary btn-md left-block">
            <span class="glyphicon glyphicon-plus"></span>Adicionar Carro
          </button>
        </div>
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="table-responsive">
                     <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th>Id</th>
                           <th>Marca</th>
                           <th>Modelo</th>
                           <th>Ano</th>
                           <th>Editar</th>
                           <th>Deletar</th>
                        </thead>
                        <tbody>
                        </tbody>
                     </table>

                  </div>
               </div>
            </div>
         </div>
         <div class="modal fade" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="ItemForm" name="ItemForm" class="form-horizontal">
                           <input type="hidden" name="Item_id" id="Item_id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Marca</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="marcas" id="marcas-edit">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Modelo</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Enter Modelo" value="" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Ano</label>
                                <div class="col-sm-12">
                                    <input class="form-control" id="ano" name="ano" type="number" min="0"  placeholder="Ano" value="">
                                </div>
                            </div>
                            <div class="col-sm-offset-2 col-sm-10">
                             <button type="button" class="btn btn-primary" id="saveBtn" value="create">Salvar Mudaças
                             </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         </div>

         <div class="modal fade" id="ModalAdd" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading">Adicionar Carro</h4>
                    </div>
                    <div class="modal-body">
                        <form id="ItemForm" name="ItemForm" class="form-horizontal">
                           <input type="hidden" name="Item_id" id="Item_id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Marca</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="marcas" id="marcas-add">
                                    </select>   
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Modelo</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="modeloAdd" name="modelo" placeholder="Enter Modelo" value="" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Ano</label>
                                <div class="col-sm-12">
                                    <input class="form-control" id="anoAdd" name="ano" type="number" min="0"  placeholder="Ano" value="">
                                </div>
                            </div>
                            <div class="col-sm-offset-2 col-sm-10">
                             <button type="button" class="btn btn-primary" id="addBtn" value="create">Adicionar Carro
                             </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         </div>

    </div>
</article>
</div>
</body>
</html>