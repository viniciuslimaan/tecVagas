<?php
session_start();

if (isset($_COOKIE['nome']) && isset($_COOKIE['id'])) {
    $_SESSION['nome'] = $_COOKIE['nome'];
    $_SESSION['id'] = $_COOKIE['id'];
}

if (isset($_SESSION['nome']) && isset($_SESSION['id'])) {
    header('Location: sistema/candidato/visao/painel.php');
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
    <title>TecVagas</title>
</head>

<style>
    .banner {
        background: url('img/fundobanner-min.png') repeat no-repeat center center;
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

    .fundoLogarCadastrar {
        background-image: linear-gradient(to right, #565C9E, #8E93CC, #B3CEE2);
        font-size: 20px;
        color: white;
    }

    .txtEmpresasParceiras {
        text-align: center;
        padding-top: 10px;
        font-size: 15px;
    }
    .txtEmpresasParceiras a {
        color: #565C9E;
        font-weight: bold;
    }
</style>

<body class="fadeIn">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light w-100 fixed-top"
        style="background: transparent; font-size: 20px;transition: all .5s;">
        <a class="navbar-brand pl-md-3 pr-md-2 text-white font-weight-bold" href="index.php"
            style="font-size: 25px;"><img src="img/logo.png" width="75px" height="65px" alt="TecVagas Logo"
                class="pr-md-2"> TecVagas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" href="index.html"
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
                        <a class="dropdown-item scrollSuave" href="#vagas" style="font-size: 20px;">Vagas</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="sistema/candidato/visao/cadastro.php"
                            style="font-size: 20px;">Cadastre-se</a>
                        <a class="dropdown-item" href="sistema/candidato/visao/login.php"
                            style="font-size: 20px;">Login</a>
                    </div>
                </li>
                <li class="nav-item px-md-3">
                    <a href="empresa.php" class="nav-link text-white">Empresas</a>
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
                    <b>estágio</b>, totalmente gratuito em Lins e Região!</h3>
            </div>
        </div>
    </div>
    <!-- Descrição -->
    <div class="container-fluid pb-4 pt-3">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 col-md-4">
                    <img class="img-fluid" src="img/InicioSeCadastrar.png" alt="" width="120" height="120">
                    <h3 class="pt-3 font-weight-bold">Crie sua conta</h3>
                    <p style="font-size: 20px;">Crie sua conta clicando em 'Candidato -> Cadastre-se'</p>
                </div>
                <div class="col-12 col-md-4">
                    <img class="img-fluid" src="img/InicioAcharVaga.png" alt="" width="120" height="120">
                    <h3 class="pt-3 font-weight-bold">Procure o emprego</h3>
                    <p style="font-size: 20px;">As vagas anunciadas estão todas abaixo</p>
                </div>
                <div class="col-12 col-md-4">
                    <img class="img-fluid" src="img/InicioEnviarCurriculo.png" alt="" width="120" height="120">
                    <h3 class="pt-3 font-weight-bold">Envie o currículo</h3>
                    <p style="font-size: 20px;">Envie clicando em 'Candidatar-se' na página da vaga</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Empresas Parceiras -->
    <div class="bg-light">
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
            <p class="txtEmpresasParceiras">Veja todas empresas parceiras <a href="empresa.php#empresasParceiras">clicando aqui</a>!</p>
        </div>
    </div>
    <!-- Crie conta já -->
    <div class="container-fluid fundoLogarCadastrar">
        <!-- Computador -->
        <div class="container py-5">
            <div class="col-md-12">
                <h2 class="text-center" style="margin-bottom: -3px;color: #F8F9FA;">Cadastre seu currículo!</h2>
                <p class="text-center" style="font-size: 28px;">Não perca tempo, crie sua conta ou logue agora
                    mesmo.</p>
                <!-- Computador -->
                <div class="text-center d-none d-sm-block pt-1">
                    <a href="sistema/candidato/visao/cadastro.php" class="botao botao-roxo botao-grande"
                        style="font-size: 20px;">Cadastrar</a>
                    <a href="sistema/candidato/visao/login.php" class="botao botao-roxo botao-grande"
                        style="font-size: 20px;">Entrar</a>
                </div>
                <!-- Celular -->
                <div class="text-center d-sm-none d-md-none d-lg-none pt-1">
                    <a href="sistema/candidato/visao/cadastro.php" class="botao botao-roxo botao-grande"
                        style="font-size: 20px;">Cadastrar</a>
                    <p class="my-3">ou</p>
                    <a href="sistema/candidato/visao/login.php" class="botao botao-roxo botao-grande"
                        style="font-size: 20px;">Entrar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Vagas -->
    <a id="vagas" style="float:left; margin-top: -4%;"></a>
    <div class="container-fluid bg-light">
        <div class="container py-5">
            <!-- Título Vagas -->
            <h2 class="text-center" style="font-size: 50px;color: #565C9E;">
                <b>Vagas de Emprego e Estágio</b>
            </h2>
            <!-- Barra de Pesquisa -->
            <!-- <div class="input-group input-group-lg mb-4">
                <input type="text" class="form-control" placeholder="Pesquise aqui a vaga desejada"
                    aria-describedby="button-addon2" id="buscarVaga">
                <div class="input-group-append">
                    <button class="btn btn-outline-info" type="button" id="button-addon2"><i
                            class="fas fa-search"></i></button>
                </div>
            </div> -->
            <!-- Parte das Vagas -->
            <div class="col-12">
                <?php
                $arquivo = basename(__FILE__);

                include_once('sistema/vaga/controle/mostrarVagas.php');
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
    var $doc = $('html, body');
    $('.scrollSuave').click(function () {
        $doc.animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
        return false;
    });
</script>

</html>