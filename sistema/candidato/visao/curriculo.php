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
    <title>TecVagas</title>
</head>

<style>
    .navbar {
        background: #565C9E;
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15)
    }

    .navbar-brand {
        color: white;
        font-weight: bold;
        font-size: 25px;
    }

    .navbar-brand:hover {
        color: white;
    }

    h3 {
        font-size: 2.5em;
        text-align: center;
    }

    label {
        font-size: 1.2em;
        margin-bottom: -5px;
    }
</style>

<body class="fadeIn">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md">
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
    <div class="container py-5">
        <?php 
        if (!empty($_SESSION['erro'])) {
            echo '<div class="alert alert-danger text-center" role="alert">
                    <b>ERRO:</b> '.$_SESSION['erro'].'
                </div>';
            $_SESSION['erro'] = '';
        }
        ?> 
        <div class="bg-white rounded shadow-lg p-5" style="margin: 10vh 0;">
            <?php include_once('../controle/verificarCurriculo.php');

            if (isset($curriculo)) {
                echo '<h3>Trocar currículo</h3>';
                echo '<p>Currículo atual: <a href="../curriculos/'.$curriculo.'" target="blank">Abrir</a></p>';
            } else {
                echo '<h3>Adicionar currículo</h3>';
            }
            ?>
            <form action="../controle/curriculo.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="curriculo" required>
                        <label class="custom-file-label" for="customFile" style="font-size: 18px;">Anexar seu curriculo</label>
                    </div>
                    <?php
                    if (isset($curriculo)) {
                        echo '<input type="hidden" name="curriculoVelho" value="'.$curriculo.'">';
                    } else {
                        echo '<input type="hidden" name="curriculoVelho" value="semCurriculo">';
                    }
                    ?>
                </div>
                <p class="pt-1 text-danger">*Extensões permitidas: jpg, jpeg, png e pdf.</p>
                <br>
                <div class="text-center">
                    <a href="painel.php" class="botao botao-vermelho botao-grande mr-md-1">
                        <i class="fas fa-times pr-1"></i> Cancelar
                    </a>
                    <button class="botao botao-verde mt-3 mt-md-0" type="submit">
                        <i class="fas fa-check pr-1"></i> Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <?php include_once('footer.php'); ?>
</body>

<script src="../../../js/jquery-3.3.1.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>
<script>
    $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

</html>