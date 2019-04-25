<?php
include ("fornecedor-service.php");

function insereFornecedor($conexao, $cnpj, $nome, $endereco, $contato) {
    $service = new FornecedorService();
    return $service->adicionar($conexao, $cnpj, $nome, $endereco, $contato);
}

function alteraFornecedor($conexao, $id, $cnpj, $nome, $endereco, $contato) {
    $service = new FornecedorService();
    return $service->alterar($conexao, $id, $cnpj, $nome, $endereco, $contato);
}

function removeFornecedor($conexao, $id) {
    $service = new FornecedorService();
    return $service->remover($conexao, $id);
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