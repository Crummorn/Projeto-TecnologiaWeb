<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();

    require_once("../../Database/UsuarioController.php");

    $usuario = $_SESSION['usuarioDados'];
    
    $email = $_POST["email"];
    $nome = $_POST["nome"];    
    
    if(alteraUsuarioDados($usuario['id'], $email, $nome)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Dados alterados com sucesso!';        
        logoutUsuario();   
        die();
    }  else {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Tu fez alguma coisa errada moral!';
        header("Location: ../Altera-Dados-Form.php");    
    }