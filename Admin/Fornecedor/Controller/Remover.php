<?php 
    session_start();

    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();

    require_once("../../Database/FornecedorController.php");

    $id = $_POST['id'];
    $fornecedor = buscaFornecedor($id);

    if(removeFornecedor($id)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Fornecedor ' . $fornecedor['nome'] . ' - ' . $fornecedor['cnpj'] .  ' removido com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    }