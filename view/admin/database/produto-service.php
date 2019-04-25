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
}

?>