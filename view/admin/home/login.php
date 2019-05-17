<?php 
    session_start();

    require_once ("../database/LoginController.php"); 
    verificaUsuarioLogin(); 

    $titulo = "Login Administrativo";
    require_once ("../fragments/head.php");

?>
    
<!-- Content -->
<section class="cover">
    <div class="cover-caption">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row">
                <form action="controller/LoginUsuario.php" method="POST">
                    <img src="../../../assets/images/facape_logo.png" class="img-fluid mb-4" alt="Logo-FACAPE">

                    <!-- Alertas-->
                    <?php include ("../fragments/alertas-genericos.php"); ?>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Insira seu email...">
                    </div>

                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" class="form-control" name="senha" placeholder="Insira sua senha...">
                    </div>

                    <button type="submit" class="btn btn-primary form-control">Login</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once '../fragments/footer.php' ?>
