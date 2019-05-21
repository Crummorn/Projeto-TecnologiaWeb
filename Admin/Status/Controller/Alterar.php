<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(16)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../home/index.php");
        die();
    }

    require_once("../../Database/StatusController.php");

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $status = buscaStatus($id);

    if(alteraStatus($id, $nome, $descricao)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Status ' . $status['nome'] .  ' alterado com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    }