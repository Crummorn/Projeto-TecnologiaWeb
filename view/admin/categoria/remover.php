<?php 
include("../database/conecta.php");
include("../database/categoria-controller.php");
include("../database/categoria-service.php");

session_start();

$id = $_POST['id'];
$categoria = buscaCategoria($conexao, $id);

if(removeCategoria($conexao, $id)) {
    $_SESSION['alertType'] = 'success';
    $_SESSION['alertMsg'] = 'Categoria ' . $categoria['nome'] .  ' removida com sucesso!';
    header("Location: listagem.php");    
    die();
} else {
    $msg = mysqli_error($conexao);
    $_SESSION['alertType'] = 'danger';
    $_SESSION['alertMsg'] = 'Categoria ' . $categoria['nome'] . ' não pode ser removida: ' . $msg ;
    header("Location: listagem.php");    
    die();
}


