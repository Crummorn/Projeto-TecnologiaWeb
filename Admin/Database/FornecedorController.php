<?php
require_once ("FornecedorService.php");

$fornecedorService = new FornecedorService();

function insereFornecedor($cnpj, $nome, $endereco, $contato) {
    $listaErros = validaFornecedor($cnpj, $nome, $endereco, $contato);

    if (count($listaErros) > 0) {        
        adicionaFornecedorSession($cnpj, $nome, $endereco, $contato, $listaErros);
        header("Location: ../Adiciona-Form.php");  
        die(); 
    }

    return $GLOBALS['fornecedorService']->adicionar($cnpj, $nome, $endereco, $contato);
}

function alteraFornecedor($id, $cnpj, $nome, $endereco, $contato) {
    $listaErros = validaFornecedor($cnpj, $nome, $endereco, $contato);

    if (count($listaErros) > 0) {       
        adicionaFornecedorSession($cnpj, $nome, $endereco, $contato, $listaErros);
        header("Location: ../Altera-Form.php?id=".$id);  
        die(); 
    }

    return $GLOBALS['fornecedorService']->alterar($id, $cnpj, $nome, $endereco, $contato);
}

function removeFornecedor($id) {
    if (testaFornecedorNaoEstaSendoUsada($id)) {
        return $GLOBALS['fornecedorService']->remover($id);
    } else {   
        $fornecedor = buscaFornecedor($id);     
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Fornecedor ' . $fornecedor['nome'] . ' não pode ser removido, está sendo utilizada!';
        header("Location: ../Listagem.php");    
        die();
    }
}

function listaFornecedores() {
    return $GLOBALS['fornecedorService']->listaFornecedores();
}

function buscaFornecedor($id) {
    return $GLOBALS['fornecedorService']->buscaFornecedor($id);
}

function totalFornecedores() {
    return $GLOBALS['fornecedorService']->totalFornecedores();
}

/*
 * Funções de Utilidade
 */

function testaFornecedorNaoEstaSendoUsada($id) {
    return $GLOBALS['fornecedorService']->testaFornecedorNaoEstaSendoUsada($id);
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