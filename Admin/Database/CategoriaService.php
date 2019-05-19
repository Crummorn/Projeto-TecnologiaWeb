<?php
require_once('DataSource.php');
class CategoriaService extends DataSource {
    private $conexao;

    function __construct() {
        $this->conexao = $this->getConexao();
    }

    function adicionar($nome) {
        $nome = mysqli_real_escape_string($this->conexao, $nome);

        $query = "INSERT INTO categoria (nome) VALUES ('{$nome}')";
        return mysqli_query($this->conexao, $query);
    }
    
    function alterar($id, $nome) {
        $nome = mysqli_real_escape_string($this->conexao, $nome);

        $query = "UPDATE categoria SET nome = '{$nome}' WHERE id = '{$id}'";
        return mysqli_query($this->conexao, $query);
    }
    
    function remover($id) {
        $query = "DELETE FROM categoria WHERE id = {$id}";
        return mysqli_query($this->conexao, $query);
    }

    function testaCategoriaNaoEstaSendoUsada($id) {
        $query = "SELECT * FROM produto WHERE produto.categoria_id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        return $resultado->num_rows === 0 ? true : false;
    }
    
    function listaCategorias() {
        $categorias = array();
        $resultado = mysqli_query($this->conexao, "SELECT * FROM categoria");
        while($categoria = mysqli_fetch_assoc($resultado)) {
            array_push($categorias, $categoria);
        }
        return $categorias;
    }

    function buscaCategoria($id) {
        $query = "SELECT * FROM categoria WHERE id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }

    function totalCategorias() {
        $query = "SELECT * FROM categoria";
        $resultado = mysqli_query($this->conexao, $query);
        return $resultado->num_rows;
    }
}

?>