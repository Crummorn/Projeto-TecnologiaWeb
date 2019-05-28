<?php
require_once ("LoginService.php");

$loginService= new LoginService();

function buscaUsuario($email, $senha) {    
    return $GLOBALS['loginService']->login($email, $senha);
}

function usuarioEstaLogado() {
    return isset($_SESSION["usuario_logado"]);
}

function verificaUsuario() {
    if(!usuarioEstaLogado()) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem acesso a esta funcionalidade!';
        header("Location: ../home/login.php");
        die();
    }
}

function verificaUsuarioLogin() {
    if(usuarioEstaLogado() != NULL) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Faça logout para ter acesso ao login!';
        header("Location: ../home/index.php");
        die();
    }
}

function testaPermissao($id) {
    $permissoes = $_SESSION["usuarioPermissoes"];

    foreach ($permissoes as $permissao) :
        if ($permissao['permissao_id'] == $id) :
            return FALSE;
        endif;
    endforeach;

    return TRUE;
}

function usuarioLogado() {
    return $_SESSION["usuario_logado"];
}

function logaUsuario($usuario, $permissoes) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Logado com sucesso!';
    $_SESSION["usuario_logado"] = $usuario["nome"];
    $_SESSION["usuarioDados"] = $usuario;
    $_SESSION["usuarioPermissoes"] = $permissoes;
}

function logoutUsuario() {    
    session_start();
    unset($_SESSION["usuario_logado"]);
    unset($_SESSION["usuarioDados"]);
    unset($_SESSION["usuarioPermissoes"]);
    session_destroy();       

    session_start();    
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Logout efetudo com sucesso!';

    header("Location: ../../Home/Login.php");
}
