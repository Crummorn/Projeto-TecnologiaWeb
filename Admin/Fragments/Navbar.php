<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="../home/index.php" >Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto  pull-right">
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Olá <?= usuarioLogado() ?><span class="sr-only">(current)</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../Usuario/Altera-Dados-Form.php">Alterar Dados</a>
                    <a class="dropdown-item" href="../Usuario/Altera-Senha-Form.php">Alterar Senha</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Home/Controller/LogoutUsuario.php">
                    Loggout
                    <i class="fas fa-sign-out-alt ml-2"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>