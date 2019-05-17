<?php 
require_once("../../database/StatusController.php");
session_start();

require_once ("../../database/LoginController.php"); 
verificaUsuario();

$id = $_POST['id'];
$status = buscaStatus($conexao, $id);

if(removeStatus($id)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Status ' . $status['nome'] .  ' removido com sucesso!';
    header("Location: ../listagem.php");    
    die();
} 