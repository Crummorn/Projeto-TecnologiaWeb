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
    die();
} else { 
    logaUsuario($usuario["nome"]);
    header("Location: ../index.php");  
    die();
}
