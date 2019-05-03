<?php
require_once ("DataSource.php");
require_once ("CategoriaService.php");

$categoriaService = new CategoriaService();

function insereCategoria($conexao, $nome) {
    $nome = mysqli_real_escape_string($conexao, $nome);

    $listaErros = validaCategoria($nome);

    if (count($listaErros) > 0) {
        adicionaCategoriaSession($nome, $listaErros);
        header("Location: ../adiciona-form.php");    
        die(); 
    }

    return $GLOBALS['categoriaService']->adicionar($conexao, $nome);
}

function alteraCategoria($conexao, $id, $nome) {
    $nome = mysqli_real_escape_string($conexao, $nome);
    
    $listaErros = validaCategoria($nome);

    if (count($listaErros) > 0) {
        adicionaCategoriaSession($nome, $listaErros);
        header("Location: ../altera-form.php?id=".$id);  
        die(); 
    }
    
    return $GLOBALS['categoriaService']->alterar($conexao, $id, $nome);
}

function removeCategoria($conexao, $id) {
    if (testaCategoriaNaoEstaSendoUsada($conexao, $id)) {
        return $GLOBALS['categoriaService']->remover($conexao, $id);
    } else {   
        $categoria = buscaCategoria($conexao, $id);     
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Categoria ' . $categoria['nome'] . ' não pode ser removida, está sendo utilizada!';
        header("Location: ../listagem.php");    
        die();
    }
}

function listaCategorias($conexao) {
    return $GLOBALS['categoriaService']->listaCategorias($conexao);
}

function buscaCategoria($conexao, $id) {
    return $GLOBALS['categoriaService']->buscaCategoria($conexao, $id);
}

function totalCategorias($conexao) {
    return $GLOBALS['categoriaService']->totalCategorias($conexao);
}


/*
 * Funções de Utilidade
 */

function testaCategoriaNaoEstaSendoUsada($conexao, $id) {
    return $GLOBALS['categoriaService']->testaCategoriaNaoEstaSendoUsada($conexao, $id);
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