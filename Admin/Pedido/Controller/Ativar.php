<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(27)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../home/index.php");
        die();
    }

    require_once("../../Database/PedidoController.php");

    $id = $_POST['id'];
    $pedido = buscaPedido($id);

    if(ativarPedido($id)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Pedido ' . $pedido['id'] .  ' ativado com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    } else {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Pedido ' . $pedido['id'] .  ' não foi ativado!';
        header("Location: ../Listagem.php");    
        die();
    }