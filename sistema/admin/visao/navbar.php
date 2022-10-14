<nav class="navbar navbar-expand-md">
    <div class="container">
        <a class="navbar-brand ml-3 ml-md-0" href="../../admin/visao/painel.php">
            <img src="../../../img/logo.png" class="pr-md-2" width="75px" height="65px" alt="TecVagas Logo">
            TecVagas
        </a>
        <button class="navbar-toggler mr-3 mr-md-0" data-toggle="collapse" data-target="#navbarNav"
            style="border-color: white;">
            <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto" style="font-size: 23px;">
                <li class="nav-item dropdown px-md-4">
                    <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" data-toggle="dropdown">
                        <i class="fas fa-user pr-1"></i> <?php echo $_SESSION['loginAdmin']; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../../candidato/visao/listarCandidato.php">
                            <i class="fas fa-users pr-1"></i> Candidatos
                        </a>
                        <a class="dropdown-item" href="../../empresa/visao/listarEmpresa.php">
                            <i class="fas fa-building pr-1"></i> Empresas
                        </a>
                        <a class="dropdown-item" href="../../vaga/visao/listarVaga.php">
                            <i class="fas fa-briefcase pr-1"></i> Vagas
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../admin/visao/editarConta.php">
                            <i class="fas fa-cog pr-1"></i> Editar conta
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="../../admin/controle/logout.php" class="nav-link text-white">
                        <i class="fas fa-sign-out-alt pr-1"></i>Sair
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>