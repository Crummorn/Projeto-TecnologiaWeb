<?php 
require_once("../database/fornecedor-controller.php");
session_start();

$id = $_POST['id'];
$fornecedor = buscaFornecedor($conexao, $id);

if(removeFornecedor($conexao, $id)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Fornecedor ' . $fornecedor['nome'] . ' - ' . $fornecedor['cnpj'] .  ' removido com sucesso!';
    header("Location: listagem.php");    
    die();
} else {
    $msg = mysqli_error($conexao);
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Fornecedor ' . $fornecedor['nome'] . ' - ' . $fornecedor['cnpj'] . ' não pode ser removido: ' . $msg ;
    header("Location: listagem.php");    
    die();
}


