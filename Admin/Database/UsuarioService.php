<?php
require_once('DataSource.php');
class UsuarioService extends DataSource {
    private $conexao;

    function __construct() {
        $this->conexao = $this->getConexao();
    }

    function adicionar($email, $senha, $nome) {
        $email = mysqli_real_escape_string($this->conexao, $email);
        $nome = mysqli_real_escape_string($this->conexao, $nome);        
        $senhaMd5 = md5($senha);
        $query = "INSERT INTO usuario (email, senha, nome) 
                    VALUES ('{$email}', '{$senhaMd5}', '{$nome}')";
        return mysqli_query($this->conexao, $query);
    }

    function alterar($id, $email, $senha, $nome) {
        $email = mysqli_real_escape_string($this->conexao, $email);
        $nome = mysqli_real_escape_string($this->conexao, $nome);  
        $senhaMd5 = md5($senha);         
        $query = "UPDATE usuario 
                    SET email = '{$email}',nome = '{$nome}',senha='{$senhaMd5}'
                    WHERE id = '{$id}'";
        return mysqli_query($this->conexao, $query);
    }

    function alterarDados($id, $email, $nome) {
        $email = mysqli_real_escape_string($this->conexao, $email);
        $nome = mysqli_real_escape_string($this->conexao, $nome);           
        $query = "UPDATE usuario 
                    SET email = '{$email}',nome = '{$nome}' 
                    WHERE id = '{$id}'";
        return mysqli_query($this->conexao, $query);
    }

    function alterarSenha($id, $senhaNova) {          
        $senhaNovaMd5 = md5($senhaNova);
        $query = "UPDATE usuario SET senha = '{$senhaNovaMd5}' WHERE id = '{$id}'";
        return mysqli_query($this->conexao, $query);
    }

    function ativar($id) {        
        $query = "UPDATE usuario 
                    SET ativo = '1' 
                    WHERE id = '{$id}'";
        return mysqli_query($this->conexao, $query);    
    }

    function desativar($id) {
        $query = "UPDATE usuario 
                    SET ativo = '0' 
                    WHERE id = '{$id}'";
        return mysqli_query($this->conexao, $query);   
    }

    function listaUsuarios() {
        $usuarios = array();
        $resultado = mysqli_query($this->conexao, "SELECT * FROM usuario");
        while($usuario = mysqli_fetch_assoc($resultado)) {
            array_push($usuarios, $usuario);
        }
        return $usuarios;
    }
    
    function buscaUsuario($id) {
        $query = "SELECT * FROM usuario WHERE id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }
    
    function totalUsuarios() {
        $query = "SELECT * from usuario";
        $resultado = mysqli_query($this->conexao, $query);
        return $resultado->num_rows;
    }

    function totalUsuariosAtivos() {
        $query = "SELECT * 
                    FROM usuario u
                    WHERE u.ativo = 1";
        $resultado = mysqli_query($this->conexao, $query);
        return $resultado->num_rows;
    }

    function totalUsuariosDesativados() {
        $query = "SELECT * 
                    FROM usuario u
                    WHERE u.ativo = 0";
        $resultado = mysqli_query($this->conexao, $query);
        return $resultado->num_rows;
    }
}

?>