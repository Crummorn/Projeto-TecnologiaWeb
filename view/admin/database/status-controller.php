<?php
require_once ("conecta.php");
require_once ("status-service.php");

$statusService = new StatusService();

function insereStatus($conexao, $nome, $descricao) {
    $nome = mysqli_real_escape_string($conexao, $nome);
    $descricao = mysqli_real_escape_string($conexao, $descricao);

    $listaErros = validaStatus($nome, $descricao);

    if (count($listaErros) > 0) {        
        adicionaStatusSession($nome, $descricao, $listaErros);
        header("Location: ../adiciona-form.php");  
        die(); 
    }

    return $GLOBALS['statusService']->adicionar($conexao, $nome, $descricao);
}

function alteraStatus($conexao, $id, $nome, $descricao) {
    $nome = mysqli_real_escape_string($conexao, $nome);
    $descricao = mysqli_real_escape_string($conexao, $descricao);

    $listaErros = validaStatus($nome, $descricao);

    if (count($listaErros) > 0) {        
        adicionaStatusSession($nome, $descricao, $listaErros);
        header("Location: ../altera-form.php?id=".$id);
        die(); 
    }

    return $GLOBALS['statusService']->alterar($conexao, $id, $nome, $descricao);
}

function removeStatus($conexao, $id) {
    if (testaStatusNaoEstaSendoUsada($conexao, $id)) {
        return $GLOBALS['statusService']->remover($conexao, $id);
    } else {   
        $status = buscaStatus($conexao, $id);     
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Status ' . $status['nome'] . ' não pode ser removido, está sendo utilizada!';
        header("Location: ../listagem.php");    
        die();
    }
}

function listaStatus($conexao) {
    return $GLOBALS['statusService']->listaStatus($conexao);
}

function buscaStatus($conexao, $id) {
    return $GLOBALS['statusService']->buscaStatus($conexao, $id);
}

function totalStatuss($conexao) {
    return $GLOBALS['statusService']->totalStatuss($conexao);
}


/*
 * Funções de Utilidade
 */

// Ainda não esta funcionando, somente quando o Pedido for implementado ira funcionar.
function testaStatusNaoEstaSendoUsada($conexao, $id) {
    return true;
}

function validaStatus($nome, $descricao) {
    $listaErros = array();

    if ((mb_strlen($nome) < 3) OR (mb_strlen($nome) > 100)) {
        array_push($listaErros, 'Campo Nome precisa ter no min 3 carcteres e no max 100 caracteres!');
    }

    if ((mb_strlen($descricao) < 10) OR (mb_strlen($descricao) > 255)) {
        array_push($listaErros, 'Campo Descricao precisa ter no min 10 carateres e no max 255 caracteres!');
    }

    return $listaErros;
}

function adicionaStatusSession($nome, $descricao, $listaErros) {
    $_SESSION['nome'] = $nome;
    $_SESSION['descricao'] = $descricao;
    $_SESSION['listaErros'] = $listaErros;
    $_SESSION['alertType'] = 'danger';
}