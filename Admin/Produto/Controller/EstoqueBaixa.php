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

    $id = $_POST["id"];
    $quantidade = $_POST["quantidade"];
    $produto = buscaProduto($id);

    if(darBaixaNoEstoque($id, $quantidade)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Adicionado ' . $quantidade . ' ao estoque do produto '  . $produto['nome'];
        header("Location: ../listagem.php");    
        die();
    } 