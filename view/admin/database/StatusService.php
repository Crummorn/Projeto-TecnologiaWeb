<?php
require_once('DataSource.php');
class StatusService extends DataSource {
    private $conexao;

    function __construct() {
        $this->conexao = $this->getConexao();
    }

    function adicionar($nome, $descricao) {
        $nome = mysqli_real_escape_string($this->conexao, $nome);
        $descricao = mysqli_real_escape_string($this->conexao, $descricao);

        $query = "INSERT INTO status_pedido (nome, descricao) VALUES ('{$nome}', '{$descricao}')";
        return mysqli_query($this->conexao, $query);
    }
    
    function alterar($id, $nome, $descricao) {
        $nome = mysqli_real_escape_string($this->conexao, $nome);
        $descricao = mysqli_real_escape_string($this->conexao, $descricao);
        
        $query = "UPDATE status_pedido 
                    SET nome = '{$nome}', descricao = '{$descricao}' 
                    WHERE id = '{$id}'";
        return mysqli_query($this->conexao, $query);
    }
    
    function remover($id) {
        $query = "DELETE FROM status_pedido WHERE id = {$id}";
        return mysqli_query($this->conexao, $query);
    }
    
    function listaStatus() {
        $statuss = array();
        $resultado = mysqli_query($this->conexao, "SELECT * FROM status_pedido");
        while($status = mysqli_fetch_assoc($resultado)) {
            array_push($statuss, $status);
        }
        return $statuss;
    }

    function buscaStatus($id) {
        $query = "SELECT * FROM status_pedido WHERE id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }

    function totalStatuss() {
        $query = "SELECT * FROM status_pedido";
        $resultado = mysqli_query($this->conexao, $query);
        return $resultado->num_rows;
    }
}

?>