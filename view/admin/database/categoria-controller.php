<?php

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