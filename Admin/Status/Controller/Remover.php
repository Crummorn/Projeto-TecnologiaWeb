<?php 
    session_start();

    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();

    require_once("../../Database/StatusController.php");

    $id = $_POST['id'];
    $status = buscaStatus($conexao, $id);

    if(removeStatus($id)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Status ' . $status['nome'] .  ' removido com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    } 