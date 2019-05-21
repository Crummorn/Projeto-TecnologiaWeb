<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(4)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../home/index.php");
        die();
    }
    
    require_once("../../Database/CategoriaController.php");

    $id = $_POST['id'];
    $categoria = buscaCategoria($id);

    if(removeCategoria($id)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Categoria ' . $categoria['nome'] .  ' removida com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    } 