<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();

    require_once("../../Database/UsuarioController.php");

    $usuario = $_SESSION['usuarioDados']; 
    
    $novaSenha = $_POST["novaSenha"];
    $novaSenha2 = $_POST["novaSenha2"];
    
    if(alteraUsuarioSenha($usuario['id'], $novaSenha, $novaSenha2)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Senha alterada com sucesso!';
        logoutUsuario();  
        die();
    } 