<?php
require_once ("DataSource.php");
require_once ("ProdutoService.php");

$produtoService = new ProdutoService();

function insereProduto($conexao, $nome, $valor, $descricao, $peso, $estoque, $custo, $categoria_id, $fornecedor_id) {
    $nome = mysqli_real_escape_string($conexao, $nome);
    $descricao = mysqli_real_escape_string($conexao, $descricao);

    $listaErros = validaProduto($nome, $descricao, $valor);

    if (count($listaErros) > 0) {
        adicionaValoresProdutoSession($nome, $valor, $descricao, $peso, $estoque, $custo, $categoria_id, $fornecedor_id, $listaErros);
        header("Location: ../adiciona-form.php");  
        die(); 
    }

    return $GLOBALS['produtoService']->adicionar($conexao, $nome, $valor, $descricao, $peso, $estoque, $custo, $categoria_id, $fornecedor_id);
}

function alteraProduto($conexao, $id, $nome, $valor, $descricao, $peso, $estoque, $custo, $categoria_id, $fornecedor_id) {
    $nome = mysqli_real_escape_string($conexao, $nome);
    $descricao = mysqli_real_escape_string($conexao, $descricao);

    $listaErros = validaProduto($nome, $descricao, $valor);

    if (count($listaErros) > 0) {
        adicionaValoresProdutoSession($nome, $valor, $descricao, $peso, $estoque, $custo, $categoria_id, $fornecedor_id, $listaErros);
        header("Location: ../altera-form.php?id=".$id);
        die(); 
    }

    return $GLOBALS['produtoService']->alterar($conexao, $id, $nome, $valor, $descricao, $peso, $estoque, $custo, $categoria_id, $fornecedor_id);
}

function removeProduto($conexao, $id) {
    return $GLOBALS['produtoService']->remover($conexao, $id);
}

function listaProdutos($conexao) {
    return $GLOBALS['produtoService']->listaProdutos($conexao);
}

function buscaProduto($conexao, $id) {
    return $GLOBALS['produtoService']->buscaProduto($conexao, $id);
}

function totalProdutos($conexao) {
    return $GLOBALS['produtoService']->totalProdutos($conexao);
}

function totalEstoqueProdutos($conexao) {
    return $GLOBALS['produtoService']->totalEstoqueProdutos($conexao);
}

function possivelLucroDeUmProdutoEspecifico($conexao, $id) {
    return $GLOBALS['produtoService']->possivelLucroDeUmProdutoEspecifico($conexao, $id);
}

function totalEstoqueProdutosFornecedorEspecifico($conexao, $fornecedor_id) {
    return $GLOBALS['produtoService']->totalEstoqueProdutosFornecedorEspecifico($conexao, $fornecedor_id);
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

/*
 * Funções de Utilidade
 */
function validaProduto($nome, $descricao, $valor) {
    $listaErros = array();

    if ((mb_strlen($nome) < 3) OR (mb_strlen($nome) > 100)) {
        array_push($listaErros, 'Campo Nome precisa ter no min 3 carcteres e no max 100 caracteres!');
    }

    if (($descricao <> "") AND (mb_strlen($descricao) < 10) OR (mb_strlen($descricao) > 255)) {
        array_push($listaErros, 'Campo Descricao precisa ter no min 10 carateres e no max 255 caracteres!');
    }

    if ($valor == null) {
        array_push($listaErros, 'Campo Valor é obrigatorio!');
    }

    return $listaErros;
}

function adicionaValoresProdutoSession($nome, $valor, $descricao, $peso, $estoque, $custo, $categoria_id, $fornecedor_id, $listaErros) {
    $_SESSION['nome'] = $nome;
    $_SESSION['valor'] = $valor;
    $_SESSION['descricao'] = $descricao;
    $_SESSION['peso'] = $peso;
    $_SESSION['estoque'] = $estoque;
    $_SESSION['custo'] = $custo;
    $_SESSION['categoria_id'] = $categoria_id;
    $_SESSION['fornecedor_id'] = $fornecedor_id;
    $_SESSION['listaErros'] = $listaErros;
    $_SESSION['alertType'] = 'danger';
}
