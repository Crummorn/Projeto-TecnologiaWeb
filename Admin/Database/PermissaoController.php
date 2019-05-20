<?php
require_once ("PermissaoService.php");

function listaPermissoes() {
    $permissaoService = new PermissaoService();
    return $permissaoService->listaPermissoes();
}

function listarPermissoesUsuario($id) {
    $permissaoService = new PermissaoService();
    return $permissaoService->listaPermissoesUsuario($id);
}

function adicionarPermissaoAoUsuario($idUsuario, $idPermissao) {
    $permissaoService = new PermissaoService();
    $permissaoService->adicionaPermissaoAoUsuario($idUsuario, $idPermissao);
}

function deletarPermissoesUsuario($id) {
    $permissaoService = new PermissaoService();
    $permissaoService->deletaPermissoesUsuario($id);
}