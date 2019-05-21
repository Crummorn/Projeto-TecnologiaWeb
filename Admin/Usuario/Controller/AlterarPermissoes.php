<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(23)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../home/index.php");
        die();
    }

    require_once("../../Database/UsuarioController.php");

    $id = $_POST['id'];
    $usuario = buscarUsuario($id);

    $permissoes = array();
    for ($i = 1; $i <= 18; $i++) :
        if(isset($_POST["checkPermissao".$i])) :
            array_push($permissoes, $i);
        endif;
    endfor;
    
    if(alteraUsuarioPermissoes($id, $permissoes)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = "Permissões do usuario ".$usuario['nome']." alterados com sucesso!";  
        header("Location: ../Listagem.php"); 
        die();
    }  