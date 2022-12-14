<?php
session_start();

if (isset($_COOKIE['nome']) && isset($_COOKIE['id'])) {
    $_SESSION['nome'] = $_COOKIE['nome'];
    $_SESSION['id'] = $_COOKIE['id'];
}

if (isset($_SESSION['nome']) && isset($_SESSION['id'])) {
    header('Location: painel.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/estilo.css">
    <link rel="shortcut icon" href="../../../img/logo.png" type="image/x-icon">
    <title>TecVagas | Login</title>
</head>

<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        background-color: #F8F9FA;
    }

    .form-signin {
        width: 100%;
        max-width: 380px;
        padding: 15px;
        margin: auto;
    }

    .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }

    p {
        font-size: 18px;
        text-align: center;
    }

    label {
        font-size: 25px;
        margin-bottom: -5px;
    }
</style>

<body>
    <div class="form-signin">
        <!-- Img Candidato -->
        <center><img class="mb-1" src="../../../img/logo.png" alt="Candidato" width="55%" height="55%"></center>
        <!-- Mensagem Erro -->
        <?php
        if (!empty($_SESSION['erro'])) {
            echo '<div class="alert alert-danger text-center" role="alert">
                    <b>ERRO:</b> '.$_SESSION['erro'].'
                </div>';
            $_SESSION['erro'] = '';
        }
        if (!empty($_SESSION['msg'])) {
            echo '<div class="alert alert-success text-center" role="alert">
                    '.$_SESSION['msg'].'
                </div>';
            $_SESSION['msg'] = '';
        }
        ?>
        <!-- Tela de Login -->
        <form method="POST" action="../controle/login.php">
            <!-- E-mail -->
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="txtEmail">E-mail</label>
                    <input type="email" class="form-control form-control-lg" id="txtEmail"
                        placeholder="Digite seu e-mail" autofocus name="email" required>
                </div>
            </div>
            <!-- Senha -->
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="txtSenha">Senha</label>
                    <input type="password" class="form-control form-control-lg" id="txtSenha"
                        placeholder="Digite sua senha" name="senha" required>
                </div>
            </div>
            <!-- Permanecer conectado -->
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="inputConectado" style="width: 18px;
                height: 18px;margin-top: 5px;" name="permanecerConectado">
                <label class="form-check-label pl-1" for="inputConectado" style="font-size: 20px;">
                    Permanecer conectado
                </label>
            </div>
            <!-- Entrar -->
            <button type="submit" class="botao botao-roxo btn-block mb-3">Entrar</button>
        </form>
        <a href="../../../index.php" class="botao botao-vermelho btn-block mb-3">Voltar</a>
        <a href="esquecisenha.php">
            <p>Esqueceu a senha?</p>
        </a>
        <p>N??o tem conta? <a href="cadastro.php">Cadastre-se</a></p>
    </div>
</body>

</html>