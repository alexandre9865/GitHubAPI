<?php
require_once '../RepositorioController.php';

if(isset( $_POST['usuario'] )) {
     $dados = [];
     $dados['usuario'] = $_POST['usuario'];
     $dados['nome_repo'] = $_POST['nome'];
     $dados['archivado'] = $_POST['status'];
     $dados['ordemCampo'] = $_POST['ordemCampo'];
     switch($dados['ordemCampo']){
          case 'nome_repo':
               $dados['ordemCampo'] = 'nome_repo';
          break;
          case 'status':
               $dados['ordemCampo'] = 'archivado';
          break;
          case 'commit':
               $dados['ordemCampo'] = "repositorio.data_ultimo_commit";
          break;
          default:
               $dados['ordemCampo'] = 'nome_repo';
          break;
     }
     $dados['ordemTipo'] = $_POST['ordemTipo'];
     $repositorio = new RepositorioController();
     $result = $repositorio->buscaReposUsuario($dados);
     $retorno = [];
     $retorno['success'] = true;
     $retorno['dados'] = $result;
     echo json_encode($retorno);
}