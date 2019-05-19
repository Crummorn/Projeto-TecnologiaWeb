<?php
require_once('DataSource.php');
class FornecedorService extends DataSource {
    private $conexao;

    function __construct() {
        $this->conexao = $this->getConexao();
    }

    function adicionar($cnpj, $nome, $endereco, $contato) {
        $cnpj = mysqli_real_escape_string($this->conexao, $cnpj);
        $nome = mysqli_real_escape_string($this->conexao, $nome);
        $endereco = mysqli_real_escape_string($this->conexao, $endereco);
        $contato = mysqli_real_escape_string($this->conexao, $contato);

        $query = "INSERT INTO fornecedor (cnpj, nome, endereco, contato) 
                VALUES ('{$cnpj}', '{$nome}', '{$endereco}', '{$contato}')";
        return mysqli_query($this->conexao, $query);
    }

    function alterar($id, $cnpj, $nome, $endereco, $contato) {
        $cnpj = mysqli_real_escape_string($this->conexao, $cnpj);
        $nome = mysqli_real_escape_string($this->conexao, $nome);
        $endereco = mysqli_real_escape_string($this->conexao, $endereco);
        $contato = mysqli_real_escape_string($this->conexao, $contato);
        
        $query = "UPDATE fornecedor 
                    SET cnpj = '{$cnpj}', nome = '{$nome}', endereco = '{$endereco}', contato = '{$contato}' 
                    WHERE id = '{$id}'";
        return mysqli_query($this->conexao, $query);
    }

    function remover($id) {
        $query = "DELETE FROM fornecedor WHERE id = {$id}";
        return mysqli_query($this->conexao, $query);
    }
    
    function testaFornecedorNaoEstaSendoUsada($id) {
        $query = "SELECT * FROM produto WHERE produto.fornecedor_id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        return $resultado->num_rows === 0 ? true : false;
    }
    
    function listaFornecedores() {
        $fornecedores = array();
        $resultado = mysqli_query($this->conexao, "SELECT * FROM fornecedor");
        while($fornecedor = mysqli_fetch_assoc($resultado)) {
            array_push($fornecedores, $fornecedor);
        }
        return $fornecedores;
    }
    
    function buscaFornecedor($id) {
        $query = "SELECT * FROM fornecedor WHERE id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }
    
    function totalFornecedores() {
        $query = "SELECT * from fornecedor";
        $resultado = mysqli_query($this->conexao, $query);
        return $resultado->num_rows;
    }
}

?>