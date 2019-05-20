<?php 
    session_start();
    
    require_once ("../../Database/LoginController.php"); 
    verificaUsuario();

    require_once("../../Database/UsuarioController.php");

    $id = $_POST['id'];
    $usuario = buscarUsuario($id);

    $permissoes = array();
    for ($i = 1; $i <= 18; $i++) :
        if(isset($_POST["checkPermissao".$i])) :
            array_push($permissoes, $_POST["checkPermissao".$i]);
        endif;  
    endfor;

    if(alteraUsuarioPermissoes($id, $permissoes)) {
        $_SESSION['alertType'] = 'success';
        $_SESSION['alertMsg'] = "Permissões do usuario ".$usuario['nome']." alterados com sucesso!";  
        header("Location: ../Listagem.php"); 
        die();
    }  