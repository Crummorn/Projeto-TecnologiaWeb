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
    
    function listaStatus($conexao) {
        $statuss = array();
        $resultado = mysqli_query($conexao, "SELECT * FROM status_pedido");
        while($status = mysqli_fetch_assoc($resultado)) {
            array_push($statuss, $status);
        }
        return $statuss;
    }

    function buscaStatus($conexao, $id) {
        $query = "SELECT * FROM status_pedido WHERE id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }

    function totalStatuss($conexao) {
        $query = "SELECT * FROM status_pedido";
        $resultado = mysqli_query($conexao, $query);
        return $resultado->num_rows;
    }
}

?>