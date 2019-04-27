<?php     
    require_once ("../database/categoria-controller.php"); 
    require_once ("../database/fornecedor-controller.php"); 
    require_once ("../database/produto-controller.php"); 
    require_once ("../database/status-controller.php"); 

    $titulo = "Painel Administrativo - Index"; 
    $paginaAtual = "Home";

    require_once ("../fragments/funcoes-basicas.php"); 
    require_once ("../fragments/head.php");  
    require_once ("../fragments/navbar.php");  
    require_once ("../fragments/sidebar.php"); 
?>

<!-- Content -->
<section class="cover">
    <div class="cover-caption">
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                
                <div class="col-md-12 col-sm-12 col-xs-12 mt-3">
                    <div class="row pb-2 mb-2 border-bottom">
                        <div class="col-md-12">
                            <h1><?=$paginaAtual?></h1>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header"><?=$paginaAtual?></div>

                        <div class="card-body">
                            <div class="container-fluid">
                                <p>
                                    <h3>Categorias</h3>
                                    Total de Categorias: <?=totalCategorias($conexao)?>
                                </p>
                                <p>
                                    <h3>Fornecedores</h3>
                                    Total de Fornecedores: <?=totalFornecedores($conexao)?>
                                </p>
                                <p> 
                                    <h3>Produtos</h3>
                                    Total de Produtos: <?=totalProdutos($conexao)?><br>
                                    Total de Estoque de Produtos: <?=totalEstoqueProdutos($conexao)?><br>
                                    Lucro possivel de 1: <?=possivelLucroDeUmProdutoEspecifico($conexao, 1)?><br>
                                    Estoque Fornecedor 4: <?=totalEstoqueProdutosFornecedorEspecifico($conexao, 4)?>
                                </p>
                                <p> 
                                    <h3>Status Pedido</h3>
                                    Total de Status_Pedido: <?=totalStatuss($conexao)?><br>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fim do d-flex SideBar -->
</div>
<?php require_once '../fragments/footer.php' ?>