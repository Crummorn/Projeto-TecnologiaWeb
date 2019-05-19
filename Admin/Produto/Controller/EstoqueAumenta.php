<?php 
    session_start();

    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();

    require_once("../../Database/ProdutoController.php");

    $id = $_POST["id"];
    $quantidade = $_POST["quantidade"];
    $produto = buscaProduto($id);

    if(adicionarEstoque($id, $quantidade)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Removido ' . $quantidade . ' do estoque do produto '  . $produto['nome'];
        header("Location: ../Listagem.php");    
        die();
    }