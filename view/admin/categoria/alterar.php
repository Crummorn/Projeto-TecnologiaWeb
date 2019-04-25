<?php 
include("../database/conecta.php");
include("../database/banco-categoria.php");
include("../fragments/funcoes-basicas.php");
session_start();

$id = $_POST["id"];
$nome = $_POST["nome"];
$categoria = buscaCategoria($conexao, $id);

if(alteraCategoria($conexao, $id, $nome)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Categoria ' . $categoria['nome'] .  ' alterada com sucesso!';
    header("Location: listagem.php");    
    die();
} else {
    $msg = mysqli_error($conexao);
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Categoria ' . $categoria['nome'] . ' não foi alterada: ' . $msg ;
    header("Location: listagem.php");    
    die();
}


