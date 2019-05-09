<?php 
require_once("../../database/FornecedorController.php");
session_start();

$cnpj = $_POST["cnpj"];
$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$contato = $_POST["contato"];

if(insereFornecedor($cnpj, $nome, $endereco, $contato)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Fornecedor ' . $nome . ' - ' . $cnpj . ' adicionado com sucesso!';
    header("Location: ../listagem.php");    
    die();
}