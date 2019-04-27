<?php 
require_once("../../database/fornecedor-controller.php");
session_start();

$id = $_POST["id"];
$cnpj = $_POST["cnpj"];
$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$contato = $_POST["contato"];
$fornecedor = buscaFornecedor($conexao, $id);

if(alteraFornecedor($conexao, $id, $cnpj, $nome, $endereco, $contato)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Fornecedor ' . $fornecedor['nome'] . ' - ' . $fornecedor['cnpj'] .  ' alterado com sucesso!';
    header("Location: ../listagem.php");    
    die();
} else {
    $msg = mysqli_error($conexao);
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Fornecedor ' . $fornecedor['nome'] . ' - ' . $fornecedor['cnpj'] . ' não foi alterado: ' . $msg ;
    header("Location: ../listagem.php");    
    die();
}


