<?php
require_once ("CategoriaService.php");

$categoriaService = new CategoriaService();

function insereCategoria($nome) {

    $listaErros = validaCategoria($nome);

    if (count($listaErros) > 0) {
        adicionaCategoriaSession($nome, $listaErros);
        header("Location: ../adiciona-form.php");    
        die(); 
    }

    return $GLOBALS['categoriaService']->adicionar($nome);
}

function alteraCategoria($id, $nome) {
    $listaErros = validaCategoria($nome);

    if (count($listaErros) > 0) {
        adicionaCategoriaSession($nome, $listaErros);
        header("Location: ../Altera-Form.php?id=".$id);  
        die(); 
    }
    
    return $GLOBALS['categoriaService']->alterar($id, $nome);
}

function removeCategoria($id) {
    if (testaCategoriaNaoEstaSendoUsada($id)) {
        return $GLOBALS['categoriaService']->remover($id);
    } else {   
        $categoria = buscaCategoria($id);     
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Categoria ' . $categoria['nome'] . ' não pode ser removida, está sendo utilizada!';
        header("Location: ../Listagem.php");    
        die();
    }
}

function listaCategorias() {
    return $GLOBALS['categoriaService']->listaCategorias();
}

function buscaCategoria($id) {
    return $GLOBALS['categoriaService']->buscaCategoria($id);
}

function totalCategorias() {
    return $GLOBALS['categoriaService']->totalCategorias();
}


/*
 * Funções de Utilidade
 */

function testaCategoriaNaoEstaSendoUsada($id) {
    return $GLOBALS['categoriaService']->testaCategoriaNaoEstaSendoUsada($id);
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