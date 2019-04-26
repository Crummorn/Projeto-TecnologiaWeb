<?php 
    include ("../database/conecta.php"); 
    include ("../database/fornecedor-controller.php"); 

    $titulo = "Painel Administrativo - Fornecedores"; 
    $paginaAtual = "Fornecedor";    
    $header = "Fornecedores";
    
    include ("../fragments/funcoes-basicas.php"); 
    include ("../fragments/head.php");  
    include ("../fragments/navbar.php");  
    include ("../fragments/sidebar.php"); 
    
    $fornecedores = listaFornecedores($conexao);
    session_start();
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

                        <div class="col-md-2">
                            <h1>
                                <a class="btn btn-success" href="adiciona-form.php">
                                    <i class="fa fa-plus"></i>
                                    <span class="d-none d-md-inline d-lg-inline">
                                        Adicionar
                                    </span>
                                </a>
                            </h1>
                        </div>
                    </div>

                    <!-- Card Content -->
                    <div class="card mt-4">
                        <div class="card-header">Listagem de <?=$header?></div>

                        <div class="card-body">
                            <!-- Alertas-->
                            <?php include ("../fragments/alertas-genericos.php"); ?>

                            <div class="container-fluid">
                                <!-- Table List -->
                                <table class="table table-bordered table-hover mt-2">
                                    <thead>
                                        <tr>
                                            <th class="col-md-2 text-center">
                                                Codigo
                                            </th>
                                            <th class="col-md-3 text-center">
                                                CNPJ
                                            </th>
                                            <th class="col-md-4 text-center">
                                                Nome
                                            </th>
                                            <th class="col-md-3 text-center">Ações</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach($fornecedores as $fornecedor) : ?>
                                            <tr>
                                                <td scope="row" class="text-center">
                                                    <?= $fornecedor['id'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $fornecedor['cnpj'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $fornecedor['nome'] ?>
                                                </td>

                                                <td class="text-center form-inline">
                                                    <button type="button" class="btn btn-primary btn-xs mr-2" data-toggle="modal" data-target="#myModal<?=$fornecedor['id']?>">
                                                        <i class="fas fa-info-circle"></i>
                                                            <span class="d-none d-md-inline d-lg-inline">
                                                                Info
                                                            </span>
                                                    </button>
                                                    <a class="btn btn-primary btn-xs mr-2"
                                                        href="altera-form.php?id=<?=$fornecedor['id']?>">
                                                        <i class="fas fa-pencil-alt"></i>
                                                        <span class="d-none d-md-inline d-lg-inline">
                                                            Alterar
                                                        </span>
                                                    </a>
                                                    <form action="remover.php" method="post">
                                                        <input type="hidden" name="id" value="<?=$fornecedor['id']?>" />
                                                        <button class="btn btn-danger btn-xs">
                                                            <i class="fas fa-trash"></i>
                                                            <span class="d-none d-md-inline d-lg-inline">
                                                                Deletar
                                                            </span>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <?php include ("fragments/modal-info.php"); ?>                                        
                                        <?php endforeach ?>

                                        <?php if (empty($fornecedores)) : ?>
                                            <tr>
                                                <td colspan="7" class="text-center">Nenhum fornecedor encontrado</td>
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
<?php include '../fragments/footer.php' ?>