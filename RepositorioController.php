<?php
include_once 'Classes/GithubApi.php';
include_once 'Classes/Crud.php';

class RepositorioController {
    private $usuario;
    private $gitApi;
    private $crud;

    function __construct(){
        $this->gitApi = new GithubApi();
        $this->crud = new Crud();
    }

    function redirecionaErro(){
        header('Location: /GitAPI/Home/index.php?erroRepo');
    }
    function redirecionaListagem(){
        header('Location: /GitAPI/Home/listar.php?usuario='.$this->usuario);
    }

    function submitProcess($postArray) {
        if(isset($postArray['usuario']) && !empty($postArray['usuario'])){
            $this->usuario = $postArray['usuario'];
            $this->processaRepos();
        }else{
            $this->redirecionaErro();
        }
    }

    function processaRepos(){
        try{
            $repositorios = $this->getRepos();
            $this->limpaReposUsuario();
            foreach ($repositorios as $key => $repo) {
                $repositorios[$key]['data_ultimo_commit'] = $this->getLastCommitDate($repo['full_name']);
                $this->insereReposUsuario($repositorios[$key]);
            }
            $this->redirecionaListagem();
        }catch(Exception $e){
            $this->redirecionaErro();
        }
    }

    function buscaReposUsuario($dados){
        $where = '';
        if(isset($dados['nome_repo']) && !empty($dados['nome_repo'])){
            $where .= " AND nome_repo LIKE '%{$dados['nome_repo']}%'";
        }
        if(isset($dados['archivado']) && $dados['archivado']!==''){
            $where .= " AND archivado = {$dados['archivado']}";
        }

        $order = " ORDER BY ";
        if(isset($dados['ordemCampo']) && !empty($dados['ordemCampo'])){
            $order .= " {$dados['ordemCampo']} ";
        }else{
            $order .= " nome_repo ";
        }
        if(isset($dados['ordemTipo']) && !empty($dados['ordemTipo'])){
            $order .= " {$dados['ordemTipo']} ";
        }else{
            $order .= " DESC ";
        }
        return $this->crud->execute("select
                                        nome_repo,
                                        archivado,
                                        DATE_FORMAT(data_ultimo_commit, '%d/%m/%Y') as data_ultimo_commit
                                    from repositorio
                                    where usuario = '{$dados['usuario']}'
                                        $where
                                        $order");
    }

    function insereReposUsuario($dados){
        $this->crud->insert('repositorio',[
            'usuario' => $this->usuario,
            'nome_repo' => $dados['name'],
            'archivado' => $dados['archived'],
            'data_ultimo_commit' => $dados['data_ultimo_commit']
        ]);
    }

    function limpaReposUsuario(){
        $this->crud->delete('repositorio', "usuario='{$this->usuario}'");
    }

    function getRepos(){
        $respostaReq = $this->gitApi->executaRequisicao("users/{$this->usuario}/repos");
        $usuarioReposData = json_decode($respostaReq, true);

        $keys = array("name" => 'name', "full_name" => 'full_name', "archived" => 'archived');

        $usuarioRepos = array_map(function($a) use($keys){
            return array_intersect_key($a,$keys);
        }, $usuarioReposData);

        return $usuarioRepos;
    }

    function getLastCommitDate($userRepo){
        $respostaReq = $this->gitApi->executaRequisicao("repos/{$userRepo}/commits");
        $usuarioCommitsData = json_decode($respostaReq, true);
        if(!isset($usuarioCommitsData[0]) || empty($usuarioCommitsData[0])){
            $dataUltimoCommit = 'null';
        }else{
            $dataUltimoCommit = $usuarioCommitsData[0]['commit']['committer']['date'];
        }

        return $dataUltimoCommit;
    }
}
?>