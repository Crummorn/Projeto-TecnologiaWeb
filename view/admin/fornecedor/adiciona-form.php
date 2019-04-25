<?php 
    $titulo = "Painel Administrativo - Fornecedores"; 
    $paginaAtual = "Fornecedor";  
    $header = "Fornecedores";

    $fornecedor = array("cnpj" => "","nome" => "","endereco" => "","contato" => "");

    include ("../fragments/funcoes-basicas.php"); 
    include ("../fragments/head.php");  
    include ("../fragments/navbar.php");  
    include ("../fragments/sidebar.php"); 
    session_start();
?>

<!-- Content -->
<section class="cover">
    <div class="cover-caption">
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">

                <div class="col-md-12 col-sm-12 col-xs-12 mt-3">
                    <!-- Header -->
                    <div class="row pb-2 mb-2 border-bottom">
                            <h1>Cadastro de <?=$header?></h1>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="card mt-4">
                        <div class="card-header">Cadastrar <?=$header?></div>

                        <div class="card-body">
                            <div class="container-fluid">
                                <form action="adicionar.php" method="POST">
                                    <?php include("form-base.php") ?>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> <span>Salvar</span>
                                    </button>

                                    <a class="btn btn-danger float-right" type="button" href="listagem.php">
                                        <i class="fa fa-times"></i> <span>Cancelar</span>
                                    </a>
                                </form>

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