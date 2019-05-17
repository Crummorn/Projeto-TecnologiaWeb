<?php 
require_once("../../database/ProdutoController.php");
session_start();

require_once ("../../database/LoginController.php"); 
verificaUsuario();

$nome = $_POST["nome"];
$peso = $_POST["peso"];
$descricao = $_POST["descricao"];
$estoque = $_POST["estoque"];
$valor = $_POST["valor"];
$custo = $_POST["custo"];
$categoria_id = $_POST["categoria_id"];
$fornecedor_id = $_POST["fornecedor_id"];

if(insereProduto($nome, $valor, $descricao, $peso, $estoque, $custo, $categoria_id, $fornecedor_id)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Produto ' . $nome . ' adicionado com sucesso!';
    header("Location: ../listagem.php");    
    die();
}