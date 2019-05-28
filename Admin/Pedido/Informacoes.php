<?php 
    session_start();
    
    require_once ("../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(24)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../Home/Index.php");
        die();
    }
    
    require_once ("../Database/PedidoController.php"); 
    require_once ("../Database/StatusController.php"); 

    $titulo = "Painel Administrativo - Pedidos"; 
    $paginaAtual = "Pedido";    
    $header = "Pedidos";

    $id = $_GET['id'];

    $pedido = buscaPedido($id);
    $produtos = buscaPedidoProdutos($id);
    
    $statuss = listaStatus();

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
                        <h1>Informações de <?=$header?></h1>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">Protocolo: <?=$pedido['id']?></div>

                    <div class="card-body">
                        <!-- Alertas-->
                        <?php include ("../Fragments/Alertas-Genericos.php"); ?>

                        <span class="mb-4">
                            <h2>Informações do Pedido</h2>
                        </span>

                        <div class="container-fluid">
                            <div class="row mt-2">
                                <span class="col-md-4">
                                    Protocolo:
                                </span>
                                <span class="col-md-8">
                                    <?=$pedido['id']?>
                                </span>
                            </div>

                            <div class="row mt-2">
                                <span class="col-md-4">
                                    Endereço de Entrega:
                                </span>
                                <span class="col-md-8">
                                    <?=$pedido['endereco_entrega']?>
                                </span>
                            </div>

                            <div class="row mt-2">
                                <span class="col-md-4">
                                    Valor do Frete:
                                </span>
                                <span class="col-md-8">
                                    <?=$pedido['frete']?>
                                </span>
                            </div>

                            <div class="row mt-2">
                                <span class="col-md-4">
                                    Status:
                                </span>
                                <div class="col-md-8">
                                    <form class="form-inline" action="Controller/AlterarStatus.php" method="post">
                                        <input type="hidden" name="id" value="<?=$pedido['id']?>" />
                                        <select class="form-control" name="status_id">
                                            <?php 
                                                foreach($statuss as $status) : 
                                                $essaEhACategoria = $pedido['status_id'] == $status['id'];
                                                $selecao = $essaEhACategoria ? "selected='selected'" : "";
                                            ?>
                                            <option value="<?=$status['id']?>" <?=$selecao?>>
                                                <?=$status['nome']?>
                                            </option>
                                            <?php endforeach ?>
                                        </select>
                                        <button class="btn btn-success btn-xs ml-4">
                                            <i class="fas fa-check"></i>
                                            <span class="d-none d-md-inline d-lg-inline">
                                                Alterar Status
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <span class="mt-4">
                            <h2>Lista de Produtos</h2>
                        </span>

                        <!-- Table List -->
                        <table class="table table-bordered table-hover mt-2 text-center">
                            <thead>
                                <tr>
                                    <th class="col-md-1">
                                        Codigo
                                    </th>
                                    <th class="col-md-2 ">
                                        Nome
                                    </th>
                                    <th class="col-md-2 ">
                                        Valor Unit.
                                    </th>
                                    <th class="col-md-2 ">
                                        Quatidade
                                    </th>
                                    <th class="col-md-2 ">
                                        Total
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($produtos as $produto) : ?>
                                <tr>
                                    <td>
                                        <?= $produto['id'] ?>
                                    </td>
                                    <td>
                                        <?= $produto['nome'] ?>
                                    </td>
                                    <td>
                                        <?= $produto['valor'] ?>
                                    </td>
                                    <td>
                                        <?= $produto['quantidade'] ?>x
                                    </td>
                                    <td>
                                        <?= $produto['total'] ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="4">
                                        TOTAL (PRODUTOS + FRETE)
                                    </td>
                                    <td>
                                        <?=pedidoValorTotal($id)?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <a class="btn btn-danger float-right" type="button" href="Listagem.php">
                            <i class="fa fa-times"></i> <span>Voltar</span>
                        </a>
                    </div>
                </div>

            </div>


        </div>

    </div>
</section>

<!-- Fim do d-flex SideBar -->
</div>
<?php require_once '../Fragments/Footer.php' ?>