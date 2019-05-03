<?php 
require_once("../../database/ProdutoController.php");
session_start();

$id = $_POST['id'];
$produto = buscaProduto($conexao, $id);

if(removeProduto($conexao, $id)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Produto ' . $produto['nome'] . ' removido com sucesso!';
    header("Location: ../listagem.php");    
    die();
} else {
    $msg = mysqli_error($conexao);
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Produto ' . $produto['nome'] . ' não pode ser removido: ' . $msg ;
    header("Location: ../listagem.php");    
    die();
}