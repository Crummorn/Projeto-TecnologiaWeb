<?php 
require_once("../../database/fornecedor-controller.php");
session_start();

$cnpj = $_POST["cnpj"];
$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$contato = $_POST["contato"];

if(insereFornecedor($conexao, $cnpj, $nome, $endereco, $contato)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Fornecedor ' . $nome . ' - ' . $cnpj . ' adicionado com sucesso!';
    header("Location: ../listagem.php");    
    die();
} else {
    $msg = mysqli_error($conexao);
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Fornecedor ' . $nome . ' - ' . $cnpj . ' não foi adicionado: ' . $msg ;
    header("Location: ../listagem.php");    
    die();
}


