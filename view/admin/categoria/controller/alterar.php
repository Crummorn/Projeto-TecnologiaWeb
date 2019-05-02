<?php 
require_once("../../database/categoria-controller.php");
session_start();

$id = $_POST["id"];
$nome = $_POST["nome"];
$categoria = buscaCategoria($conexao, $id);

if ((mb_strlen($nome) < 3) OR (mb_strlen($nome) > 100)) {
    $_SESSION['nome'] = $nome;
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Campo Nome precisa ter no min 3 carcteres e no max 100 caracteres!';
    header("Location: ../altera-form.php?id=".$categoria['id']);    
    die(); 
}

if(alteraCategoria($conexao, $id, $nome)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Categoria ' . $categoria['nome'] .  ' alterada com sucesso!';
    header("Location: ../listagem.php");    
    die();
} else {
    $msg = mysqli_error($conexao);
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Categoria ' . $categoria['nome'] . ' não foi alterada: ' . $msg ;
    header("Location: ../listagem.php");    
    die();
}


