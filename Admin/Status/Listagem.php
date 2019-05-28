<?php 
    session_start();
    
    require_once ("../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(14)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../Home/Index.php");
        die();
    }

    require_once ("../Database/StatusController.php"); 

    $titulo = "Painel Administrativo - Status do Pedido"; 
    $paginaAtual = "Status";  
    $header = "Status do Pedido";

    require_once ("../Fragments/Funcoes-Basicas.php"); 
    require_once ("../Fragments/Head.php");  
    require_once ("../Fragments/Navbar.php");  
    require_once ("../Fragments/Sidebar.php"); 
    
    $statuss = listaStatus();
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
                        <div class="col-md-10">
                            <h1>Listagem de <?=$header?></h1>
                        </div>

                    <?php if (!testaPermissao(15)) : ?>
                        <div class="col-md-2">
                            <h1>
                                <a class="btn btn-success" href="Adiciona-Form.php">
                                    <i class="fa fa-plus"></i>
                                    <span class="d-none d-md-inline d-lg-inline">
                                        Adicionar
                                    </span>
                                </a>
                            </h1>
                        </div>
                    <?php endif; ?>

                    </div>

                    <!-- Card Content -->
                    <div class="card mt-4 mb-4">
                        <div class="card-header">Listagem de <?=$header?></div>

                        <div class="card-body">
                            <!-- Alertas-->
                            <?php include ("../Fragments/Alertas-Genericos.php"); ?>

                            <div class="container-fluid">
                                <!-- Table List -->				
                                <table class="table table-bordered table-hover mt-2">
                                    <thead>
                                        <tr>
                                            <th class="col-md-2 text-center">
                                                Codigo 
                                            </th>
                                            <th class="col-md-3 text-center">
                                                Nome 
                                            </th>
                                            <th class="col-md-4 text-center">
                                                Descricao 
                                            </th>
                                            <th class="col-md-3 text-center">Ações</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach($statuss as $status) : ?>
                                            <tr>
                                                <td scope="row" class="text-center" >
                                                    <?= $status['id'] ?>
                                                </td>

                                                <td class="text-center" >
                                                    <?= $status['nome'] ?>
                                                </td>  

                                                <td class="text-center" >
                                                    <?= $status['descricao'] ?>
                                                </td>  

                                                <td class="text-center form-inline">
                                                    
                                                    <?php if (!testaPermissao(16)) : ?>
                                                        <a class="btn btn-primary btn-xs mr-2" href="Altera-Form.php?id=<?=$status['id']?>">
                                                            <i class="fas fa-pencil-alt"></i>    
                                                            <span class="d-none d-md-inline d-lg-inline">
                                                                Alterar 
                                                            </span>
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if (!testaPermissao(17)) : ?>
                                                        <form action="Controller/Remover.php" method="post">
                                                            <input type="hidden" name="id" value="<?=$status['id']?>" />
                                                            <button class="btn btn-danger btn-xs js-delete-button">
                                                                <i class="fas fa-trash"></i> 
                                                                <span class="d-none d-md-inline d-lg-inline">
                                                                    Deletar
                                                                </span>
                                                            </button>
                                                        </form>
                                                    <?php endif; ?>
                                                    
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        <?php if (empty($statuss)) : ?>
                                            <tr>
                                                <td colspan="7" class="text-center">Nenhum status encontrada</td>
                                            </tr>
                                        <?php endif ?>
                                    </tbody>
                                </table>
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