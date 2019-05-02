<?php 
require_once("../../database/categoria-controller.php");
session_start();

$nome = $_POST["nome"];

if(insereCategoria($conexao, $nome)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Categoria ' . $nome .  ' adicionada com sucesso!';
    header("Location: ../listagem.php");    
    die();
} else {
    $msg = mysqli_error($conexao);
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Categoria ' . $nome . ' Não Foi Adicionada: ' . $msg ;
    header("Location: ../listagem.php");    
    die();
}


