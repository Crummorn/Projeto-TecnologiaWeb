<?php 
require_once("../../database/status-controller.php");

session_start();

$id = $_POST['id'];
$status = buscaStatus($conexao, $id);

if(removeStatus($conexao, $id)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Status ' . $status['nome'] .  ' removido com sucesso!';
    header("Location: ../listagem.php");    
    die();
} else {
    $msg = mysqli_error($conexao);
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Status ' . $status['nome'] . ' não pode ser removido: ' . $msg ;
    header("Location: ../listagem.php");    
    die();
}


