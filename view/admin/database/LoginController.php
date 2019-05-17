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

function usuarioLogado() {
    return $_SESSION["usuario_logado"];
}

function logaUsuario($nome) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Logado com sucesso!';
    $_SESSION["usuario_logado"] = $nome;
}

function logoutUsuario() {    
    session_start();
    unset($_SESSION["usuario_logado"]);
    session_destroy();       

    session_start();    
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Logout efetua com sucesso!';

    header("Location: ../../home/login.php");
}
