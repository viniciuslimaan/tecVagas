<?php
session_start();

if (isset($_COOKIE['nomeEmpresa']) && isset($_COOKIE['idEmpresa'])) {
    $_SESSION['nomeEmpresa'] = $_COOKIE['nomeEmpresa'];
    $_SESSION['idEmpresa'] = $_COOKIE['idEmpresa'];
}

if (isset($_SESSION['nomeEmpresa']) && isset($_SESSION['idEmpresa'])) {
    header('Location: sistema/empresa/visao/painel.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>TecVagas | Empresas</title>
</head>

<style>
    .banner {
        background: url('img/fundobannerempresas-min.png') repeat no-repeat center center;
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

    .fundoEmpresaParceira {
        background-image: linear-gradient(to right, #565C9E, #8E93CC, #B3CEE2);
        font-size: 20px;
        color: white;
    }
</style>

<body class="fadeIn">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light w-100 fixed-top"
        style="background: transparent; font-size: 20px;transition: all .5s;">
        <a class="navbar-brand pl-md-3 pr-md-2 text-white font-weight-bold" href="index.php"
            style="font-size: 25px;"><img src="img/logo.png" width="75px" height="65px" alt="TecVagas Logo"
                class="pr-md-2"> TecVagas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" href="index.php"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação"
            style="border-color: white;color: white;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-row-reverse mr-md-3" id="navbarNav">
            <ul class="navbar-nav" style="font-size: 23px;">
                <li class="nav-item px-md-3">
                    <a href="sistema/empresa/visao/login.php" class="nav-link text-white">Entrar</a>
                </li>
                <li class="nav-item px-md-3">
                    <a href="sistema/empresa/visao/cadastro.php" class="nav-link text-white">Cadastrar empresa</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Banner -->
    <div class="jumbotron jumbotron-fluid banner">
        <div class="container">
            <div class="col-12 col-md-12 text-center">
                <h1 class="text-white textobanner font-weight-bold" style="font-size: 8vh;">TecVagas</h1>
                <h3 class="text-white" style="font-size: 4vh;">Crie uma conta e anuncie as vagas da sua empresa!</h3>
            </div>
        </div>
    </div>
    <!-- Motivos -->
    <div class="container-fluid pb-3 pt-3">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 col-md-4">
                    <img class="img-fluid" src="img/empresa_gratis.png" alt="" width="120" height="120">
                    <h3 class="pt-3 font-weight-bold">Grátis</h3>
                    <p style="font-size: 20px;">Anuncie sua vaga totalmente grátis.</p>
                </div>
                <div class="col-12 col-md-4">
                    <img class="img-fluid" src="img/empresa_facilerapido.png" alt="" width="120" height="120">
                    <h3 class="pt-3 font-weight-bold">Fácil e Rápido</h3>
                    <p style="font-size: 20px;">Basta ter uma conta para poder anunciar.</p>
                </div>
                <div class="col-12 col-md-4">
                    <img class="img-fluid" src="img/empresa_pratico.png" alt="" width="120" height="120">
                    <h3 class="pt-3 font-weight-bold">Prático</h3>
                    <p style="font-size: 20px;">Avisamos por e-mail quando alguém se interessa por sua vaga.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Seja Parceiro -->
    <div class="container-fluid fundoEmpresaParceira" id="empresasParceiras">
        <div class="container py-5">
            <div class="col-12 offset-md-1 col-md-10 text-center">
                <h2 class="text-center" style="color: #F8F9FA;"><b>Seja uma empresa parceira!</b></h2>
                <p class="text-center" style="font-size: 28px;">É muito fácil! Basta anunciar 3 ou mais vagas, e
                    automaticamente se tornará uma empresa parceira.</p>
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

                include_once('sistema/empresa/controle/listarParceiras.php');
                ?>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="container-fluid" style="background: #7F88EB; color: white;">
        <div class="container text-center text-md-left">
            <div class="row">
                <!-- Créditos -->
                <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">
                    <h5 class="font-weight-bold text-uppercase mb-4">Descrição</h5>
                    <p>Esse site foi feito para alunos e ex alunos da Etec de Lins, com intuito de anunciar vagas
                        para os mesmos.</p>
                    <p>Site planejado e desenvolvido pelos alunos: Vinícius Lima e Jônatas Eduardo.
                    </p>
                </div>
                <hr class="clearfix w-100 d-md-none d-lg-none">
                <!-- Outro -->
                <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">
                    <h5 class="font-weight-bold text-uppercase mb-4">Legislação</h5>
                    <ul class="list-unstyled">
                        <li>
                            <p>
                                <a href="arquivos/leiDoEstagio.pdf" target="_blank" class="text-white"><u>Lei do
                                        Estágio</u></a>
                            </p>
                        </li>
                        <li>
                            <p>
                                <a href="arquivos/manualDoAprendiz.pdf" target="_blank" class="text-white"><u>Manual da
                                        Aprendizagem</u></a>
                            </p>
                        </li>
                    </ul>
                </div>
                <hr class="clearfix w-100 d-md-none d-lg-none">
                <!-- Contato -->
                <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">
                    <h5 class="font-weight-bold text-uppercase mb-4">Contato</h5>
                    <p class="text-white"><i class="fas fa-home mr-3"></i> R. São Pedro, 300 - Vl. Perin</p>
                    <p class="text-white"><i class="fas fa-envelope mr-3"></i> contato.tecvagas@gmail.com</p>
                    <p class="text-white"><i class="fas fa-phone mr-3"></i> (14) 3523-1217</p>
                    <p class="text-white"><i class="fas fa-phone mr-3"></i> (14) 3523-4859</p>
                </div>
                <!-- Apoio Etec -->
                <hr class="clearfix w-100 d-md-none d-lg-none">
                <div class="col-8 col-md-2 col-lg-2 mx-auto my-4">
                    <h5 class="font-weight-bold text-uppercase mb-4">Apoio</h5>
                    <a href="http://www.eteclins.com.br/" target="blank"><img src="img/logoetec.PNG" alt="Etec de Lins"
                            style="width: 100%;max-width: 160px;max-height: 90px;"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright -->
    <div class="text-center py-3" style="background: #565C9E; color: white;font-size: 20px;">TecVagas - <?php echo date('Y') ?> © Todos
        os
        direitos reservados.
    </div>
</body>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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