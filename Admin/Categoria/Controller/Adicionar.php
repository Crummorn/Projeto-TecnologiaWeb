<?php 
    require_once("../../Database/CategoriaController.php");     
    session_start();

    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();

    $nome = $_POST["nome"];

    if(insereCategoria($nome)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Categoria ' . $nome .  ' adicionada com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    }