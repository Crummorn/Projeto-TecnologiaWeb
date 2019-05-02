<?php
class FornecedorService {

    function adicionar($conexao, $cnpj, $nome, $endereco, $contato) {
        $query = "INSERT INTO fornecedor (cnpj, nome, endereco, contato) 
                VALUES ('{$cnpj}', '{$nome}', '{$endereco}', '{$contato}')";
        return mysqli_query($conexao, $query);
    }

    function alterar($conexao, $id, $cnpj, $nome, $endereco, $contato) {
        $query = "UPDATE fornecedor 
                    SET cnpj = '{$cnpj}', nome = '{$nome}', endereco = '{$endereco}', contato = '{$contato}' 
                    WHERE id = '{$id}'";
        return mysqli_query($conexao, $query);
    }

    function remover($conexao, $id) {
        $query = "DELETE FROM fornecedor WHERE id = {$id}";
        return mysqli_query($conexao, $query);
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
}

?>