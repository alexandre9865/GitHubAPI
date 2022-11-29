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
        <link rel="stylesheet" href="../css/templatemo-style.css">
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
                    </div>
                </div>
                <div class="table-filter">
                    <div class="row">
                        <div class="col-sm-12 filters">
                            <button type="button" class="btn btn-primary" onclick="buscaRepos('nome_repo', 'asc', true)"><i class="fa fa-search" data-toggle="tooltip" title="Clique para filtrar"></i></button>
                            <div class="filter-group">
                                <label>Nome</label>
                                <input id="nome" type="text" class="form-control">
                            </div>
                            <div class="filter-group">
                                <label>Ativos/Arquivados</label>
                                <select id="status" class="form-control">
                                    <option value="">Todos</option>
                                    <option value="0">Ativos</option>
                                    <option value="1">Arquivados</option>
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
                            <th id="repo_name" class="orderable" data-name="nome_repo">Nome</th>
                            <th class="orderable" data-name="status">Tipo de repositório</th>
                            <th class="orderable" data-name="commit">Último commit </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script>
            var usuario = '<?= $_GET['usuario'] ?>';
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();

                if(usuario==''){
                    window.location.href = './index.php?erroRepo'
                }

                buscaRepos('nome_repo', 'asc', true)

                $('table.table.table-striped.table-hover thead tr th.orderable').on('click', function(elem, index){
                    if($(this).find("#seta.fa-caret-up").length) {
                        $("#seta").remove()
                        $(this).append('<i id="seta" style="font-size:22px; float:right" class="fa fa-caret-down"></i>');
                        buscaRepos($(this).data('name'), "asc")
                    }else if($(this).find("#seta").length) {
                        $("#seta").remove()
                        $(this).append('<i id="seta" style="font-size:22px; float:right" class="fa fa-caret-up"></i>');
                        buscaRepos($(this).data('name'), "desc")
                    } else {
                        $("#seta").remove()
                        $(this).append('<i id="seta" style="font-size:22px; float:right" class="fa fa-caret-down"></i>');
                        buscaRepos($(this).data('name'), "asc")
                    }
                });
            });

            function buscaRepos(ordemCampo = "nome_repo", ordemTipo = "asc", newSearch = false){

                if(newSearch){
                    $("#seta").remove()
                    $('#repo_name').append('<i id="seta" style="font-size:22px; float:right" class="fa fa-caret-down"></i>');
                }

                $.ajax({
                    type: "POST",
                    data: {
                        nome: $("#nome").val(),
                        status: $("#status").val(),
                        ordemCampo: ordemCampo,
                        ordemTipo: ordemTipo,
                        usuario: usuario
                    },
                    url: "listarHandler.php",
                    dataType: "json",
                    async: false,
                    success: function(resultado) {
                        if(resultado.success){
                            $('table.table.table-striped.table-hover tbody').html('');
                            resultado.dados.forEach(function(currentValue, index, arr){
                                insereRegistro(currentValue, index);
                            });

                        }
                    }
                });
            }

            function insereRegistro(repositorio, index){
                let tr = $("<tr>");
                let statusRepo
                if(repositorio.archivado==='0'){
                    statusRepo = "Ativo";
                }else{
                    statusRepo = "Arquivado";
                }
                if(repositorio.data_ultimo_commit===null){
                    repositorio.data_ultimo_commit = "Nunca feito";
                }
                $("<tr>", { text: "Hej" }).appendTo("#contentl1");
                tr.append('<td>'+(index+1)+'</td>')
                tr.append('<td>'+repositorio.nome_repo+'</td>')
                tr.append('<td>'+statusRepo+'</td>')
                tr.append('<td>'+repositorio.data_ultimo_commit+'</td>')
                $('table.table.table-striped.table-hover tbody').append(tr);
            }
        </script>
    </body>
</html>
