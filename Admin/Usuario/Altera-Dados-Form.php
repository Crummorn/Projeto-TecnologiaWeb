<?php 
    session_start();
    
    require_once ("../Database/LoginController.php"); 
    verificaUsuario();
    
    require_once ("../Database/UsuarioController.php"); 

    $titulo = "Painel Administrativo - Usuarios"; 
    $paginaAtual = "Home";    
    $header = "Usuarios";

    $usuario = $_SESSION['usuarioDados'];

    if (isset($_SESSION['nome'])) { 
        unset($_SESSION['nome']);
    } 

    if (isset($_SESSION['email'])) { 
        $usuario['email'] = $_SESSION['email'];
        unset($_SESSION['email']);
    } 
    
    $usuario['senha'] = "";

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
                        <div class="card-header">Alterar Dados</div>

                        <div class="card-body">
                            <div class="container-fluid">
                                <form action="Controller/AlterarDados.php" method="POST">
                                    <?php include("../Fragments/Alertas-Genericos.php") ?>
                                                                        
                                    <div class="form-group">
                                        <label class="control-label" for="nome">Nome *</label>
                                        <input type="text" class="form-control" name="nome" autofocus="autofocus" 
                                            placeholder="Informe o Nome" value="<?= $usuario['nome'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="email">Email *</label>
                                        <input type="email" class="form-control" name="email" autofocus="autofocus" 
                                            placeholder="Informe o Email" value="<?= $usuario['email'] ?>">
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12 ">
                                            <p class="form-control-plaintext text-danger">* Campos Obrigatórios</p>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> <span>Salvar</span>
                                    </button>
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