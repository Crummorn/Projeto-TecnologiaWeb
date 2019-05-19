<?php     
    session_start();

    require_once ("../Database/LoginController.php"); 
    verificaUsuario();
    
    require_once ("../Database/CategoriaController.php"); 
    require_once ("../Database/FornecedorController.php"); 
    require_once ("../Database/ProdutoController.php"); 
    require_once ("../Database/StatusController.php"); 

    $fonecedores = listaFornecedores();

    $titulo = "Painel Administrativo - Index"; 
    $paginaAtual = "Home";
    
    require_once ("../Fragments/Funcoes-Basicas.php"); 
    require_once ("../Fragments/Head.php");  
    require_once ("../Fragments/Navbar.php");  
    require_once ("../Fragments/Sidebar.php"); 
    
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

                    <div class="card mt-4 mb-4">
                        <div class="card-header"><?=$paginaAtual?></div>

                        <div class="card-body">
                            <div class="container-fluid">       
                                <!-- Alertas-->
                                <?php include ("../Fragments/Alertas-Genericos.php"); ?>
                                
                                <p>
                                    <h3>Categorias</h3>
                                    Total de Categorias: <?=totalCategorias()?>
                                </p>
                                <p>
                                    <h3>Fornecedores</h3>
                                    Total de Fornecedores: <?=totalFornecedores()?>
                                </p>
                                <p> 
                                    <h3>Produtos</h3>
                                    Total de Produtos: <?=totalProdutos()?><br>
                                    Total de Estoque de Produtos: <?=totalEstoqueProdutos()?>

                                    <?php foreach($fonecedores as $fornecedor) : ?>
                                        <br>
                                        <br>
                                        Estoque do fornecedor <?=$fornecedor['nome']?>
                                        <br>
                                        Total de Estoque de Produtos: <?=totalEstoqueProdutosFornecedor($fornecedor['id'])?>
                                        <br>
                                        Lucro Esperado: <?=possivelLucroDeUmFornecedor($fornecedor['id'])?>
                                    <?php endforeach ?>
                                </p>
                                <p> 
                                    <h3>Status Pedido</h3>
                                    Total de Status_Pedido: <?=totalStatuss()?><br>
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
<?php require_once '../Fragments/Footer.php' ?>