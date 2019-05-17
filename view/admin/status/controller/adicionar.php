<?php 
require_once("../../database/StatusController.php");
session_start();

require_once ("../../database/LoginController.php"); 
verificaUsuario();

$nome = $_POST["nome"];
$descricao = $_POST["descricao"];

if(insereStatus($nome, $descricao)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Status ' . $nome .  ' adicionado com sucesso!';
    header("Location: ../listagem.php");    
    die();
}