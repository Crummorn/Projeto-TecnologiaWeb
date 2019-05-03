<?php 
require_once("../../database/ProdutoController.php");
session_start();

$id = $_POST["id"];
$quantidade = $_POST["quantidade"];
$produto = buscaProduto($conexao, $id);

if(darBaixaNoEstoque($conexao, $id, $quantidade)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Adicionado ' . $quantidade . ' ao estoque do produto '  . $produto['nome'];
    header("Location: ../listagem.php");    
    die();
} else {
    $msg = mysqli_error($conexao);
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Não foi possivel adicionar ao estoque do produto ' . $produto['nome'] . ' não foi alterado: ' . $msg ;
    header("Location: ../listagem.php");    
    die();
}


