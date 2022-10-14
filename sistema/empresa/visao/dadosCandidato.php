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

    .bg-white p {
        font-size: 1.2em;
    }
</style>

<body class="fade-in">
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
                        <i class="fas fa-building pr-1"></i> <?php echo $_SESSION['nomeEmpresa']; ?>
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
                        <a href="perfilEmpresa.php?id=<?php echo $_SESSION['idEmpresa']; ?>" class="dropdown-item">
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
    </nav>
    <!-- Painel Administrativo -->
    <div class="container py-5">
        <!-- Dados do candidato -->
        <?php
        include_once('../../candidato/modelo/candidato.php');

        $candidato = new Candidato();
        $candidato->__set('idCandidato', $_GET['id']);

        if ($candidato->verCandidato()) {
            $resultado = $candidato->verCandidato();

            if ($resultado[0]['sexo'] == 'm') {
                $sexo = 'Masculino';
            } else if ($resultado[0]['sexo'] == 'f') {
                $sexo = 'Feminino';
            } else {
                $sexo = 'Não definido';
            }
            if (($resultado[0]['relacaoEtec'] == 'aluno')) {
                $relacao = 'Aluno';
            } else if ($resultado[0]['relacaoEtec'] == 'ex_aluno') {
                $relacao = 'Ex aluno';
            } else if ($resultado[0]['relacaoEtec'] == 'nenhuma') {
                $relacao = 'Nenhuma';
            } else {
                $relacao = 'Não definido';
            }
            if ($resultado[0]['curriculo'] == 'semCurriculo') {
                $curriculo = 'Não adicionado';
            } else {
                $curriculo = '<a href="../../candidato/curriculos/'.$resultado[0]['curriculo'].'" target="blank">Abrir</a>';
            }
            echo '
            <div class="bg-white rounded shadow-lg p-5">
                <h3>Dados do candidato <b>'.$resultado[0]['nome'].' '.$resultado[0]['sobrenome'].'</b></h3>
                <p><b>Nome:</b> '.$resultado[0]['nome'].' '.$resultado[0]['sobrenome'].'</p>
                <p><b>E-mail:</b> '.$resultado[0]['email'].'</p>
                <p><b>Telefone:</b> '.$resultado[0]['telefone'].'</p>
                <p><b>Cidade:</b> '.$resultado[0]['cidade'].'</p>
                <p><b>CEP:</b> '.$resultado[0]['cep'].'</p>
                <p><b>Sexo:</b> '.$sexo.'</p>
                <p><b>Relação com a Etec:</b> '.$relacao.'</p>
                <p><b>Currículo:</b> '.$curriculo.'</p>
                <br>
                <a href="painel.php" class="botao botao-roxo"><i class="fas fa-reply pr-1"></i> Voltar</a>
            </div>';
        } else {
            echo
            '<div class="alert alert-danger text-center shadow-sm" role="alert">
                <b>ERRO:</b> Candidato não encontrado.
            </div>';
        }
        ?>
    </div>

        <?php
        include_once('../../candidato/visao/footer.php');
        ?>
</body>

<script src="../../../js/jquery-3.3.1.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>

</html>