<?php
require_once('../../config/Conexao.php');
require_once('../../model/TarefaModel.php');

$conexao = new Conexao();
$db = $conexao->abrirConexao();

$usuarioModel = new TarefaModel($db);
$dados = $usuarioModel->lerTodas();

echo json_encode($dados);
?>
