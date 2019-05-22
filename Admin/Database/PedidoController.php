<?php
require_once ("PedidoService.php");
require_once ('ProdutoController.php');

$pedidoService = new PedidoService();

function inserePedido($endereco, $frete, $produtos) {
    $listaErros = validaPedido($endereco);

    if (count($listaErros) > 0) {
        adicionaPedidoSession($endereco, $listaErros);
        header("Location: ../adiciona-form.php");    
        die(); 
    }
    
    $idPedido = $GLOBALS['pedidoService']->adicionar($endereco, $frete);

    foreach ($produtos as $produto) :
        $GLOBALS['pedidoService']->adicionarPedidoProduto($idPedido, $produto['id'], $produto['quantidade']);        
        darBaixaNoEstoque($produto['id'], $produto['quantidade']);
    endforeach;

    return TRUE;
}

function alteraStatusPedido($id, $idStatus) {    
    return $GLOBALS['pedidoService']->alterarStatus($id, $idStatus);
}

function ativarPedido($id) {
    return $GLOBALS['pedidoService']->ativarPedido($id);
}

function desativarPedido($id) {
    return $GLOBALS['pedidoService']->desativarPedido($id);
}

function listaPedidos() {
    return $GLOBALS['pedidoService']->listaPedidos();
}

function buscaPedido($id) {
    return $GLOBALS['pedidoService']->buscaPedido($id);
}

function buscaPedidoProdutos($id) {
    return $GLOBALS['pedidoService']->buscaPedidoProdutos($id);
}

function pedidoValorTotal($id) {
    return $GLOBALS['pedidoService']->pedidoValorTotal($id);
}

function totalPedidos() {
    return $GLOBALS['pedidoService']->totalPedidos();
}

function totalPedidosAtivos() {
    return $GLOBALS['pedidoService']->totalPedidosAtivos();
}

function totalPedidosDesativados() {
    return $GLOBALS['pedidoService']->totalPedidosDesativados();
}


/*
 * Funções de Utilidade
 */

function validaPedido($endereco) {
    $listaErros = array();

    if ((mb_strlen($endereco) < 10) OR (mb_strlen($endereco) > 255)) {
        array_push($listaErros, 'Campo Endereço precisa ter no min 10 carcteres e no max 255 caracteres!');
    }

    return $listaErros;
}

function adicionaPedidoSession($endereco, $listaErros) {
    $_SESSION['endereco'] = $endereco;
    $_SESSION['listaErros'] = $listaErros;
    $_SESSION['alertType'] = 'danger';
}