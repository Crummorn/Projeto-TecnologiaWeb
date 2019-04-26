<?php
require_once ("conecta.php");
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

function listaProdutos($conexao) {
    $produtos = array();
    $query = "SELECT produto.*, c.nome AS categoria_nome, f.nome AS fornecedor_nome   
                FROM produto 
                LEFT JOIN categoria AS c ON c.id=produto.categoria_id
                LEFT JOIN fornecedor AS f ON f.id=produto.fornecedor_id";
    $resultado = mysqli_query($conexao, $query);
    while($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }
    return $produtos;
}

function buscaProduto($conexao, $id) {
    $query = "SELECT p.*   
                FROM produto AS p
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

function adicionarEstoque($conexao, $id, $quantidade) {
    $produto = buscaProduto($conexao, $id);
    return alteraProduto($conexao, $id, $produto['nome'], $produto['valor'], $produto['descricao'], $produto['peso'], ($produto['estoque'] + $quantidade), $produto['custo'], $produto['categoria_id'], $produto['fornecedor_id']);
}

function darBaixaNoEstoque($conexao, $id, $quantidade) {
    $produto = buscaProduto($conexao, $id);
    if ($produto['estoque'] > $quantidade) {
        return alteraProduto($conexao, $id, $produto['nome'], $produto['valor'], $produto['descricao'], $produto['peso'], ($produto['estoque'] - $quantidade), $produto['custo'], $produto['categoria_id'], $produto['fornecedor_id']);
    } else {
        $produto = buscaProduto($conexao, $id);     
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Produto ' . $produto['nome'] . ' não tem estoque suficiente!';
        header("Location: ../listagem.php");    
        die();
    }
}
