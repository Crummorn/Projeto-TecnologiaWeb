<div class="d-flex" id="wrapper">
    
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Painel Administrativo </div>
        <div class="list-group list-group-flush mt-4">
            <a href="../home/index.php" 
                class="list-group-item list-group-item-action bg-light
                <?php linkSidebarAtivo($paginaAtual, 'Home') ?>">
                Home
            </a>
            <a href="../categoria/listagem.php" 
                class="list-group-item list-group-item-action bg-light
                <?php linkSidebarAtivo($paginaAtual, 'Categoria') ?>">
                Categoria
            </a>
            <a href="../fornecedor/listagem.php" 
                class="list-group-item list-group-item-action bg-light
                <?php linkSidebarAtivo($paginaAtual, 'Fornecedor') ?>">
                Fornecedor
            </a>
            <a href="../produto/listagem.php" 
                class="list-group-item list-group-item-action bg-light
                <?php linkSidebarAtivo($paginaAtual, 'Produto') ?>">
                Produtos
            </a>
            <a href="../status/listagem.php" 
                class="list-group-item list-group-item-action bg-light
                <?php linkSidebarAtivo($paginaAtual, 'Status') ?>">
                Status Pedido
            </a>
            <a href="../home/login.php" class="list-group-item list-group-item-action bg-light">Login</a>
        </div>
    </div>


