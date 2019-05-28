<?php 
    session_start();
    
    require_once ("../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(24)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../home/index.php");
        die();
    }
    
    require_once ("../Database/PedidoController.php");

    $titulo = "Painel Administrativo - Pedidos"; 
    $paginaAtual = "Pedido";
    $header = "Pedidos";

    require_once ("../Fragments/Funcoes-Basicas.php"); 
    require_once ("../Fragments/Head.php");  
    require_once ("../Fragments/Navbar.php");  
    require_once ("../Fragments/Sidebar.php");  
    
    $pedidos = listaPedidos();
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

                        <?php if (!testaPermissao(25)) : ?>
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
                                                Protocolo 
                                            </th>
                                            <th class="col-md-6 text-center">
                                                Status 
                                            </th>
                                            <th class="col-md-4 text-center">
                                                Ações
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach($pedidos as $pedido) : ?>
                                            <tr>
                                                <td scope="row" class="text-center" >
                                                    <?= $pedido['id'] ?>
                                                </td>

                                                <td class="text-center" >
                                                    <?= $pedido['status_nome'] ?>
                                                </td>  

                                                <td class="text-center form-inline">
                                                    <a class="btn btn-info btn-xs mr-2" href="Informacoes.php?id=<?=$pedido['id']?>">
                                                        <i class="fas fa-info-circle"></i>   
                                                        <span class="d-none d-md-inline d-lg-inline">
                                                            Informações
                                                        </span>
                                                    </a>
                                                    <?php if (!testaPermissao(27)) : ?>
                                                        <?php if ($pedido['ativo']) : ?>
                                                            <form action="Controller/Desativar.php" method="post">
                                                                <input type="hidden" name="id" value="<?=$pedido['id']?>" />
                                                                <button class="btn btn-danger btn-xs js-delete-button">
                                                                    <i class="fas fa-trash"></i> 
                                                                    <span class="d-none d-md-inline d-lg-inline">
                                                                        Desativar
                                                                    </span>
                                                                </button>
                                                            </form>
                                                            <?php else : ?>
                                                            <form action="Controller/Ativar.php" method="post">
                                                                <input type="hidden" name="id" value="<?=$pedido['id']?>" />
                                                                <button class="btn btn-success btn-xs js-delete-button">
                                                                    <i class="fas fa-check"></i>
                                                                    <span class="d-none d-md-inline d-lg-inline">
                                                                        Ativar
                                                                    </span>
                                                                </button>
                                                            </form>
                                                        <?php endif ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        <?php if (empty($pedidos)) : ?>
                                            <tr>
                                                <td colspan="7" class="text-center">Nenhum Pedido encontrado</td>
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