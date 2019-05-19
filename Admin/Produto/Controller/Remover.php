<?php 
    session_start();

    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();

    require_once("../../Database/ProdutoController.php");

    $id = $_POST['id'];
    $produto = buscaProduto($id);

    if(removeProduto($id)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Produto ' . $produto['nome'] . ' removido com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    } 