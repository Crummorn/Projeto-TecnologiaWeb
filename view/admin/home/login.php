<?php $title = "Login Administrativo" ?>

<?php require_once ("../fragments/head.php"); ?>
    
<!-- Content -->
<section class="cover">
    <div class="cover-caption">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row">
                <form action="index.php" method="POST">
                    <img src="../../../assets/images/facape_logo.png" class="img-fluid mb-4" alt="">

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="usario" placeholder="Insira seu email...">
                    </div>

                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" class="form-control" id="password" placeholder="Insira sua senha...">
                    </div>

                    <button type="submit" class="btn btn-primary form-control">Login</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once '../fragments/footer.php' ?>
