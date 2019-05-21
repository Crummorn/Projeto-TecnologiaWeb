<?php
require_once ("UsuarioService.php");

$usuarioService = new UsuarioService();

function insereUsuario($email, $senha, $nome) {
    $listaErros = array();

    if ((mb_strlen($email) < 3) OR (mb_strlen($email) > 100)) {
        array_push($listaErros, 'Campo Email precisa ter no min 3 carcteres e no max 100 caracteres!');
    }

    if ((mb_strlen($senha) < 3) OR (mb_strlen($senha) > 100)) {
        array_push($listaErros, 'Campo Senha precisa ter no min 3 carcteres e no max 100 caracteres!');
    }

    if ((mb_strlen($nome) < 3) OR (mb_strlen($nome) > 100)) {
        array_push($listaErros, 'Campo Nome precisa ter no min 3 carcteres e no max 100 caracteres!');
    }

    if (count($listaErros) > 0) {        
        adicionaUsuarioSession($email, $senha, $nome, $listaErros);
        header("Location: ../Adiciona-Form.php");  
        die(); 
    }

    return $GLOBALS['usuarioService']->adicionar($email, $senha, $nome);
}

function alteraUsuario($id, $email, $senha, $nome) {    
    $listaErros = array();

    if ((mb_strlen($email) < 3) OR (mb_strlen($email) > 100)) {
        array_push($listaErros, 'Campo Email precisa ter no min 3 carcteres e no max 100 caracteres!');
    }

    if ((mb_strlen($senha) < 3) OR (mb_strlen($senha) > 100)) {
        array_push($listaErros, 'Campo Senha precisa ter no min 3 carcteres e no max 100 caracteres!');
    }

    if ((mb_strlen($nome) < 3) OR (mb_strlen($nome) > 100)) {
        array_push($listaErros, 'Campo Nome precisa ter no min 3 carcteres e no max 100 caracteres!');
    }

    if (count($listaErros) > 0) {       
        adicionaUsuarioSession($email, $nome, $listaErros);
        header("Location: ../Altera-Form.php?id=".$id);  
        die(); 
    }

    return $GLOBALS['usuarioService']->alterar($id, $email, $senha, $nome);
}

function alteraUsuarioDados($id, $email, $nome) {    
    $listaErros = array();

    if ((mb_strlen($email) < 3) OR (mb_strlen($email) > 100)) {
        array_push($listaErros, 'Campo Email precisa ter no min 3 carcteres e no max 100 caracteres!');
    }

    if ((mb_strlen($nome) < 3) OR (mb_strlen($nome) > 100)) {
        array_push($listaErros, 'Campo Nome precisa ter no min 3 carcteres e no max 100 caracteres!');
    }

    if (count($listaErros) > 0) {       
        adicionaUsuarioSession($email, $nome, $listaErros);
        header("Location: ../Altera-Dados-Form.php?id=".$id);  
        die(); 
    }

    return $GLOBALS['usuarioService']->alterarDados($id, $email, $nome);
}

function alteraUsuarioSenha($id, $novaSenha, $novaSenha2) {    
    $listaErros = array();

    if ($novaSenha != $novaSenha2) { 
        array_push($listaErros, 'Nova senha foi digitada errada!'); 
    }

    if (count($listaErros) > 0) {   
        $_SESSION['listaErros'] = $listaErros;
        $_SESSION['alertType'] = 'danger';    
        header("Location: ../Altera-Senha-Form.php?id=".$id);  
        die(); 
    }

    return $GLOBALS['usuarioService']->alterarSenha($id, $novaSenha);
}

function alteraUsuarioPermissoes($id, $permissoes) {    
    if ($id == 1) :      
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não pode alterar as permissões do usuario master!';
        header("Location: ../Listagem.php");    
        die();
    endif;

    deletarPermissoesUsuario($id);

    foreach ($permissoes as $permissao) :
        adicionarPermissaoAoUsuario($id, $permissao);
    endforeach;

    return TRUE;
}

function ativaUsuario($id) {
    return $GLOBALS['usuarioService']->ativar($id);
}

function desativaUsuario($id) {    
    if ($id == 1) {     
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não pode desativar o usuario master!';
        header("Location: ../Listagem.php");    
        die();
    }

    return $GLOBALS['usuarioService']->desativar($id);
}

function listaUsuarios() {
    return $GLOBALS['usuarioService']->listaUsuarios();
}

function buscarUsuario($id) {
    return $GLOBALS['usuarioService']->buscaUsuario($id);
}

function totalUsuarios() {
    return $GLOBALS['usuarioService']->totalUsuarios();
}

function totalUsuariosAtivos() {
    return $GLOBALS['usuarioService']->totalUsuariosAtivos();
}

function totalUsuariosDesativados() {
    return $GLOBALS['usuarioService']->totalUsuariosDesativados();
}

function listarPermissaoUsuario($id) {
    return $GLOBALS['usuarioService']->listaPermissaoUsuario();
}

/*
 * Funções de Utilidade
 */

function adicionaUsuarioSession($email, $nome, $listaErros) {
    $_SESSION['email'] = $email;
    $_SESSION['nome'] = $nome;
    $_SESSION['listaErros'] = $listaErros;
    $_SESSION['alertType'] = 'danger';
}