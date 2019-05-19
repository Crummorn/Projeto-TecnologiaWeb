<?php 
require_once ("../../database/LoginController.php"); 
session_start();

$email = $_POST["email"];
$senha = $_POST["senha"];
$usuario = buscaUsuario($email, $senha);

if($usuario == null) {
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Usuário ou senha inválido!';
    header("Location: ../login.php"); 
} else if ($usuario['ativo']) { 
    logaUsuario($usuario);
    header("Location: ../index.php");  
} else {
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Usuário desativado!';
    header("Location: ../login.php"); 
}

die();