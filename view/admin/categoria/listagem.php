<?php 
    include ("../database/conecta.php"); 
    include ("../database/categoria-controller.php");
    
    $titulo = "Painel Administrativo - Categorias"; 
    $paginaAtual = "Categoria";
    $header = "Categorias";
    
    include ("../fragments/funcoes-basicas.php"); 
    include ("../fragments/head.php");  
    include ("../fragments/navbar.php");  
    include ("../fragments/sidebar.php"); 
    
    $categorias = listaCategorias($conexao);
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
                                            <th class="col-md-1 text-center">
                                                Codigo 
                                            </th>
                                            <th class="col-md-9 text-center">
                                                Nome 
                                            </th>
                                            <th class="col-md-2 text-center">Ações</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach($categorias as $categoria) : ?>
                                            <tr>
                                                <td scope="row" class="text-center" >
                                                    <?= $categoria['id'] ?>
                                                </td>

                                                <td class="text-center" >
                                                    <?= $categoria['nome'] ?>
                                                </td>  

                                                <td class="text-center form-inline">
                                                    <a class="btn btn-primary btn-sm mr-2" href="altera-form.php?id=<?=$categoria['id']?>">
                                                        <i class="fas fa-pencil-alt"></i>    
                                                        <span class="d-none d-md-inline d-lg-inline">
                                                            Alterar 
                                                        </span>
                                                    </a>
                                                    <form action="remover.php" method="post">
                                                        <input type="hidden" name="id" value="<?=$categoria['id']?>" />
                                                        <button class="btn btn-danger btn-sm js-delete-button">
                                                            <i class="fas fa-trash"></i> 
                                                            <span class="d-none d-md-inline d-lg-inline">
                                                                Deletar
                                                            </span>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        <?php if (empty($categorias)) : ?>
                                            <tr>
                                                <td colspan="7" class="text-center">Nenhuma categoria encontrada</td>
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