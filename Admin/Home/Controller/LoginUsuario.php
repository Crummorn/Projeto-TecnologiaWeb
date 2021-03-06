<?php 
require_once ("../../database/LoginController.php"); 
require_once ("../../database/PermissaoController.php"); 
session_start();

$email = $_POST["email"];
$senha = $_POST["senha"];
$usuario = buscaUsuario($email, $senha);
$permissoes = listarPermissoesUsuario($usuario['id']);

if($usuario == null) {
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Usuário ou senha inválido!';
    header("Location: ../Login.php"); 
} else if ($usuario['ativo']) { 
    logaUsuario($usuario, $permissoes);
    header("Location: ../Index.php");  
} else {
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Usuário desativado!';
    header("Location: ../Login.php"); 
}

die();