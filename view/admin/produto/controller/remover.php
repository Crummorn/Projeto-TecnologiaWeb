<?php 
require_once("../../database/ProdutoController.php");
session_start();

$id = $_POST['id'];
$produto = buscaProduto($id);

if(removeProduto($id)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Produto ' . $produto['nome'] . ' removido com sucesso!';
    header("Location: ../listagem.php");    
    die();
} 