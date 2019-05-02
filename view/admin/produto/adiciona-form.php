<?php 
    session_start();

    require_once ("../database/categoria-controller.php"); 
    require_once ("../database/fornecedor-controller.php"); 
 
    $titulo = "Painel Administrativo - Produtos"; 
    $paginaAtual = "Produto";  
    $header = "Produto";

    $categorias = listaCategorias($conexao);
    $fornecedores = listaFornecedores($conexao);

    $produto = array("nome" => "", "valor" => "", "descricao" => "", "peso" => "", "estoque" => "", "custo" => "", "categoria_id" => "", "fornecedor_id" => "");
    if (isset($_SESSION['nome'])) { 
        $produto['nome'] = $_SESSION['nome'];
        unset($_SESSION['nome']);
    } 
    if (isset($_SESSION['valor'])) { 
        $produto['valor'] = $_SESSION['valor'];
        unset($_SESSION['valor']);
    }  
    if (isset($_SESSION['descricao'])) { 
        $produto['descricao'] = $_SESSION['descricao'];
        unset($_SESSION['descricao']);
    }  
    if (isset($_SESSION['peso'])) { 
        $produto['peso'] = $_SESSION['peso'];
        unset($_SESSION['peso']);
    }  
    if (isset($_SESSION['estoque'])) { 
        $produto['estoque'] = $_SESSION['estoque'];
        unset($_SESSION['estoque']);
    }  
    if (isset($_SESSION['custo'])) { 
        $produto['custo'] = $_SESSION['custo'];
        unset($_SESSION['custo']);
    }  
    if (isset($_SESSION['categoria_id'])) { 
        $produto['categoria_id'] = $_SESSION['categoria_id'];
        unset($_SESSION['categoria_id']);
    } 
    if (isset($_SESSION['fornecedor_id'])) { 
        $produto['fornecedor_id'] = $_SESSION['fornecedor_id'];
        unset($_SESSION['fornecedor_id']);
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