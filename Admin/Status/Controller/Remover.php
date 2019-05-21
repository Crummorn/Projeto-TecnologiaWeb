<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(17)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../home/index.php");
        die();
    }

    require_once("../../Database/StatusController.php");

    $id = $_POST['id'];
    $status = buscaStatus($conexao, $id);

    if(removeStatus($id)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Status ' . $status['nome'] .  ' removido com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    } 