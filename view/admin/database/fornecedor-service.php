<?php

function insereFornecedor($conexao, $cnpj, $nome, $endereco, $contato) {
    $query = "INSERT INTO fornecedor (cnpj, nome, endereco, contato) 
                VALUES ('{$cnpj}', '{$nome}', '{$endereco}', '{$contato}')";
    return mysqli_query($conexao, $query);
}

function alteraFornecedor($conexao, $id, $cnpj, $nome, $endereco, $contato) {
    $query = "UPDATE fornecedor 
                SET cnpj = '{$cnpj}', nome = '{$nome}', endereco = '{$endereco}', contato = '{$contato}' 
                WHERE id = '{$id}'";
    return mysqli_query($conexao, $query);
}

function removeFornecedor($conexao, $id) {
    $query = "DELETE FROM fornecedor WHERE id = {$id}";
    return mysqli_query($conexao, $query);
}