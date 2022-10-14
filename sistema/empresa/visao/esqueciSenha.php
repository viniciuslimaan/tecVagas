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
    <title>TecVagas | Mudar minha senha</title>
</head>

<style>
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
    <div class="container py-5" style="margin-top: 3%;">
        <!-- Img Esqueci Senha -->
        <center><img class="mb-1" src="../../../img/recuperarsenha.png" alt="Candidato" width="15%" height="15%">
        </center>
        <!-- Texto -->
        <h3 class="text-center font-weight-bold">Recuperação de Conta</h3>
        <p style="font-size: 23px;" class="text-center">Precisamos de seu e-mail para recuperar sua conta, informe-o no
            campo abaixo.<br>Após clicar em <b>Enviar</b>, enviaremos uma nova senha.</p>
        <!-- Mensagem Erro -->
        <?php
        if (!empty($_SESSION['erro'])) {
            echo
            '<div class="alert alert-danger text-center shadow-sm" role="alert">
                <b>ERRO:</b> '.$_SESSION['erro'].'
            </div>';
            $_SESSION['erro'] = '';
        }
        ?>
        <div class="form-signin">
            <form action="../controle/esqueciSenha.php" method="POST">
                <!-- E-mail -->
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="txtEmail" style="font-size: 25px;margin-bottom: -5px;">E-mail</label>
                        <input type="email" class="form-control form-control-lg" id="txtEmail"
                            placeholder="Digite seu e-mail" name="email" autofocus required>
                    </div>
                </div>
                <!-- Recuperar -->
                <button type="submit" class="botao botao-roxo btn-lg btn-block mb-3"
                    style="font-size: 20px;">Recuperar</button>
            </form>
            <!-- Cancelar -->
            <a href="login.php" class="botao botao-vermelho btn-lg btn-block" style="font-size: 20px;">Cancelar</a>
        </div>
    </div>
</body>

</html>