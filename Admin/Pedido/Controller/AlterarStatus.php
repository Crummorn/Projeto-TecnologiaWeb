<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(26)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../Listagem.php");
        die();
    }    

    require_once("../../Database/PedidoController.php");

    $id = $_POST['id'];
    $idStatus = $_POST["status_id"];

    if(alteraStatusPedido($id, $idStatus)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Status do Pedido ' . $pedido['id'] .  ' alterado com sucesso!';
        header("Location: ../Informacoes.php?id=" . $id);    
        die();
    }