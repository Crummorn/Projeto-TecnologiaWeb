<?php 
require_once("../../database/CategoriaController.php");

session_start();

$id = $_POST['id'];
$categoria = buscaCategoria($id);

if(removeCategoria($id)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Categoria ' . $categoria['nome'] .  ' removida com sucesso!';
    header("Location: ../listagem.php");    
    die();
} 