<?php
require_once ("conecta.php");
require_once ("categoria-service.php");

function insereCategoria($conexao, $nome) {
    $nome = mysqli_real_escape_string($conexao, $nome);

    $listaErros = validaCategoria($nome);

    if (count($listaErros) > 0) {
        adicionaCategoriaSession($nome, $listaErros);
        header("Location: ../adiciona-form.php");    
        die(); 
    }

    $service = new CategoriaService();
    return $service->adicionar($conexao, $nome);
}

function alteraCategoria($conexao, $id, $nome) {
    $nome = mysqli_real_escape_string($conexao, $nome);
    
    $listaErros = validaCategoria($nome);

    if (count($listaErros) > 0) {
        adicionaCategoriaSession($nome, $listaErros);
        header("Location: ../altera-form.php?id=".$id);  
        die(); 
    }
    
    $service = new CategoriaService();
    return $service->alterar($conexao, $id, $nome);
}

function validaCategoria($nome) {
    $listaErros = array();

    if ((mb_strlen($nome) < 3) OR (mb_strlen($nome) > 100)) {
        array_push($listaErros, 'Campo Nome precisa ter no min 3 carcteres e no max 100 caracteres!');
    }

    return $listaErros;
}

function adicionaCategoriaSession($nome, $listaErros) {
    $_SESSION['nome'] = $nome;
    $_SESSION['listaErros'] = $listaErros;
    $_SESSION['alertType'] = 'danger';
}

function removeCategoria($conexao, $id) {
    $service = new CategoriaService();

    if (testaCategoriaNaoEstaSendoUsada($conexao, $id)) {
        return $service->remover($conexao, $id);
    } else {   
        $categoria = buscaCategoria($conexao, $id);     
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Categoria ' . $categoria['nome'] . ' não pode ser removida, está sendo utilizada!';
        header("Location: ../listagem.php");    
        die();
    }
}

function testaCategoriaNaoEstaSendoUsada($conexao, $id) {
    $query = "SELECT * FROM produto WHERE produto.categoria_id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return $resultado->num_rows === 0 ? true : false;
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