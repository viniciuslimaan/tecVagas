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
        font-weight: bold;
    }

    .table {
        font-size: 1.2em;
    }
</style>

<body class="bg-light">
    <!-- Navbar -->
    <?php include_once('../../admin/visao/navbar.php'); ?>
    <!-- Painel Administrativo -->
    <div class="container py-5">
        <!-- Empresas -->
        <div class="row mb-1">
            <div class="col-12 col-md-9">
                <h3>Empresas</h3>
            </div>
            <div class="col-12 col-md-3">
                <a href="adicionarEmpresa.php" class="botao botao-verde btn-block"><i class="fas fa-plus"></i> Adicionar</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Parceira</th>
                    <th scope="col">Funções</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once('../controle/listarEmpresa.php');
                ?>
            </tbody>
        </table>
        <?php
        if (!empty($_SESSION['erro'])) {
            echo '<p class="text-center pt-3">'.$_SESSION['erro'].'</p>';
            $_SESSION['erro'] = '';
        }
        ?>
    </div>
</body>

<script src="../../../js/jquery-3.3.1.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>

</html>