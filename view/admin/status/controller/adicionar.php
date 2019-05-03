<?php 
require_once("../../database/StatusController.php");
session_start();


$nome = $_POST["nome"];
$descricao = $_POST["descricao"];


if(insereStatus($conexao, $nome, $descricao)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Status ' . $nome .  ' adicionado com sucesso!';
    header("Location: ../listagem.php");    
    die();
} else {
    $msg = mysqli_error($conexao);
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Status ' . $nome . ' Não Foi Adicionado: ' . $msg ;
    header("Location: ../listagem.php");    
    die();
}


