<?php 
    session_start();
    
    require_once ("../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(11)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../home/index.php");
        die();
    }
    
    require_once ("../Database/CategoriaController.php"); 
    require_once ("../Database/FornecedorController.php");
    require_once ("../Database/ProdutoController.php"); 

    $titulo = "Painel Administrativo - Produtos"; 
    $paginaAtual = "Produto";  
    $header = "Produto";

    $categorias = listaCategorias();
    $fornecedores = listaFornecedores();

    $produto = buscaProduto($_GET['id']);
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
                    <!-- Header -->
                    <div class="row pb-2 mb-2 border-bottom">
                            <h1>Alteração de <?=$header?></h1>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">Alterar <?=$header?></div>

                        <div class="card-body">
                            <div class="container-fluid">
                                <form action="Controller/Alterar.php" method="POST">
                                    <input type="hidden" name="id" value="<?=$produto['id']?>" />
                                    
                                    <?php include("../Fragments/Alertas-Genericos.php") ?>
                                    <?php include("Fragments/Form-Base.php") ?>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> <span>Salvar</span>
                                    </button>

                                    <a class="btn btn-danger float-right" type="button" href="Listagem.php">
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
<?php include '../Fragments/Footer.php' ?>