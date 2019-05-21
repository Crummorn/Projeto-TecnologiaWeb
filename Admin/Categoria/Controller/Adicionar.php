<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(2)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../home/index.php");
        die();
    }
    
    require_once("../../Database/CategoriaController.php");     

    $nome = $_POST["nome"];

    if(insereCategoria($nome)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Categoria ' . $nome .  ' adicionada com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    }