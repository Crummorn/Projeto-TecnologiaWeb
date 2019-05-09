<?php
require_once ("DataSource.php");
require_once ("StatusService.php");

$statusService = new StatusService();

function insereStatus($nome, $descricao) {
    $listaErros = validaStatus($nome, $descricao);

    if (count($listaErros) > 0) {        
        adicionaStatusSession($nome, $descricao, $listaErros);
        header("Location: ../adiciona-form.php");  
        die(); 
    }

    return $GLOBALS['statusService']->adicionar($nome, $descricao);
}

function alteraStatus($id, $nome, $descricao) {
    $listaErros = validaStatus($nome, $descricao);

    if (count($listaErros) > 0) {        
        adicionaStatusSession($nome, $descricao, $listaErros);
        header("Location: ../altera-form.php?id=".$id);
        die(); 
    }

    return $GLOBALS['statusService']->alterar($id, $nome, $descricao);
}

function removeStatus($id) {
    if (testaStatusNaoEstaSendoUsada($id)) {
        return $GLOBALS['statusService']->remover($id);
    } else {   
        $status = buscaStatus($id);     
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Status ' . $status['nome'] . ' não pode ser removido, está sendo utilizada!';
        header("Location: ../listagem.php");    
        die();
    }
}

function listaStatus() {
    return $GLOBALS['statusService']->listaStatus();
}

function buscaStatus($id) {
    return $GLOBALS['statusService']->buscaStatus($id);
}

function totalStatuss() {
    return $GLOBALS['statusService']->totalStatuss();
}


/*
 * Funções de Utilidade
 */

// Ainda não esta funcionando, somente quando o Pedido for implementado ira funcionar.
function testaStatusNaoEstaSendoUsada($id) {
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