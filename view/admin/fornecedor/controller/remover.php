<?php 
require_once("../../database/FornecedorController.php");
session_start();

require_once ("../../database/LoginController.php"); 
verificaUsuario();

$id = $_POST['id'];
$fornecedor = buscaFornecedor($id);

if(removeFornecedor($id)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Fornecedor ' . $fornecedor['nome'] . ' - ' . $fornecedor['cnpj'] .  ' removido com sucesso!';
    header("Location: ../listagem.php");    
    die();
}