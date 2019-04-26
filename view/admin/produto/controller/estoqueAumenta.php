<?php 
require_once("../../database/produto-controller.php");
session_start();

$id = $_POST["id"];
$quantidade = $_POST["quantidade"];
$produto = buscaProduto($conexao, $id);

if(adicionarEstoque($conexao, $id, $quantidade)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Removido ' . $quantidade . ' do estoque do produto '  . $produto['nome'];
    header("Location: ../listagem.php");    
    die();
} else {
    $msg = mysqli_error($conexao);
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Não foi possivel remover o estoque do produto ' . $produto['nome'] . ' não foi alterado: ' . $msg ;
    header("Location: ../listagem.php");    
    die();
}


