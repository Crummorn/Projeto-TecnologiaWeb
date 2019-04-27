<?php
require_once ("conecta.php");
require_once ("fornecedor-service.php");

function insereFornecedor($conexao, $cnpj, $nome, $endereco, $contato) {
    $cnpj = mysqli_real_escape_string($conexao, $cnpj);
    $nome = mysqli_real_escape_string($conexao, $nome);
    $endereco = mysqli_real_escape_string($conexao, $endereco);
    $contato = mysqli_real_escape_string($conexao, $contato);
    $service = new FornecedorService();
    return $service->adicionar($conexao, $cnpj, $nome, $endereco, $contato);
}

function alteraFornecedor($conexao, $id, $cnpj, $nome, $endereco, $contato) {
    $cnpj = mysqli_real_escape_string($conexao, $cnpj);
    $nome = mysqli_real_escape_string($conexao, $nome);
    $endereco = mysqli_real_escape_string($conexao, $endereco);
    $contato = mysqli_real_escape_string($conexao, $contato);
    $service = new FornecedorService();
    return $service->alterar($conexao, $id, $cnpj, $nome, $endereco, $contato);
}

function removeFornecedor($conexao, $id) {
    $service = new FornecedorService();

    if (testaFornecedorNaoEstaSendoUsada($conexao, $id)) {
        return $service->remover($conexao, $id);
    } else {   
        $fornecedor = buscaFornecedor($conexao, $id);     
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Fornecedor ' . $fornecedor['nome'] . ' não pode ser removido, está sendo utilizada!';
        header("Location: ../listagem.php");    
        die();
    }
}

function testaFornecedorNaoEstaSendoUsada($conexao, $id) {
    $query = "SELECT * FROM produto WHERE produto.fornecedor_id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return $resultado->num_rows === 0 ? true : false;
}

function listaFornecedores($conexao) {
    $fornecedores = array();
    $resultado = mysqli_query($conexao, "SELECT * FROM fornecedor");
    while($fornecedor = mysqli_fetch_assoc($resultado)) {
        array_push($fornecedores, $fornecedor);
    }
    return $fornecedores;
}

function buscaFornecedor($conexao, $id) {
    $query = "SELECT * FROM fornecedor WHERE id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function totalFornecedores($conexao) {
    $query = "SELECT * from fornecedor";
    $resultado = mysqli_query($conexao, $query);
    return $resultado->num_rows;
}