<?php
require_once('../controle/conectado.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/estilo.css">
    <link rel="stylesheet" href="../../../css/painel.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="shortcut icon" href="../../../img/logo.png" type="image/x-icon">
    <title>TecVagas | Painel Administrativo</title>
</head>

<body class="bg-light">
    <!-- Navbar -->
    <?php include_once('navbar.php'); ?>
    <!-- Painel Administrativo -->
    <div class="container py-3">
        <!-- Painel -->
        <div id="painel" class="py-3">
            <h3 style="font-size: 40px;margin-bottom: -10px;">Painel Administrativo</h3>
            <hr>
            <div class="row">
                <div class="col-12 col-md-4 mb-1">
                    <a class="botao botao-roxo btn-block" href="../../candidato/visao/listarCandidato.php">
                        <i class="fas fa-users pt-4 pb-3" style="font-size: 50px;"></i>
                        <p style="font-size: 30px;">Candidatos</p>
                    </a>
                </div>
                <div class="col-12 col-md-4 mb-1">
                    <a class="botao botao-roxo btn-block" href="../../empresa/visao/listarEmpresa.php">
                        <i class="fas fa-building pt-4 pb-3" style="font-size: 50px;"></i>
                        <p style="font-size: 30px;">Empresas</p>
                    </a>
                </div>
                <div class="col-12 col-md-4 mb-1">
                    <a class="botao botao-roxo btn-block" href="../../vaga/visao/listarVaga.php">
                        <i class="fas fa-briefcase pt-4 pb-3" style="font-size: 50px;"></i>
                        <p style="font-size: 30px;">Vagas</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="../../../js/jquery-3.3.1.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>

</html>