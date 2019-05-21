<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(15)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../home/index.php");
        die();
    }

    require_once("../../Database/StatusController.php");

    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];

    if(insereStatus($nome, $descricao)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Status ' . $nome .  ' adicionado com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    }