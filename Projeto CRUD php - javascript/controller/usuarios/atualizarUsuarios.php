<?php

require_once('../../config/Conexao.php');
require_once('../../model/UsuarioModel.php');
//entrada
$json = file_get_contents('php://input');
$reqbody = json_decode($json);
$nomeCompleto = $reqbody->nomeCompleto;
$email = $reqbody->email;
$dataNascimento = $reqbody->dataNascimento;
$senha = $reqbody->senha;
$telefone = $reqbody->telefone;
$id = $reqbody->idUsuario;
//processamento
$conexao = new Conexao();
$db = $conexao->abrirConexao();
$usuarioModel = new UsuarioModel($db);
$usuarioModel->id = $id;
$usuarioModel->nomeCompleto = $nomeCompleto;
$usuarioModel->dataNascimento = $dataNascimento;
$usuarioModel->email = $email;
$usuarioModel->senha = $senha;
$usuarioModel->telefone = $telefone;
$retorno = $usuarioModel->atualizar();
//saida
echo json_encode($retorno);