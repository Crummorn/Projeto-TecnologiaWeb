<?php 
require_once("../database/produto-controller.php");
session_start();

$id = $_POST['id'];
$produto = buscaProduto($conexao, $id);

if(removeProduto($conexao, $id)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Fornecedor ' . $produto['nome'] . ' removido com sucesso!';
    header("Location: listagem.php");    
    die();
} else {
    $msg = mysqli_error($conexao);
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Fornecedor ' . $fornecedor['nome'] . ' não pode ser removido: ' . $msg ;
    header("Location: listagem.php");    
    die();
}