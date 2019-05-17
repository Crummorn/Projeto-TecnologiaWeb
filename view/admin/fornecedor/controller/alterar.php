<?php 
require_once("../../database/FornecedorController.php");
session_start();

require_once ("../../database/LoginController.php"); 
verificaUsuario();

$id = $_POST["id"];
$cnpj = $_POST["cnpj"];
$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$contato = $_POST["contato"];
$fornecedor = buscaFornecedor($id);

if(alteraFornecedor($id, $cnpj, $nome, $endereco, $contato)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Fornecedor ' . $fornecedor['nome'] . ' - ' . $fornecedor['cnpj'] .  ' alterado com sucesso!';
    header("Location: ../listagem.php");    
    die();
} 