<?php 
    session_start();
    
    $titulo = "Painel Administrativo - Fornecedores"; 
    $paginaAtual = "Fornecedor";  
    $header = "Fornecedores";

    $fornecedor = array("cnpj" => "","nome" => "","endereco" => "","contato" => "");

    if (isset($_SESSION['cnpj'])) { 
        $fornecedor['cnpj'] = $_SESSION['cnpj'];
        unset($_SESSION['cnpj']);
    } 
    if (isset($_SESSION['nome'])) { 
        $fornecedor['nome'] = $_SESSION['nome'];
        unset($_SESSION['nome']);
    } 
    if (isset($_SESSION['endereco'])) { 
        $fornecedor['endereco'] = $_SESSION['endereco'];
        unset($_SESSION['endereco']);
    } 
    if (isset($_SESSION['contato'])) { 
        $fornecedor['contato'] = $_SESSION['contato'];
        unset($_SESSION['contato']);
    } 

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
                                <form action="controller/adicionar.php" method="POST">
                                    <?php include("../fragments/alertas-genericos.php") ?>
                                    <?php include("fragments/form-base.php") ?>

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
<?php require_once '../fragments/footer.php' ?>