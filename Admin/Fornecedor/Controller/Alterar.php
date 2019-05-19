<?php 
    session_start();

    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();

    require_once("../../Database/FornecedorController.php");

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $contato = $_POST["contato"];
    $fornecedor = buscaFornecedor($id);
    $cnpj = $fornecedor['cnpj'];

    if(alteraFornecedor($id, $cnpj, $nome, $endereco, $contato)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Fornecedor ' . $fornecedor['nome'] . ' - ' . $fornecedor['cnpj'] .  ' alterado com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    } 