<?php 
require_once("../../database/StatusController.php");
session_start();

$id = $_POST["id"];
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$status = buscaStatus($conexao, $id);

if(alteraStatus($conexao, $id, $nome, $descricao)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Status ' . $status['nome'] .  ' alterado com sucesso!';
    header("Location: ../listagem.php");    
    die();
} else {
    $msg = mysqli_error($conexao);
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Status ' . $status['nome'] . ' não foi alterado: ' . $msg ;
    header("Location: ../listagem.php");    
    die();
}


