<?php 
require_once("../../database/CategoriaController.php");
session_start();

require_once ("../../database/LoginController.php"); 
verificaUsuario();

$id = $_POST['id'];
$categoria = buscaCategoria($id);

if(removeCategoria($id)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Categoria ' . $categoria['nome'] .  ' removida com sucesso!';
    header("Location: ../listagem.php");    
    die();
} 