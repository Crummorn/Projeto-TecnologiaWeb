<?php
require_once ("categoria-service.php");

function insereCategoria($conexao, $nome) {
    $nome = mysqli_real_escape_string($conexao, $nome);
    $service = new CategoriaService();
    return $service->adicionar($conexao, $nome);
}

function alteraCategoria($conexao, $id, $nome) {
    $nome = mysqli_real_escape_string($conexao, $nome);
    $service = new CategoriaService();
    return $service->alterar($conexao, $id, $nome);
}

function removeCategoria($conexao, $id) {
    $service = new CategoriaService();
    return $service->remover($conexao, $id);
}

function listaCategorias($conexao) {
    $categorias = array();
    $resultado = mysqli_query($conexao, "SELECT * FROM categoria");
    while($categoria = mysqli_fetch_assoc($resultado)) {
        array_push($categorias, $categoria);
    }
    return $categorias;
}

function buscaCategoria($conexao, $id) {
    $query = "SELECT * FROM categoria WHERE id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function totalCategorias($conexao) {
    $query = "SELECT * FROM categoria";
    $resultado = mysqli_query($conexao, $query);
    return $resultado->num_rows;
}