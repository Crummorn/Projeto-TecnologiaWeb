<?php  
    session_start();
    
    require_once ("../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(6)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../Home/Index.php");
        die();
    }
    
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
                            <h1>Cadastro de <?=$header?></h1>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="card mt-4">
                        <div class="card-header">Cadastrar <?=$header?></div>

                        <div class="card-body">
                            <div class="container-fluid">
                                <form action="Controller/Adicionar.php" method="POST">
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
<?php require_once '../Fragments/Footer.php' ?>