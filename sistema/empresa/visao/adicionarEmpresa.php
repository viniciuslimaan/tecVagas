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

    label {
        font-size: 1.2em;
        margin-bottom: -5px;
    }
</style>

<body class="bg-light">
    <!-- Navbar -->
    <?php include_once('../../admin/visao/navbar.php'); ?>
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
            <h3>Cadastrar um novo empresa</h3>
            <form action="../controle/adicionarEmpresa.php" method="post">
                <div class="form-row">
                    <div class="form-group col-12 col-md-12">
                        <label for="txtNome">Nome da empresa</label>
                        <input id="txtNome" class="form-control" type="text" name="nome" maxlength="45" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-7">
                        <label for="txtEmail">E-mail</label>
                        <input id="txtEmail" class="form-control" type="email" name="email" maxlength="100" required>
                    </div>
                    <div class="form-group col-12 col-md-5">
                        <label for="txtSenha">Senha <small>(min. 8 caracteres)</small></label>
                        <input id="txtSenha" class="form-control" type="password" minlength="8" name="senha" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-6">
                        <label for="txtCNPJ">CNPJ <small>(opcional)</small></label>
                        <input id="txtCNPJ" class="form-control" type="text" name="cnpj" required>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="txtTelefone">Telefone</label>
                        <input id="txtTelefone" class="form-control" type="text" name="telefone" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-6">
                        <label for="txtCidade">Cidade</label>
                        <input id="txtCidade" class="form-control" type="text" name="cidade" maxlength="50" required>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="txtLocalizacao">Localização</label>
                        <input id="txtLocalizacao" class="form-control" type="text" name="localizacao" maxlength="50" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-8">
                        <label for="txtRamo">Ramo de atividade</label>
                        <input id="txtRamo" class="form-control" type="text" name="ramo" maxlength="50" required>
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <label for="txtCEP">CEP</label>
                        <input id="txtCEP" class="form-control" type="text" name="cep" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-12">
                        <label for="txtDescricao">Descrição da Empresa</label>
                        <textarea rows="4" class="form-control" id="txtDescricao"
                            maxlength="500" name="descricao" required></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="logo">
                            <label class="custom-file-label" for="customFile" style="font-size: 18px;">Anexar a logo da empresa (opcional)</label>
                        </div>
                    </div>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="width: 15px;
                    height: 15px;margin-top: 5px;" name="deseja">
                    <label class="form-check-label" for="exampleCheck1">Receber avisos de interessados no e-mail cadastrado?</label>
                </div>
                <br>
                <div class="text-center">
                    <a href="listarEmpresa.php" class="botao botao-vermelho botao-grande"><i
                            class="fas fa-times pr-1"></i>
                        Cancelar</a>
                    <button type="submit" class="botao botao-verde mt-3 mt-md-0"><i class="fas fa-check pr-1"></i>
                        Salvar</button>
                </div>
            </form>
        </div>
    </div>
</body>

<script src="../../../js/jquery-3.3.1.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>
<script src="../../../js/jquery.mask.js"></script>
<script src="../../../js/mascaras.js"></script>

</html>