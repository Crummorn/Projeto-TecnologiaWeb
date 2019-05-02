<?php
class ProdutoService {
    function adicionar($conexao, $nome, $valor, $descricao, $peso, $estoque, $custo, $categoria_id, $fornecedor_id) {
        $query = "INSERT INTO produto (nome, valor, descricao, peso, 
                                    estoque, custo, categoria_id, fornecedor_id) 
                VALUES ('{$nome}', '{$valor}', '{$descricao}', '{$peso}', 
                        '{$estoque}', '{$custo}', '{$categoria_id}', '{$fornecedor_id}')";
        return mysqli_query($conexao, $query);
    }

    function alterar($conexao, $id, $nome, $valor, $descricao, $peso, $estoque, $custo, $categoria_id, $fornecedor_id) {
        $query = "UPDATE produto 
                    SET nome = '{$nome}', valor = '{$valor}', descricao = '{$descricao}', peso = '{$peso}',
                                estoque  = '{$estoque}', custo = '{$custo}', categoria_id = '{$categoria_id}', fornecedor_id = '{$fornecedor_id}' 
                    WHERE id = '{$id}'";
        return mysqli_query($conexao, $query);
    }

    function remover($conexao, $id) {
        $query = "DELETE FROM produto WHERE id = {$id}";
        return mysqli_query($conexao, $query);
    }

    function listaProdutos($conexao) {
        $produtos = array();
        $query = "SELECT produto.*, c.nome AS categoria_nome, f.nome AS fornecedor_nome   
                    FROM produto 
                    LEFT JOIN categoria AS c ON c.id=produto.categoria_id
                    LEFT JOIN fornecedor AS f ON f.id=produto.fornecedor_id";
        $resultado = mysqli_query($conexao, $query);
        while($produto = mysqli_fetch_assoc($resultado)) {
            array_push($produtos, $produto);
        }
        return $produtos;
    }

    function buscaProduto($conexao, $id) {
        $query = "SELECT p.* FROM produto AS p WHERE id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }
    
    function totalProdutos($conexao) {
        $query = "SELECT * FROM produto";
        $resultado = mysqli_query($conexao, $query);
        return $resultado->num_rows;
    }
    
    function totalEstoqueProdutos($conexao) {
        $query = "SELECT SUM(estoque) AS total_estoque FROM produto";
        $resultado = mysqli_query($conexao, $query);
        $row = mysqli_fetch_object($resultado);
        return $row->total_estoque;
    }

    function possivelLucroDeUmProdutoEspecifico($conexao, $id) {
        $query = "SELECT * FROM produto WHERE id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        $row = mysqli_fetch_object($resultado);
        return ($row->valor - $row->custo) * $row->estoque;
    }

    function totalEstoqueProdutosFornecedorEspecifico($conexao, $fornecedor_id) {
        $query = "SELECT SUM(estoque) AS total_estoque 
                    FROM produto AS p
                    LEFT JOIN fornecedor AS f ON f.id = p.fornecedor_id 
                    WHERE p.fornecedor_id = $fornecedor_id";
        $resultado = mysqli_query($conexao, $query);
        $row = mysqli_fetch_object($resultado);
        return $row->total_estoque;
    }
}

?>