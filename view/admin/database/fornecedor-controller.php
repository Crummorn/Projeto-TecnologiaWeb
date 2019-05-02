<?php
require_once ("conecta.php");
require_once ("fornecedor-service.php");

$fornecedorService = new FornecedorService();

function insereFornecedor($conexao, $cnpj, $nome, $endereco, $contato) {
    $cnpj = mysqli_real_escape_string($conexao, $cnpj);
    $nome = mysqli_real_escape_string($conexao, $nome);
    $endereco = mysqli_real_escape_string($conexao, $endereco);
    $contato = mysqli_real_escape_string($conexao, $contato);
    
    $listaErros = validaFornecedor($cnpj, $nome, $endereco, $contato);

    if (count($listaErros) > 0) {        
        adicionaFornecedorSession($cnpj, $nome, $endereco, $contato, $listaErros);
        header("Location: ../adiciona-form.php");  
        die(); 
    }

    return $GLOBALS['fornecedorService']->adicionar($conexao, $cnpj, $nome, $endereco, $contato);
}

function alteraFornecedor($conexao, $id, $cnpj, $nome, $endereco, $contato) {
    $cnpj = mysqli_real_escape_string($conexao, $cnpj);
    $nome = mysqli_real_escape_string($conexao, $nome);
    $endereco = mysqli_real_escape_string($conexao, $endereco);
    $contato = mysqli_real_escape_string($conexao, $contato);
    
    $listaErros = validaFornecedor($cnpj, $nome, $endereco, $contato);

    if (count($listaErros) > 0) {       
        adicionaFornecedorSession($cnpj, $nome, $endereco, $contato, $listaErros);
        header("Location: ../altera-form.php?id=".$id);  
        die(); 
    }

    return $GLOBALS['fornecedorService']->alterar($conexao, $id, $cnpj, $nome, $endereco, $contato);
}

function removeFornecedor($conexao, $id) {
    if (testaFornecedorNaoEstaSendoUsada($conexao, $id)) {
        return $GLOBALS['fornecedorService']->remover($conexao, $id);
    } else {   
        $fornecedor = buscaFornecedor($conexao, $id);     
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Fornecedor ' . $fornecedor['nome'] . ' não pode ser removido, está sendo utilizada!';
        header("Location: ../listagem.php");    
        die();
    }
}

function listaFornecedores($conexao) {
    return $GLOBALS['fornecedorService']->listaFornecedores($conexao);
}

function buscaFornecedor($conexao, $id) {
    return $GLOBALS['fornecedorService']->buscaFornecedor($conexao, $id);
}

function totalFornecedores($conexao) {
    return $GLOBALS['fornecedorService']->totalFornecedores($conexao);
}

/*
 * Funções de Utilidade
 */

function testaFornecedorNaoEstaSendoUsada($conexao, $id) {
    return $GLOBALS['fornecedorService']->testaFornecedorNaoEstaSendoUsada($conexao, $id);
}

function validaFornecedor($cnpj, $nome, $endereco, $contato) {
    $listaErros = array();

    // Não implementei a logica para testar cnpj
    if (mb_strlen($cnpj) <> 14) {
        array_push($listaErros, 'Campo CNPJ Invalido!');
    }

    if ((mb_strlen($nome) < 3) OR (mb_strlen($nome) > 100)) {
        array_push($listaErros, 'Campo Nome precisa ter no min 3 carcteres e no max 100 caracteres!');
    }

    if (($endereco <> "") AND (mb_strlen($endereco) < 10) OR (mb_strlen($endereco) > 255)) {
        array_push($listaErros, 'Campo Endereco precisa ter no min 10 carcteres e no max 255 caracteres!');
    }

    if (($contato <> "") AND (mb_strlen($contato) < 3) OR (mb_strlen($contato) > 50)) {
        array_push($listaErros, 'Campo Contato precisa ter no min 3 carcteres e no max 50 caracteres!');
    }

    return $listaErros;
}

function adicionaFornecedorSession($cnpj, $nome, $endereco, $contato, $listaErros) {
    $_SESSION['cnpj'] = $cnpj;
    $_SESSION['nome'] = $nome;
    $_SESSION['endereco'] = $endereco;
    $_SESSION['contato'] = $contato;
    $_SESSION['listaErros'] = $listaErros;
    $_SESSION['alertType'] = 'danger';
}