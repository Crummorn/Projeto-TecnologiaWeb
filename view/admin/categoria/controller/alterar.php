<?php 
require_once("../../database/CategoriaController.php");
session_start();

$id = $_POST["id"];
$nome = $_POST["nome"];
$categoria = buscaCategoria($id);

if(alteraCategoria($id, $nome)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Categoria ' . $categoria['nome'] .  ' alterada com sucesso!';
    header("Location: ../listagem.php");    
    die();
} 