<?php
require_once('DataSource.php');
class LoginService extends DataSource {
    private $conexao;

    function __construct() {
        $this->conexao = $this->getConexao();
    }

    function login($email, $senha) {
        $senhaMd5 = md5($senha);
        $email = mysqli_real_escape_string($this->conexao, $email);
    
        $query = "SELECT * FROM usuario WHERE email='{$email}' AND senha='{$senhaMd5}'";
        $resultado = mysqli_query($this->conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }

}

?>