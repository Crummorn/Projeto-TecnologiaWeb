<?php     
    include ("../database/conecta.php"); 
    include ("../database/banco-categoria.php"); 
    include ("../database/banco-fornecedor.php"); 

    $titulo = "Painel Administrativo - Index"; 
    $paginaAtual = "Home";

    include ("../fragments/funcoes-basicas.php"); 
    include ("../fragments/head.php");  
    include ("../fragments/navbar.php");  
    include ("../fragments/sidebar.php"); 
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
                                    Total de Categorias: <?=totalCategorias($conexao)?>
                                </p>
                                <p>
                                    Total de Fornecedores: <?=totalFornecedores($conexao)?>
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
<?php include '../fragments/footer.php' ?>