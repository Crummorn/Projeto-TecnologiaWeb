<?php

function listaFornecedores($conexao) {
    $fornecedores = array();
    $resultado = mysqli_query($conexao, "select * from fornecedor");
    while($fornecedor = mysqli_fetch_assoc($resultado)) {
        array_push($fornecedores, $fornecedor);
    }
    return $fornecedores;
}

function insereFornecedor($conexao, $cnpj, $nome, $endereco, $contato) {
    $query = "insert into fornecedor (cnpj, nome, endereco, contato) values ('{$cnpj}', '{$nome}', '{$endereco}', '{$contato}')";
    return mysqli_query($conexao, $query);
}

function alteraFornecedor($conexao, $id, $cnpj, $nome, $endereco, $contato) {
    $query = "update fornecedor set cnpj = '{$cnpj}', nome = '{$nome}', endereco = '{$endereco}', contato = '{$contato}' where id = '{$id}'";
    return mysqli_query($conexao, $query);
}

function removeFornecedor($conexao, $id) {
    $query = "delete from fornecedor where id = {$id}";
    return mysqli_query($conexao, $query);
}

function buscaFornecedor($conexao, $id) {
    $query = "select * from fornecedor where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function totalFornecedores($conexao) {
    $query = "select * from fornecedor";
    $resultado = mysqli_query($conexao, $query);
    return $resultado->num_rows;
}