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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="shortcut icon" href="../../../img/logo.png" type="image/x-icon">
    <title>TecVagas | Cadastro</title>
</head>

<style>
    label {
        font-size: 20px;
        margin-bottom: -5px;
    }
</style>

<body style="background-color: #F8F9FA;">
    <div class="container py-5">
        <!-- Voltar -->
        <a href="../../../index.php" style="text-decoration: none;padding-top: 5%">
            <p style="font-size: 35px;color: #565C9E;" class="font-weight-bold"><i class="fas fa-reply"
                    style="font-size: 35px;color: #565C9E"></i> Voltar</p>
        </a>
        <!-- Titulo -->
        <h2 class="text-center font-weight-bold" style="color: #212529;">
            Formulário de cadastro de Candidato
        </h2>
        <p class="lead text-center pb-3 px-md-5">Falta pouco para você conseguir enviar currículos para as vagas que
            você está interessado, para continuar, precisamos de alguns dados.</p>
        <!-- Mensagem Erro -->
        <?php
        if (!empty($_SESSION['erro'])) {
            echo '<div class="alert alert-danger text-center" role="alert">
                <b>ERRO:</b> '.$_SESSION['erro'].'
            </div>';
            $_SESSION['erro'] = '';
        }
        ?>
        <!-- Formulário -->
        <form class="needs-validation" novalidate method="POST" action="../controle/cadastro.php">
            <div class="form-row pb-3">
                <!-- Nome -->
                <div class="col-12 col-md-6">
                    <label for="txtNome">Nome</label>
                    <input type="text" class="form-control" id="txtNome" placeholder="Digite seu nome" name="nome"
                        required>
                    <div class="invalid-feedback">
                        É obrigatório inserir seu nome.
                    </div>
                </div>
                <!-- Sobrenome -->
                <div class="col-12 col-md-6">
                    <label for="txtSobrenome">Sobrenome</label>
                    <input type="text" class="form-control" id="txtSobrenome" placeholder="Digite seu sobrenome"
                        name="sobrenome" required>
                    <div class="invalid-feedback">
                        É obrigatório inserir seu sobrenome.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <!-- E-mail -->
                <div class="col-12 col-md-7">
                    <label for="txtEmail">E-mail</label>
                    <input type="email" class="form-control" id="txtEmail" placeholder="Digite seu e-mail" name="email"
                        required>
                    <div class="invalid-feedback">
                        É obrigatório inserir seu e-mail.
                    </div>
                </div>
                <!-- Senha -->
                <div class="form-group col-md-5">
                    <label for="txtSenha">Senha <small>(min. 8 caracteres)</small></label>
                    <input type="password" class="form-control" id="txtSenha" placeholder="Digite sua senha"
                        minlength="8" name="senha" required>
                    <div class="invalid-feedback">
                        É obrigatório inserir sua senha (senha mínima 8 caracteres).
                    </div>
                </div>
            </div>
            <div class="form-row pb-3">
                <!-- Telefone -->
                <div class="col-12 col-md-5">
                    <label for="txtTelefone">Telefone</label>
                    <input type="text" class="form-control" id="txtTelefone" placeholder="(XX) XXXXX XXXX"
                        name="telefone" required>
                    <div class="invalid-feedback">
                        É obrigatório inserir seu telefone.
                    </div>
                </div>
                <!-- Cidade -->
                <div class="col-12 col-md-5">
                    <label for="txtCidade">Cidade</label>
                    <input type="text" class="form-control" id="txtCidade" placeholder="Digite sua cidade" name="cidade"
                        required>
                    <div class="invalid-feedback">
                        É obrigatório inserir sua cidade.
                    </div>
                </div>
                <!-- CEP -->
                <div class="col-12 col-md-2">
                    <label for="txtCEP">CEP</label>
                    <input type="text" class="form-control" id="txtCEP" placeholder="XXXXX-XXX" name="cep" required>
                    <div class="invalid-feedback">
                        É obrigatório inserir seu CEP.
                    </div>
                </div>
            </div>
            <div class="form-row pb-3">
                <!-- Sexo -->
                <div class="col-12 col-md-6">
                    <label for="inputSexo">Sexo</label>
                    <select id="inputSexo" class="form-control" name="sexo" required>
                        <option selected value="">Escolher...</option>
                        <option value="m">Masculino</option>
                        <option value="f">Feminino</option>
                    </select>
                    <div class="invalid-feedback">
                        É obrigatório informar seu sexo.
                    </div>
                </div>
                <!-- Relação -->
                <div class="col-12 col-md-6">
                    <label for="inputRelacao">Relação com a Etec de Lins</label>
                    <select id="inputRelacao" class="form-control" name="relacaoEtec" required>
                        <option selected value="">Escolher...</option>
                        <option value="aluno">Aluno</option>
                        <option value="ex_aluno">Ex aluno</option>
                        <option value="nenhuma">Nenhuma</option>
                    </select>
                    <div class="invalid-feedback">
                        É obrigatório informar sua relação com a Etec.
                    </div>
                </div>
            </div>
            <!-- Deseja receber vagas via e-mail? -->
            <div class="mb-3">
                <label class="form-check-label" for="chkDeseja">
                    <input type="checkbox" value="receber" id="chkDeseja" style="width: 15px;" name="deseja">
                    Deseja receber vagas de emprego no seu e-mail?
                </label>
            </div>
            <!-- Cadastrar -->
            <button class="botao botao-roxo" type="submit">Cadastrar</button>
        </form>
    </div>
</body>

<script src="../../../js/jquery-3.3.1.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>
<script src="../../../js/jquery.mask.js"></script>
<script src="../../../js/mascaras.js"></script>
<script>
    // Desativar envios de formulário, se houver campos inválidos.
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
            var forms = document.getElementsByClassName('needs-validation');
            // Faz um loop neles e evita o envio
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

</html>