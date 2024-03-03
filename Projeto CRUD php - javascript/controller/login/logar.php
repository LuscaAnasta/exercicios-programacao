<?php

require_once('../../config/Conexao.php');
require_once('../../model/UsuarioModel.php');

$json=file_get_contents('php://input');
$reqbody=json_decode($json);
$login=$reqbody->login;
$senha=$reqbody->senha;

$conexao = new Conexao();
$banco = $conexao->abrirConexao();
$usuarioModel = new UsuarioModel($banco);
$usuarioModel->email = $login;
$usuarioModel->senha = $senha;
$retorno = $usuarioModel->logar();

echo json_encode($retorno);

?>