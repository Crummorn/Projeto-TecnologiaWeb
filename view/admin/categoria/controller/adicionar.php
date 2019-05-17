<?php 
require_once("../../database/CategoriaController.php");     
session_start();

require_once ("../../database/LoginController.php"); 
verificaUsuario();

$nome = $_POST["nome"];

if(insereCategoria($nome)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Categoria ' . $nome .  ' adicionada com sucesso!';
    header("Location: ../listagem.php");    
    die();
}