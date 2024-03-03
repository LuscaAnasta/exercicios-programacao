<?php

require_once('../../config/Conexao.php');
require_once('../../model/TarefaModel.php');

// entrada
$json = file_get_contents("php://input");
$reqbody = json_decode($json);
$id = $reqbody->idTarefa;

// processamento
$conexao = new Conexao();
$db = $conexao->abrirConexao();
$tarefaModel = new TarefaModel($db);
$tarefaModel->id = $id;
$retorno = $tarefaModel->deletar();

// saida
echo json_encode($retorno);