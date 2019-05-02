<?php
require_once ("conecta.php");
require_once ("status-service.php");

function insereStatus($conexao, $nome, $descricao) {
    $nome = mysqli_real_escape_string($conexao, $nome);
    $descricao = mysqli_real_escape_string($conexao, $descricao);

    $listaErros = validaStatus($nome, $descricao);

    if (count($listaErros) > 0) {        
        adicionaStatusSession($nome, $descricao, $listaErros);
        header("Location: ../adiciona-form.php");  
        die(); 
    }

    $service = new StatusService();
    return $service->adicionar($conexao, $nome, $descricao);
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

    $service = new StatusService();
    return $service->alterar($conexao, $id, $nome, $descricao);
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

function removeStatus($conexao, $id) {
    $service = new StatusService();

    if (testaStatusNaoEstaSendoUsada($conexao, $id)) {
        return $service->remover($conexao, $id);
    } else {   
        $status = buscaStatus($conexao, $id);     
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Status ' . $status['nome'] . ' não pode ser removido, está sendo utilizada!';
        header("Location: ../listagem.php");    
        die();
    }
}

function testaStatusNaoEstaSendoUsada($conexao, $id) {
/*
    $query = "SELECT * FROM pedido WHERE pedido.status_pedido_id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return $resultado->num_rows === 0 ? true : false;
*/
    return true;
}

function listaStatus($conexao) {
    $statuss = array();
    $resultado = mysqli_query($conexao, "SELECT * FROM status_pedido");
    while($status = mysqli_fetch_assoc($resultado)) {
        array_push($statuss, $status);
    }
    return $statuss;
}

function buscaStatus($conexao, $id) {
    $query = "SELECT * FROM status_pedido WHERE id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function totalStatuss($conexao) {
    $query = "SELECT * FROM status_pedido";
    $resultado = mysqli_query($conexao, $query);
    return $resultado->num_rows;
}