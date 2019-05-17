<?php 
require_once("../../database/ProdutoController.php");
session_start();

require_once ("../../database/LoginController.php"); 
verificaUsuario();

$id = $_POST["id"];
$quantidade = $_POST["quantidade"];
$produto = buscaProduto($id);

if(adicionarEstoque($id, $quantidade)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Removido ' . $quantidade . ' do estoque do produto '  . $produto['nome'];
    header("Location: ../listagem.php");    
    die();
}