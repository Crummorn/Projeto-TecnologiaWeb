<?php 
    session_start();
    
    require_once ("../Database/LoginController.php"); 
    verificaUsuario();
    
    $permissoes = $_SESSION["usuarioPermissoes"];
    
    if (testaPermissao(25)) {
        $_SESSION['alertType'] = 'danger';
        $_SESSION['alertMsg'] = 'Você não tem permissão para executar está ação!';
        header("Location: ../home/index.php");
        die();
    }

    require_once ("../Database/ProdutoController.php"); 
    
    $titulo = "Painel Administrativo - Pedidos"; 
    $paginaAtual = "Pedido";  
    $header = "Pedidos";
    
    $produtos = listaProdutos();
    $pedido = array();

    if (isset($_SESSION['endereco'])) { 
        $pedido['endereco'] = $_SESSION['endereco'];
        unset($_SESSION['endereco']);
    } else {
        $pedido['endereco'] = '';
    }

    $quantidadeProdutos = 0;

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

                                    <div class="form-group">
                                        <label class="control-label" for="endereco">Endereco *</label>
                                        <input type="text" class="form-control" name="endereco" autofocus="autofocus" 
                                            placeholder="Informe o Endereco" value="<?= $pedido['endereco'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="frete">Valor do Frete *</label>
                                        <input type="number" class="form-control" name="frete" autofocus="autofocus" 
                                            placeholder="Informe o valor do Frete">
                                    </div>
                                    
                                    <span class="mt-4">
                                        <h2>Selecione os Produtos:</h2>
                                    </span>

                                    <div class="container">
                                        <div class="form-inline">
                                            <div class="form-group col-4 my-2">
                                                <span class="text-uppercase form-text"><strong>Produto</strong></span>
                                            </div>
                                            <div class="form-group col-4 my-2">
                                                <span class="text-uppercase form-text"><strong>Total Em Estoque</strong></span>
                                            </div>
                                            <div class="form-group col-4 my-2">
                                                <span class="text-uppercase form-text"><strong>Quantidade</strong></span>
                                            </div>
                                        </div>

                                        <?php foreach($produtos as $produto) : ?>
                                            <?php $quantidadeProdutos++;?>
                                            <div class="form-inline border-top">
                                                <div class="form-group col-4 my-4">
                                                    <input class="form-check-input" type="checkbox" name="checkProduto<?=$produto['id']?>" value="<?=$produto['id']?>" >
                                                    <label class="form-check-label" for="<?=$produto['nome']?>"><?=$produto['nome']?></label>
                                                </div>

                                                <div class="form-group col-4 my-4">
                                                    <label for="<?=$produto['estoque']?>" class="control-label"><?=$produto['estoque']?></label>
                                                </div>

                                                <div class="form-group col-4">
                                                    <input class="form-control" type="number" name="quantidadeProduto<?=$produto['id']?>" placeholder="Informe a Quantidade">
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                
                                    <div class="form-group row">
                                        <div class="col-md-12 ">
                                            <p class="form-control-plaintext text-danger">* Campos Obrigatórios</p>
                                        </div>
                                    </div>

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