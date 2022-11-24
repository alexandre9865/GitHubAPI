<?php
require_once '../RepositorioController.php';

$repositorioController = new RepositorioController;
$repositorioController->submitProcess($_POST);

?>