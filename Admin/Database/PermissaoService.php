<?php
require_once('DataSource.php');

class PermissaoService extends DataSource {
    private $conexao;

    function __construct() {
        $this->conexao = $this->getConexao();
    }

    function listaPermissoes() {
        $permissoes = array();
        $resultado = mysqli_query($this->conexao, "SELECT * FROM permissao");
        while($permissao = mysqli_fetch_assoc($resultado)) {
            array_push($permissoes, $permissao);
        }
        return $permissoes;
    }

    function listaPermissoesUsuario($id) {
        $permissoes = array();
        $query = "SELECT * FROM usuario_permissao up WHERE up.usuario_id = $id";
        $resultado = mysqli_query($this->conexao, $query);
        while($permissao = mysqli_fetch_assoc($resultado)) {
            array_push($permissoes, $permissao);
        }
        return $permissoes;
    }

    function adicionaPermissaoAoUsuario($idUsuario, $idPermissao) {
        $query = "INSERT INTO usuario_permissao (usuario_id, permissao_id) 
                    VALUES ('{$idUsuario}', '{$idPermissao}');";
        return mysqli_query($this->conexao, $query);
    }

    function deletaPermissoesUsuario($id) {
        $query = "DELETE FROM usuario_permissao WHERE 'usuario_id' = $id;";
        return mysqli_query($this->conexao, $query);
    }
    
}

?>