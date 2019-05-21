<?php  
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(6)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../home/index.php");
        die();
    }

    require_once("../../Database/FornecedorController.php");

    $cnpj = $_POST["cnpj"];
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $contato = $_POST["contato"];

    if(insereFornecedor($cnpj, $nome, $endereco, $contato)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Fornecedor ' . $nome . ' - ' . $cnpj . ' adicionado com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    }