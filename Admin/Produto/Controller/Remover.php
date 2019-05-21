<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(13)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../home/index.php");
        die();
    }

    require_once("../../Database/ProdutoController.php");

    $id = $_POST['id'];
    $produto = buscaProduto($id);

    if(removeProduto($id)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Produto ' . $produto['nome'] . ' removido com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    } 