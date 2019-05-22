<?php 
    session_start();
    
    require_once ("../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(23)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../home/index.php");
        die();
    }
    
    require_once ("../Database/UsuarioController.php"); 

    $titulo = "Painel Administrativo - Usuarios"; 
    $paginaAtual = "Usuario";    
    $header = "Usuarios";

    $id = $_GET['id'];
    $permissoes = listaPermissoes();
    $permissoesUsuario = listarPermissoesUsuario($id);

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

                    <div class="card mt-4 mb-4">
                        <div class="card-header">Alterar Dados</div>

                        <div class="card-body">
                            <div class="container-fluid">
                                <form action="Controller/AlterarPermissoes.php" method="POST">
                                    <?php include("../Fragments/Alertas-Genericos.php") ?>
                                               
                                    <input type="hidden" name="id" value="<?=$id?>" />

                                    <?php foreach($permissoes as $permissao) : ?>
                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" 
                                                type="checkbox" 
                                                name="checkPermissao<?=$permissao['id']?>"
                                                value="<?=$permissao['id']?>"
                                                <?php 
                                                    foreach ($permissoesUsuario as $permissaoUsuario) :
                                                        if ($permissao['id'] == $permissaoUsuario['permissao_id']) :
                                                ?>
                                                            checked = "true"
                                                <?php
                                                        endif;
                                                    endforeach;  
                                                ?>
                                            >
                                            <label class="form-check-label" for="<?=$permissao['nome']?>"><?=$permissao['nome']?></label>
                                        </div>
                                        <br>
                                    <?php endforeach; ?>

                                    <button type="submit" class="btn btn-primary mt-4">
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