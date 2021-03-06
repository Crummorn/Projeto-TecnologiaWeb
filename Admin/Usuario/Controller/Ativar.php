<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(22)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../Listagem.php");
        die();
    }

    require_once("../../Database/UsuarioController.php");

    $id = $_POST['id'];
    $usuario = buscarUsuario($id);

    if(ativaUsuario($id)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Usuario ' . $usuario['nome'] .  ' ativado com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    } else {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Usuario ' . $usuario['nome'] .  ' não foi ativado!';
        header("Location: ../Listagem.php");    
        die();
    }