<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();

    require_once("../../Database/CategoriaController.php");

    $id = $_POST['id'];
    $categoria = buscaCategoria($id);

    if(removeCategoria($id)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Categoria ' . $categoria['nome'] .  ' removida com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    } 