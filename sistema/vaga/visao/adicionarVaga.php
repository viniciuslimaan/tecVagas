<?php
require_once('../../empresa/controle/conectado.php');
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

<body class="bg-light">
    <!-- Navbar -->
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
                        <i class="fas fa-building pr-1"></i> <?php echo $_SESSION['nomeEmpresa']; ?>
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
                        <a href="../../empresa/visao/perfilEmpresa.php?id=<?php echo $_SESSION['idEmpresa']; ?>" class="dropdown-item">
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
        <!-- Mensagem de erro -->
        <?php
        if (!empty($_SESSION['erro'])) {
            echo
            '<div class="alert alert-danger text-center shadow-sm" role="alert">
                <b>ERRO:</b> '.$_SESSION['erro'].'
            </div>';
            $_SESSION['erro'] = '';
        }
        ?>
        <!-- Dados do Empresa -->
        <div class="bg-white rounded shadow-lg p-5">
            <h3>Cadastrar uma nova vaga</h3>
            <form action="../controle/adicionarVaga.php" method="post">
                <div class="form-row">
                    <div class="form-group col-12 col-md-12">
                        <label for="txtTitulo">Título</label>
                        <input id="txtTitulo" class="form-control" type="text" name="titulo" 
                        placeholder="Ex: Técnico em Tecnologia da Informação" maxlength="50" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-6">
                        <label for="txtContrato">Tipo de Contrato</label>
                        <input id="txtContrato" class="form-control" type="text" name="tipoContrato" 
                        maxlength="30" placeholder="Ex: Efetivo" required>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="txtJornada">Jornada</label>
                        <input id="txtJornada" class="form-control" type="text" name="jornada" 
                        maxlength="50" placeholder="Ex: 5 Horas / Dia" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-12">
                        <label for="txtRequisitos">Pré-Requisitos</label>
                        <textarea rows="4" class="form-control" id="txtRequisitos"
                        maxlength="500" name="preRequisitos" required
                        placeholder="Ex: 
Cursando ou concluído Técnico em Informática na Etec de Lins;
Sexo Masculino;
Residir em Lins."></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-12">
                        <label for="txtDescricao">Descrição</label>
                        <textarea rows="4" class="form-control" id="txtDescricao"
                        maxlength="500" name="descricao" required
                        placeholder="Aqui, você vai descrever as ações que o candidato realizará, se contratado."></textarea>
                    </div>
                </div>
                <input type="hidden" value="<?php echo $_SESSION['idEmpresa'] ?>" name="idEmpresa">
                <div class="text-center">
                    <a href="../../empresa/visao/painel.php" class="botao botao-vermelho botao-grande"><i
                            class="fas fa-times pr-1"></i>
                        Cancelar</a>
                    <button type="submit" class="botao botao-verde mt-3 mt-md-0"><i class="fas fa-check pr-1"></i>
                        Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    include_once('../../candidato/visao/footer.php');
    ?>
</body>

<script src="../../../js/jquery-3.3.1.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>

</html>