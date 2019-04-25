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
    
}

?>