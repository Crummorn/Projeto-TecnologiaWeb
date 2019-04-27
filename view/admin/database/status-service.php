<?php
class StatusService {
    function adicionar($conexao, $nome, $descricao) {
        $query = "INSERT INTO status_pedido (nome, descricao) VALUES ('{$nome}', '{$descricao}')";
        return mysqli_query($conexao, $query);
    }
    
    function alterar($conexao, $id, $nome, $descricao) {
        $query = "UPDATE status_pedido 
                    SET nome = '{$nome}', descricao = '{$descricao}' 
                    WHERE id = '{$id}'";
        return mysqli_query($conexao, $query);
    }
    
    function remover($conexao, $id) {
        $query = "DELETE FROM status_pedido WHERE id = {$id}";
        return mysqli_query($conexao, $query);
    }
}

?>