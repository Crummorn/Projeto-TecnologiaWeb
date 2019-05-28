<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(3)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../Listagem.php");
        die();
    }
    

    require_once("../../Database/CategoriaController.php");

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $categoria = buscaCategoria($id);

    if(alteraCategoria($id, $nome)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Categoria ' . $categoria['nome'] .  ' alterada com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    } 