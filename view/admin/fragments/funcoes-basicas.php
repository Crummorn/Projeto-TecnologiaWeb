<?php

// Testa qual link da sidebar esta ativo e aloca uma classe active no link
function linkSidebarAtivo($paginaAtual, $link) {
    if ($paginaAtual === $link) {
        echo 'active';
    }
}
