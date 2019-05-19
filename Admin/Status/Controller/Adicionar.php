<?php 
    session_start();

    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();

    require_once("../../Database/StatusController.php");

    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];

    if(insereStatus($nome, $descricao)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Status ' . $nome .  ' adicionado com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    }