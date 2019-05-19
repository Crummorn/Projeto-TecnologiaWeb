<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();

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