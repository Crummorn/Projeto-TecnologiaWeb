<?php 
require_once("../database/produto-controller.php");
session_start();

$nome = $_POST["nome"];
$peso = $_POST["peso"];
$descricao = $_POST["descricao"];
$estoque = $_POST["estoque"];
$valor = $_POST["valor"];
$custo = $_POST["custo"];
$categoria_id = $_POST["categoria_id"];
$fornecedor_id = $_POST["fornecedor_id"];

if(insereProduto($conexao, $nome, $valor, $descricao, $peso, $estoque, $custo, $categoria_id, $fornecedor_id)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Produto ' . $nome . ' adicionado com sucesso!';
    header("Location: listagem.php");    
    die();
} else {
    $msg = mysqli_error($conexao);
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Fornecedor ' . $nome . ' não foi adicionado: ' . $msg ;
    header("Location: listagem.php");    
    die();
}


