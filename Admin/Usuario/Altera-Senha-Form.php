<?php 
    session_start();
    
    require_once ("../Database/LoginController.php"); 
    verificaUsuario();
    
    require_once ("../Database/UsuarioController.php"); 

    $titulo = "Painel Administrativo - Usuarios"; 
    $paginaAtual = "Home";    
    $header = "Usuarios";
    
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
                        <div class="card-header">Alterar Senha</div>

                        <div class="card-body">
                            <div class="container-fluid">
                                <form action="Controller/AlterarSenha.php" method="POST">
                                    <?php include("../Fragments/Alertas-Genericos.php") ?>
                                                                                         
                                    <div class="form-group">
                                        <label class="control-label" for="novaSenha">Nova Senha *</label>
                                        <input type="password" class="form-control" name="novaSenha"  
                                            placeholder="Informe a Nova Senha" value="">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label" for="novaSenha2">Nova Senha *</label>
                                        <input type="password" class="form-control" name="novaSenha2"
                                            placeholder="Informe a Nova Senha" value="">
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> <span>Alterar Senha</span>
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