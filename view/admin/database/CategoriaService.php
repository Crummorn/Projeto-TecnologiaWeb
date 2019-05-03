<?php
class CategoriaService {
    function adicionar($conexao, $nome) {
        $query = "INSERT INTO categoria (nome) VALUES ('{$nome}')";
        return mysqli_query($conexao, $query);
    }
    
    function alterar($conexao, $id, $nome) {
        $query = "UPDATE categoria SET nome = '{$nome}' WHERE id = '{$id}'";
        return mysqli_query($conexao, $query);
    }
    
    function remover($conexao, $id) {
        $query = "DELETE FROM categoria WHERE id = {$id}";
        return mysqli_query($conexao, $query);
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
}

?>