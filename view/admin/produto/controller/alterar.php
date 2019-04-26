<?php 
require_once("../../database/produto-controller.php");
session_start();

$id = $_POST["id"];
$nome = $_POST["nome"];
$peso = $_POST["peso"];
$descricao = $_POST["descricao"];
$valor = $_POST["valor"];
$custo = $_POST["custo"];
$categoria_id = $_POST["categoria_id"];
$fornecedor_id = $_POST["fornecedor_id"];
$produto = buscaProduto($conexao, $id);
$estoque = $produto['estoque'];

if(alteraProduto($conexao, $id, $nome, $valor, $descricao, $peso, $estoque, $custo, $categoria_id, $fornecedor_id)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Produto ' . $fornecedor['nome'] .  ' alterado com sucesso!';
    header("Location: ../listagem.php");    
    die();
} else {
    $msg = mysqli_error($conexao);
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Produto ' . $fornecedor['nome'] . ' não foi alterado: ' . $msg ;
    header("Location: ../listagem.php");    
    die();
}


