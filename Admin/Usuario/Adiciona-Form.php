<?php 
    session_start();
    
    require_once ("../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(20)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../home/index.php");
        die();
    }
    
    $titulo = "Painel Administrativo - Usuario"; 
    $paginaAtual = "Usuario";  
    $header = "Usuarios";

    $usuario = array();
    $usuario['senha'] = '';

    if (isset($_SESSION['nome'])) { 
        $usuario['nome'] = $_SESSION['nome'];
        unset($_SESSION['nome']);
    } else {
        $usuario['nome'] = '';
    }
    
    if (isset($_SESSION['email'])) { 
        $usuario['email'] = $_SESSION['email'];
        unset($_SESSION['email']);
    } else {
        $usuario['email'] = '';
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
