<?php

require_once('../../config/Conexao.php');
require_once('../../model/TarefaModel.php');

$json = file_get_contents('php://input');
$reqbody = json_decode($json);

$Tacao = $reqbody->tacao;
$Datain = $reqbody->datain;
$Nuem = $reqbody->nuem;
$Datate = $reqbody->datate;
$Desc = $reqbody->desc;


$conexao = new Conexao();

$db = $conexao->abrirConexao();

$TarefaModel = new TarefaModel($db);

$TarefaModel->tacao = $Tacao;
$TarefaModel->datain = $Datain;
$TarefaModel->nuem = $Nuem;
$TarefaModel->datate = $Datate;
$TarefaModel->desc = $Desc;

$retorno = $TarefaModel->cadastrar();
// saida
echo json_encode($retorno);
