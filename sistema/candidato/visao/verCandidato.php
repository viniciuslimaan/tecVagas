<?php
require_once('../../admin/controle/conectado.php');
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

<style>
    h3 {
        font-size: 2.5em;
        text-align: center;
    }

    p {
        font-size: 1.2em;
    }
</style>

<body class="bg-light">
    <!-- Navbar -->
    <?php include_once('../../admin/visao/navbar.php'); ?>
    <!-- Painel Administrativo -->
    <div class="container py-5">
        <!-- Dados do candidato -->
        <?php
        if (!empty($_SESSION['erro'])) {
            echo
            '<div class="alert alert-danger text-center shadow-sm" role="alert">
                <b>ERRO:</b> '.$_SESSION['erro'].'
            </div>';
            $_SESSION['erro'] = '';
        }
        
        include_once('../controle/verCandidato.php');
        ?>
    </div>
</body>

<script src="../../../js/jquery-3.3.1.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>

</html>