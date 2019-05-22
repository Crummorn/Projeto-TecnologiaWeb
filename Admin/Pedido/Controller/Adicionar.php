<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(25)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../home/index.php");
        die();
    }
    
    require_once("../../Database/PedidoController.php");    

    $endereco = $_POST["endereco"];
    $frete = $_POST["frete"];

    $produtos = array();
    $array = " ";
    for ($i = 1; $i <= 18; $i++) :
        if(isset($_POST["checkProduto".$i])) :
            $produto['id'] = $_POST["checkProduto".$i];
            $produto['quantidade'] = $_POST["quantidadeProduto".$i];
            testaEstoqueMenorIgual($produto['id'], $produto['quantidade']);
            array_push($produtos, $produto);
        endif;
    endfor;

    if(inserePedido($endereco, $frete, $produtos)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'Produto adicionada com sucesso!';
        header("Location: ../Listagem.php");    
        die();
    } else {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = 'pokpokpokpokpokpokopk!';
        header("Location: ../Listagem.php");    
        die();
    }