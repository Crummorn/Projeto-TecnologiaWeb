<?php 
    session_start();
    
    require_once ("../Database/LoginController.php"); 
    verificaUsuario();

    require_once ("../Database/PermissaoController.php"); 
    
    $titulo = "Painel Administrativo - Permissões"; 
    $paginaAtual = "Permissao";    
    $header = "Permissões";
    
    require_once ("../Fragments/Funcoes-Basicas.php"); 
    require_once ("../Fragments/Head.php");  
    require_once ("../Fragments/Navbar.php");  
    require_once ("../Fragments/Sidebar.php"); 
    
    $permissoes = listaPermissoes();
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
                        <div class="col-md-12">
                            <h1>Listagem de <?=$header?></h1>
                        </div>
                    </div>

                    <!-- Card Content -->
                    <div class="card mt-4 mb-4">
                        <div class="card-header">Listagem de <?=$header?></div>

                        <div class="card-body">
                            <div class="container-fluid">
                                <!-- Table List -->
                                <table class="table table-bordered table-hover mt-2">
                                    <thead>
                                        <tr>
                                            <th class="col-md-2 text-center">
                                                Codigo
                                            </th>
                                            <th class="col-md-4 text-center">
                                                Nome
                                            </th>
                                            <th class="col-md-6 text-center">
                                                Descricao
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach($permissoes as $permissao) : ?>
                                            <tr>
                                                <td scope="row" class="text-center">
                                                    <?= $permissao['id'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $permissao['nome'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $permissao['descricao'] ?>
                                                </td>
                                            </tr>                                       
                                        <?php endforeach ?>
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
<?php require_once '../Fragments/Footer.php' ?>