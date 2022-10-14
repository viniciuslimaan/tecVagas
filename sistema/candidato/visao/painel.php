<?php
include_once('../controle/conectado.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/estilo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="shortcut icon" href="../../../img/logo.png" type="image/x-icon">
    <title>TecVagas | Painel do Candidato</title>
</head>

<style>
    .navbar-brand {
        color: white;
        font-weight: bold;
        font-size: 25px;
    }

    .navbar-brand:hover {
        color: white;
    }

    .banner {
        background: url('../../../img/fundobanner-min.png') repeat no-repeat center center;
        background-size: cover;
        height: 100vh;
        width: 100%;
        margin-bottom: 0px;
    }

    .textobanner {
        margin-top: 30vh;
        font-size: 8vh;
        font-weight: bold;
        color: white;
    }
</style>

<body class="fadeIn">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md fixed-top">
        <a class="navbar-brand ml-3 pl-md-2" href="painel.php">
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
                        <i class="fas fa-user pr-1"></i> <?php echo $_SESSION['nome']; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="painel.php" class="dropdown-item">
                            <i class="fas fa-home pr-1"></i> Página principal
                        </a>
                        <a href="editarConta.php" class="dropdown-item">
                            <i class="fas fa-cog pr-1"></i> Editar conta
                        </a>
                        <a href="alterarSenha.php" class="dropdown-item">
                            <i class="fas fa-key pr-1"></i> Alterar senha
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="curriculo.php" class="dropdown-item">
                            <i class="fas fa-file-alt pr-1"></i> Currículo
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
    </nav>
    <!-- Banner -->
    <div class="jumbotron jumbotron-fluid banner">
        <div class="container">
            <div class="col-12 col-md-12 text-center">
                <h1 class="textobanner">TecVagas</h1>
                <h3 class="text-white" style="font-size: 4vh;margin-top: -10px;">Site de busca de <b>emprego</b> e
                    <b>estágio</b>,
                    totalmente gratuito em Lins e Região!</h3>
            </div>
        </div>
    </div>
    <!-- Logado -->
    <div class="container pt-3 pb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-center">
                <img src="../../../img/logo.png" alt="Bem-vindo candidato" width="120" height="120">
                <h3 class="pt-3 font-weight-bold">Seja bem-vindo(a), <?php echo $_SESSION['nome'] ?>!</h3>
                <p style="font-size: 20px;">Estamos felizes por tê-lo aqui :)<br>Veja todas as vagas de emprego
                    abaixo.</p>
            </div>
        </div>
    </div>
    <!-- Vagas -->
    <div class="container-fluid bg-light">
        <!-- Vagas Postadas -->
        <h2 class="text-center pt-5" style="font-size: 50px;color: #565C9E;">
            Vagas candidatadas
        </h2>
        <table class="container table rounded shadow-sm pb-3">
            <!-- <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Função</th>
                </tr>
            </thead> -->
            <tbody>
                <?php
                include_once('../controle/listarVagasCandidatadas.php');
                ?>
            </tbody>
        </table>
        <div class="container py-5">
            <!-- Título Vagas -->
            <h2 class="text-center" style="font-size: 50px;color: #565C9E;"><b>Vagas de Emprego e Estágio</b>
            </h2>
            <!-- Barra de Pesquisa -->
            <!-- <div class="input-group input-group-lg mb-4">
                <input type="text" class="form-control" placeholder="Pesquise aqui a vaga desejada"
                    aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-info" type="button" id="button-addon2"><i
                            class="fas fa-search"></i></button>
                </div>
            </div> -->
            <!-- Parte das Vagas -->
            <div class="col-12">
                <?php
                $arquivo = basename(__FILE__);

                include_once('../../vaga/controle/mostrarVagas.php');
                ?>
            </div>
        </div>
    </div>
    <!-- Empresas Parceiras -->
    <div class="container-fluid">
        <h2 class="text-center pt-5" style="font-size: 50px;color: #565C9E;">Empresas
            parceiras
        </h2>
        <div class="container pt-5 pb-5">
            <div class="row text-center">
                <!-- Logo Empresas -->
                <?php
                $arquivo = basename(__FILE__);

                include_once('../../empresa/controle/listarParceiras.php');
                ?>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include_once('footer.php'); ?>
</body>

<script src="../../../js/jquery-3.3.1.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>
<script type="text/javascript">
    jQuery(function () {
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 50) {
                $(".navbar").css('background-color', '#565C9E');
                $(".navbar").css('box-shadow', '0 .5rem 1rem rgba(0,0,0,.15)');
                $(".navbar").css('transition', '.5s');
            } else {
                $(".navbar").css('background-color', 'transparent');
                $(".navbar").css('box-shadow', 'none');
            }
        });
    });
</script>

</html>