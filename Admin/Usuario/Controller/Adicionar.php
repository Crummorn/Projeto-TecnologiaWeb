<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(20)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../Listagem.php");
        die();
    }

    require_once("../../Database/UsuarioController.php");     
    
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $nome = $_POST["nome"];

    if(insereUsuario($email, $senha, $nome)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Usuario ' . $nome .  ' adicionado com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    }