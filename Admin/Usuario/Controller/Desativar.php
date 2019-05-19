<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();

    require_once("../../Database/UsuarioController.php");

    $id = $_POST['id'];
    $usuario = buscarUsuario($id);

    if(desativaUsuario($id)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Usuario ' . $usuario['nome'] .  ' ativado com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    } else {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Usuario ' . $usuario['nome'] .  ' não foi desativado!';
        header("Location: ../Listagem.php");    
        die();
    }