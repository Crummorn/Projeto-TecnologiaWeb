<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(21)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../home/index.php");
        die();
    }

    require_once("../../Database/UsuarioController.php");

    $id = $_POST["id"];    
    
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $nome = $_POST["nome"];
    
    $usuario = buscarUsuario($id);

    if(alteraUsuario($id, $email, $senha, $nome)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Dados do usuario ' . $usuario['nome'] . ' alterados com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    } 