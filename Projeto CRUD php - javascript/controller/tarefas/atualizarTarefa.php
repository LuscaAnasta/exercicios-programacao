<?php

require_once('../../config/Conexao.php');
require_once('../../model/TarefaModel.php');
//entrada
$json = file_get_contents('php://input');
$reqbody = json_decode($json);
$titulo = $reqbody->tarefa;
$usuario = $reqbody->usuario;
$desc = $reqbody->descricao;
$dataIn = $reqbody->datain;
$dataTe = $reqbody->datate;
$id = $reqbody->idTarefa;
//processamento
$conexao = new Conexao();
$db = $conexao->abrirConexao();
$tarefaModel = new TarefaModel($db);
$tarefaModel->id = $id;
$tarefaModel->tarefa = $titulo;
$tarefaModel->usuario = $usuario;
$tarefaModel->desc = $desc;
$tarefaModel->datain = $dataIn;
$tarefaModel->datate = $dataTe;
$retorno = $tarefaModel->atualizar();
//saida
echo json_encode($retorno);