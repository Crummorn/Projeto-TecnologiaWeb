<?php 
require_once("../../database/categoria-controller.php");
session_start();

$nome = $_POST["nome"];

if ((mb_strlen($nome) < 3) OR (mb_strlen($nome) > 100)) {
    $_SESSION['nome'] = $nome;
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Campo Nome precisa ter no min 3 carcteres e no max 100 caracteres!';
    header("Location: ../adiciona-form.php");    
    die(); 
}

if(insereCategoria($conexao, $nome)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Categoria ' . $nome .  ' adicionada com sucesso!';
    header("Location: ../listagem.php");    
    die();
} else {
    $msg = mysqli_error($conexao);
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Categoria ' . $nome . ' Não Foi Adicionada: ' . $msg ;
    header("Location: ../listagem.php");    
    die();
}


