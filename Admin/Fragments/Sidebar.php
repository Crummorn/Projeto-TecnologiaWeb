<div class="d-flex" id="wrapper">
    
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Painel Administrativo </div>
        <div class="list-group list-group-flush mt-4">
            <a href="../Home/Index.php" 
                class="list-group-item list-group-item-action bg-light
                <?php linkSidebarAtivo($paginaAtual, 'Home') ?>">
                Home
            </a>
            <a href="../Categoria/Listagem.php" 
                class="list-group-item list-group-item-action bg-light
                <?php linkSidebarAtivo($paginaAtual, 'Categoria') ?>">
                Categoria
            </a>
            <a href="../Fornecedor/Listagem.php" 
                class="list-group-item list-group-item-action bg-light
                <?php linkSidebarAtivo($paginaAtual, 'Fornecedor') ?>">
                Fornecedor
            </a>
            <a href="../Produto/Listagem.php" 
                class="list-group-item list-group-item-action bg-light
                <?php linkSidebarAtivo($paginaAtual, 'Produto') ?>">
                Produtos
            </a>
            <a href="../Status/Listagem.php" 
                class="list-group-item list-group-item-action bg-light
                <?php linkSidebarAtivo($paginaAtual, 'Status') ?>">
                Status Pedido
            </a>
            <a href="../Usuario/Listagem.php" 
                class="list-group-item list-group-item-action bg-light
                <?php linkSidebarAtivo($paginaAtual, 'Usuario') ?>">
                Usuarios
            </a>
        </div>
    </div>


