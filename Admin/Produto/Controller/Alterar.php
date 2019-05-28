<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(11)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../Listagem.php");
        die();
    }

    require_once("../../Database/ProdutoController.php");
    
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $peso = $_POST["peso"];
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $custo = $_POST["custo"];
    $categoria_id = $_POST["categoria_id"];
    $fornecedor_id = $_POST["fornecedor_id"];
    
    $produto = buscaProduto($id);
    $estoque = $produto['estoque'];

    if(alteraProduto($id, $nome, $valor, $descricao, $peso, $estoque, $custo, $categoria_id, $fornecedor_id)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Produto ' . $fornecedor['nome'] .  ' alterado com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    } 