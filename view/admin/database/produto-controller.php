<?php
require_once ("produto-service.php");

function insereProduto($conexao, $nome, $valor, $descricao, $peso, $estoque, $custo, $categoria_id, $fornecedor_id) {
    $nome = mysqli_real_escape_string($conexao, $nome);
    $descricao = mysqli_real_escape_string($conexao, $descricao);
    $service = new ProdutoService();
    return $service->adicionar($conexao, $nome, $valor, $descricao, $peso, $estoque, $custo, $categoria_id, $fornecedor_id);
}

function alteraProduto($conexao, $id, $nome, $valor, $descricao, $peso, $estoque, $custo, $categoria_id, $fornecedor_id) {
    $nome = mysqli_real_escape_string($conexao, $nome);
    $descricao = mysqli_real_escape_string($conexao, $descricao);
    $service = new ProdutoService();
    return $service->alterar($conexao, $id, $nome, $valor, $descricao, $peso, $estoque, $custo, $categoria_id, $fornecedor_id);
}

function removeProduto($conexao, $id) {
    $serviceProduto = new ProdutoService();
    return $serviceProduto->remover($conexao, $id);
}

function listaProduto($conexao) {
    $produtos = array();
    $query = "SELECT produto.*, c.nome AS categoria_nome, f.nome AS fornecedor_nome   
                FROM produto 
                LEFT JOIN categoria AS c ON c.id=produto.categoria_id
                LEFT JOIN fornecedor AS f ON f.id=produto.fornecedor_id";
    $resultado = mysqli_query($conexao, $query);
    while($categoria = mysqli_fetch_assoc($resultado)) {
        array_push($categorias, $categoria);
    }
    return $categorias;
}

function buscaProduto($conexao, $id) {
    $query = "SELECT p.*, c.nome AS categoria_nome, f.nome AS fornecedor_nome   
                FROM produto AS p
                LEFT JOIN categoria AS c ON c.id = p.categoria_id
                LEFT JOIN fornecedor AS f ON f.id = p.fornecedor_id 
                WHERE id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function totalProdutos($conexao) {
    $query = "SELECT * FROM produto";
    $resultado = mysqli_query($conexao, $query);
    return $resultado->num_rows;
}

function totalEstoqueProdutos($conexao) {
    $query = "SELECT SUM(estoque) AS total_estoque FROM produto";
    $resultado = mysqli_query($conexao, $query);
    $row = mysqli_fetch_object($resultado);
    return $row->total_estoque;
}

function possivelLucroDeUmProdutoEspecifico($conexao, $id) {
    $query = "SELECT * FROM produto WHERE id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    $row = mysqli_fetch_object($resultado);
    return ($row->valor - $row->custo) * $row->estoque;
}

function totalEstoqueProdutosFornecedorEspecifico($conexao, $fornecedor_id) {
    $query = "SELECT SUM(estoque) AS total_estoque 
                FROM produto AS p
                LEFT JOIN fornecedor AS f ON f.id = p.fornecedor_id 
                WHERE p.fornecedor_id = $fornecedor_id";
    $resultado = mysqli_query($conexao, $query);
    $row = mysqli_fetch_object($resultado);
    return $row->total_estoque;
}