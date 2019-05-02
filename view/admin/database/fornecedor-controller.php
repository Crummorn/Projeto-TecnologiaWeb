<?php
require_once ("conecta.php");
require_once ("fornecedor-service.php");

function insereFornecedor($conexao, $cnpj, $nome, $endereco, $contato) {
    $cnpj = mysqli_real_escape_string($conexao, $cnpj);
    $nome = mysqli_real_escape_string($conexao, $nome);
    $endereco = mysqli_real_escape_string($conexao, $endereco);
    $contato = mysqli_real_escape_string($conexao, $contato);
    
    $listaErros = validaFornecedor($cnpj, $nome, $endereco, $contato);

    if (count($listaErros) > 0) {        
        adicionaValoresASession($cnpj, $nome, $endereco, $contato, $listaErros);
        header("Location: ../adiciona-form.php");  
        die(); 
    }

    $service = new FornecedorService();
    return $service->adicionar($conexao, $cnpj, $nome, $endereco, $contato);
}

function alteraFornecedor($conexao, $id, $cnpj, $nome, $endereco, $contato) {
    $cnpj = mysqli_real_escape_string($conexao, $cnpj);
    $nome = mysqli_real_escape_string($conexao, $nome);
    $endereco = mysqli_real_escape_string($conexao, $endereco);
    $contato = mysqli_real_escape_string($conexao, $contato);
    
    $listaErros = validaFornecedor($cnpj, $nome, $endereco, $contato);

    if (count($listaErros) > 0) {       
        adicionaValoresASession($cnpj, $nome, $endereco, $contato, $listaErros);
        header("Location: ../altera-form.php?id=".$id);  
        die(); 
    }

    $service = new FornecedorService();
    return $service->alterar($conexao, $id, $cnpj, $nome, $endereco, $contato);
}

function removeFornecedor($conexao, $id) {
    $service = new FornecedorService();

    if (testaFornecedorNaoEstaSendoUsada($conexao, $id)) {
        return $service->remover($conexao, $id);
    } else {   
        $fornecedor = buscaFornecedor($conexao, $id);     
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Fornecedor ' . $fornecedor['nome'] . ' não pode ser removido, está sendo utilizada!';
        header("Location: ../listagem.php");    
        die();
    }
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

    if ((mb_strlen($endereco) < 10) OR (mb_strlen($endereco) > 255)) {
        array_push($listaErros, 'Campo Endereco precisa ter no min 10 carcteres e no max 255 caracteres!');
    }

    if ((mb_strlen($contato) < 3) OR (mb_strlen($contato) > 50)) {
        array_push($listaErros, 'Campo Contato precisa ter no min 3 carcteres e no max 50 caracteres!');
    }

    return $listaErros;
}

function adicionaValoresASession($cnpj, $nome, $endereco, $contato, $listaErros) {
    $_SESSION['cnpj'] = $cnpj;
    $_SESSION['nome'] = $nome;
    $_SESSION['endereco'] = $endereco;
    $_SESSION['contato'] = $contato;
    $_SESSION['listaErros'] = $listaErros;
    $_SESSION['alertType'] = 'danger';
}

function testaFornecedorNaoEstaSendoUsada($conexao, $id) {
    $query = "SELECT * FROM produto WHERE produto.fornecedor_id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return $resultado->num_rows === 0 ? true : false;
}

function listaFornecedores($conexao) {
    $fornecedores = array();
    $resultado = mysqli_query($conexao, "SELECT * FROM fornecedor");
    while($fornecedor = mysqli_fetch_assoc($resultado)) {
        array_push($fornecedores, $fornecedor);
    }
    return $fornecedores;
}

function buscaFornecedor($conexao, $id) {
    $query = "SELECT * FROM fornecedor WHERE id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function totalFornecedores($conexao) {
    $query = "SELECT * from fornecedor";
    $resultado = mysqli_query($conexao, $query);
    return $resultado->num_rows;
}