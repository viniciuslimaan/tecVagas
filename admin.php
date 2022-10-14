<?php
session_start();
if (isset($_SESSION['conectado'])){
    header('Location: sistema/admin/visao/painel.php');
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
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>TecVagas | Admin</title>
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
</style>

<body>
    <div class= "form-signin">
        <!-- Img admin -->
        <center><img class="mb-3" src="img/admin.png" alt="Candidato" width="55%" height="55%"></center>
        <!-- Mensagem Erro -->
        <?php
        if (!empty($_SESSION['erro'])) {
            echo '<div class="alert alert-danger text-center" role="alert">
                    <b>ERRO:</b> '.$_SESSION['erro'].'
                </div>';
            $_SESSION['erro'] = '';
        }
        ?>
        <form action="sistema/admin/controle/login.php" method="POST">
            <!-- Login -->
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="txtEmail" style="font-size: 25px;margin-bottom: -5px;">Login</label>
                    <input type="text" class="form-control form-control-lg" id="txtEmail"
                        placeholder="Digite seu login de acesso" name="login" required autofocus>
                </div>
            </div>
            <!-- Senha -->
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="txtSenha" style="font-size: 25px;margin-bottom: -5px;">Senha</label>
                    <input type="password" class="form-control form-control-lg" id="txtSenha"
                        placeholder="Digite sua senha" name="senha" required>
                </div>
            </div>
            <!-- Permanecer Conectado -->
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="permanecerConectadoAdmin" style="width: 18px;
                height: 18px;margin-top: 5px;" name="permanecerConectado">
                <label class="form-check-label pl-1" for="permanecerConectadoAdmin" style="font-size: 20px;">Permanecer
                    conectado</label>
            </div>
            <!-- Entrar -->
            <button type="submit" class="botao botao-roxo btn-lg btn-block mb-3" style="font-size: 20px;">Entrar</button>
        </form>
        <!-- Cancelar -->
        <a href="index.php" class="botao botao-vermelho btn-lg btn-block" style="font-size: 20px;">Cancelar</a>
    </div>
</body>

</html>