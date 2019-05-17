<?php 
require_once("../../database/StatusController.php");
session_start();

require_once ("../../database/LoginController.php"); 
verificaUsuario();

$id = $_POST["id"];
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$status = buscaStatus($id);

if(alteraStatus($id, $nome, $descricao)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Status ' . $status['nome'] .  ' alterado com sucesso!';
    header("Location: ../listagem.php");    
    die();
}