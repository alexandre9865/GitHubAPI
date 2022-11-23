<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Lista de repositórios do GitHub</title>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
        <link rel="stylesheet" href="css/templatemo-style.css">
    </head>
    <body>
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                        <a href="./">
                            <h1 class="bounceIn">Repositórios</h1>
                        </a>
                        </div>
                        <div class="col-sm-8">
                            <a href="#" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Atualizar Lista</span></a>
                        </div>
                    </div>
                </div>
                <div class="table-filter">
                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-8 filters">
                            <button type="button" class="btn btn-primary"><i class="fa fa-search" data-toggle="tooltip" title="Clique para filtrar"></i></button>
                            <div class="filter-group">
                                <label>Nome</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="filter-group">
                                <label>Ativos/Arquivados</label>
                                <select class="form-control">
                                    <option>Todos</option>
                                    <option>Ativos</option>
                                    <option>Arquivados</option>
                                </select>
                            </div>
                            <span class="filter-icon"><i class="fa fa-filter" data-toggle="tooltip" title="Filtros disponíveis"></i></span>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Tipo de repositório</th>
                            <th>Último commit </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Michael Holz</a></td>
                            <td>London</td>
                            <td>Jun 15, 2017</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Paula Wilson</a></td>
                            <td>Madrid</td>
                            <td>Jun 21, 2017</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Antonio Moreno</a></td>
                            <td>Berlin</td>
                            <td>Jul 04, 2017</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Mary Saveley</a></td>
                            <td>New York</td>
                            <td>Jul 16, 2017</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Martin Sommer</a></td>
                            <td>Paris</td>
                            <td>Aug 04, 2017</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <!-- </div> -->
    </body>
</html>