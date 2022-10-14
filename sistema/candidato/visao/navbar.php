<?php

if (isset($_COOKIE['nome']) && isset($_COOKIE['id'])) {
    $_SESSION['nome'] = $_COOKIE['nome'];
    $_SESSION['id'] = $_COOKIE['id'];
}
if (isset($_COOKIE['nomeEmpresa']) && isset($_COOKIE['idEmpresa'])) {
    $_SESSION['nomeEmpresa'] = $_COOKIE['nomeEmpresa'];
    $_SESSION['idEmpresa'] = $_COOKIE['idEmpresa'];
}

if (isset($_SESSION['idEmpresa']) && isset($_SESSION['nomeEmpresa'])) {
    echo '
    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand ml-3 pl-md-2" href="../../empresa/visao/painel.php">
            <img src="../../../img/logo.png" class="pr-md-2" width="75px" height="65px" alt="TecVagas Logo">
            TecVagas
        </a>
        <button class="navbar-toggler mr-3" data-toggle="collapse" data-target="#navbarNav"
            style="border-color: white;">
            <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse mr-md-2" id="navbarNav">
            <ul class="navbar-nav ml-auto" style="font-size: 23px;">
                <li class="nav-item dropdown px-md-4">
                    <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" data-toggle="dropdown">
                        <i class="fas fa-building pr-1"></i> '.$_SESSION['nomeEmpresa'].'
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="../../empresa/visao/painel.php" class="dropdown-item">
                            <i class="fas fa-home pr-1"></i> Página principal
                        </a>
                        <a href="../../empresa/visao/editarConta.php" class="dropdown-item">
                            <i class="fas fa-cog pr-1"></i> Editar conta
                        </a>
                        <a href="../../empresa/visao/alterarSenha.php" class="dropdown-item">
                            <i class="fas fa-key pr-1"></i> Alterar senha
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="../../empresa/visao/perfilEmpresa.php?id='.$_SESSION['idEmpresa'].'" class="dropdown-item">
                            <i class="fas fa-desktop pr-1"></i> Perfil da Empresa
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="../controle/logout.php" class="nav-link text-white">
                        <i class="fas fa-sign-out-alt pr-1"></i>Sair
                    </a>
                </li>
            </ul>
        </div>
    </nav>';
} else if (isset($_SESSION['id']) && isset($_SESSION['nome'])) {
    echo '
    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand ml-3 pl-md-2" href="../../candidato/visao/painel.php">
            <img src="../../../img/logo.png" class="pr-md-2" width="75px" height="65px" alt="TecVagas Logo">
            TecVagas
        </a>
        <button class="navbar-toggler mr-3" data-toggle="collapse" data-target="#navbarNav"
            style="border-color: white;">
            <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse mr-md-2" id="navbarNav">
            <ul class="navbar-nav ml-auto" style="font-size: 23px;">
                <li class="nav-item dropdown px-md-4">
                    <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" data-toggle="dropdown">
                        <i class="fas fa-user pr-1"></i> '.$_SESSION['nome'].'
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="../../candidato/visao/painel.php" class="dropdown-item">
                            <i class="fas fa-home pr-1"></i> Página principal
                        </a>
                        <a href="../../candidato/visao/editarConta.php" class="dropdown-item">
                            <i class="fas fa-cog pr-1"></i> Editar conta
                        </a>
                        <a href="../../candidato/visao/alterarSenha.php" class="dropdown-item">
                            <i class="fas fa-key pr-1"></i> Alterar senha
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="../../candidato/visao/curriculo.php" class="dropdown-item">
                            <i class="fas fa-file-alt pr-1"></i> Currículo
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="../../candidato/controle/logout.php" class="nav-link text-white">
                        <i class="fas fa-sign-out-alt pr-1"></i>Sair
                    </a>
                </li>
            </ul>
        </div>
    </nav>';
} else {
    echo '
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand pl-md-3 pr-md-2 text-white font-weight-bold" href="../../../index.php"
            style="font-size: 25px;"><img src="../../../img/logo.png" width="75px" height="65px" alt="TecVagas Logo"
                class="pr-md-2"> TecVagas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" href="../../../index.html"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação"
            style="border-color: white;color: white;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-row-reverse mr-md-3" id="navbarNav">
            <ul class="navbar-nav" style="font-size: 23px;">
                <li class="nav-item dropdown px-md-3">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Candidato
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../../candidato/visao/cadastro.php"
                            style="font-size: 20px;">Cadastre-se</a>
                        <a class="dropdown-item" href="../../candidato/visao/login.php"
                            style="font-size: 20px;">Login</a>
                    </div>
                </li>
                <li class="nav-item px-md-3">
                    <a href="../../../empresa.php" class="nav-link text-white">Empresas</a>
                </li>
            </ul>
        </div>
    </nav>';
}