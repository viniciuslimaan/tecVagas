<?php
session_start();
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
    <title>TecVagas</title>
</head>

<style>
    .navbar {
        background-color: #565C9E;
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15);
    }

    .navbar-brand {
        color: white;
        font-weight: bold;
        font-size: 25px;
    }

    .navbar-brand:hover {
        color: white;
    }

    .banner {
        display: -ms-flexbox !important;
        display: flex !important;
        -ms-flex-align: end !important;
        align-items: flex-end !important;
        background-image: linear-gradient(to top right, #565C9E, #8E93CC, #B3CEE2);
        height: 300px;
    }

    .mini-banners {
        background: white;
        text-align: center;
        padding: 25px 0;
        color: #565C9E;
    }

    h3 {
        font-size: 2em;
        color: #212529;
        font-weight: bold;
    }

    p.texto {
        font-size: 1.3em;
        padding: 0;
    }
</style>

<body class="bg-light">
    <!-- Navbar -->
    <?php
    include_once('../../candidato/visao/navbar.php');
    ?>
    <!-- Conteúdo -->
    <div class="container py-5">
        <?php
        include_once('../controle/perfilEmpresa.php');

        if (!empty($_SESSION['erro'])) {
            echo '<div class="alert alert-danger text-center" role="alert" style="margin-bottom: 20vw;">
                    <b>ERRO:</b> '.$_SESSION['erro'].'
                </div>';
            $_SESSION['erro'] = '';
        }
        ?>
    </div>
    <!-- Footer -->
    <?php
    include_once('../../candidato/visao/footer.php');
    ?>
</body>

<script src="../../../js/jquery-3.3.1.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>

</html>