<?php
session_start();

if (isset($_COOKIE['nomeEmpresa']) && isset($_COOKIE['idEmpresa'])) {
    $_SESSION['nomeEmpresa'] = $_COOKIE['nome'];
    $_SESSION['idEmpresa'] = $_COOKIE['idEmpresa'];
}

if (isset($_SESSION['nomeEmpresa']) && isset($_SESSION['idEmpresa'])) {
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
        <a href="../../../empresa.php" style="text-decoration: none;padding-top: 5%">
            <p style="font-size: 35px;color: #565C9E;" class="font-weight-bold"><i class="fas fa-reply"
                    style="font-size: 35px;color: #565C9E"></i> Voltar</p>
        </a>
        <!-- Titulo -->
        <h2 class="text-center" style="color: #212529;"><b>Formulário de cadastro de Empresa</b></h2>
        <p class="lead text-center pb-3 px-md-5">Para prosseguir, precisamos de alguns dados da empresa.. Informe nos
            campos abaixo!</p>
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
        <form class="needs-validation" novalidate method="POST" action="../controle/cadastro.php" enctype="multipart/form-data">
            <div class="form-row pb-3">
                <!-- Nome Empresa -->
                <div class="col-12 col-md-12">
                    <label for="txtNome">Nome da empresa</label>
                    <input type="text" class="form-control" id="txtNome" placeholder="Digite o nome da empresa"
                        name="nome" maxlength="45" required>
                    <div class="invalid-feedback">
                        É obrigatório inserir o nome da empresa.
                    </div>
                </div>
            </div>
            <div class="form-row pb-3">
                <!-- Email -->
                <div class="col-12 col-md-7">
                    <label for="txtEmail">E-mail</label>
                    <input type="text" class="form-control" id="txtEmail" placeholder="Digite o e-mail comercial"
                        name="email" maxlength="100" required>
                    <div class="invalid-feedback">
                        É obrigatório inserir o e-mail da empresa.
                    </div>
                </div>
                <!-- Senha -->
                <div class="col-12 col-md-5">
                    <label for="txtSenha">Senha <small>(min. 8 caracteres)</small></label>
                    <input type="password" class="form-control" id="txtSenha" placeholder="Digite a senha da conta"
                        minlength="8" name="senha" required>
                    <div class="invalid-feedback">
                        É obrigatório inserir a senha da empresa (senha mínima 8 caracteres).
                    </div>
                </div>
            </div>
            <div class="form-row pb-3">
                <!-- CNPJ -->
                <div class="col-12 col-md-6">
                    <label for="txtCNPJ">CNPJ <small>(opcional)</small></label>
                    <input type="text" class="form-control" id="txtCNPJ" placeholder="Digite o CNPJ da empresa"
                        name="cnpj">
                </div>
                <div class="col-12 col-md-6">
                    <label for="txtTelefone">Telefone</label>
                    <input type="text" class="form-control" id="txtTelefone" placeholder="(XX) XXXXX XXXX"
                        name="telefone" required>
                    <div class="invalid-feedback">
                        É obrigatório inserir o telefone da empresa.
                    </div>
                </div>
            </div>
            <div class="form-row pb-3">
                <!-- Cidade -->
                <div class="col-12 col-md-6">
                    <label for="txtCidade">Cidade</label>
                    <input type="text" class="form-control" id="txtCidade" placeholder="Ex: Lins - SP" maxlength="50" name="cidade"
                        required>
                    <div class="invalid-feedback">
                        É obrigatório inserir o nome da cidade onde a empresa está localizada.
                    </div>
                </div>
                <!-- Localização -->
                <div class="col-12 col-md-6">
                    <label for="txtLocalizacao">Localização</label>
                    <input type="text" class="form-control" id="txtLocalizacao"
                        placeholder="Ex: R. São Pedro, 300 - Vila Perin" name="localizacao" maxlength="50" required>
                    <div class="invalid-feedback">
                        É obrigatório inserir a localização da empresa.
                    </div>
                </div>
            </div>
            <div class="form-row pb-3">
                <!-- Ramo de Atividade -->
                <div class="col-12 col-md-8">
                    <label for="txtRamo">Ramo de atividade</label>
                    <input type="text" class="form-control" id="txtRamo" placeholder="Ex: Loja de Informatica"
                        maxlength="50" name="ramo" required>
                    <div class="invalid-feedback">
                        É obrigatório inserir o ramo da empresa.
                    </div>
                </div>
                <!-- CEP -->
                <div class="col-12 col-md-4">
                    <label for="txtCEP">CEP</label>
                    <input type="text" class="form-control" id="txtCEP" placeholder="XXXXX-XXX" name="cep" required>
                    <div class="invalid-feedback" required>
                        É obrigatório inserir o CEP da empresa.
                    </div>
                </div>
            </div>
            <!-- Descrição -->
            <div class="form-row pb-3">
                <div class="col-12 col-md-12">
                    <label for="txtDescricao">Descrição da Empresa</label>
                    <textarea rows="4" class="form-control" id="txtDescricao"
                        placeholder="A mensagem que for escrita aqui, será exibida na página de perfil de sua Empresa.&#10;Ex: Somos uma empresa de informatica a 10 Anos.."
                        maxlength="500" name="descricao" required></textarea>
                    <div class="invalid-feedback">
                        É obrigatório inserir a descrição da empresa.
                    </div>
                </div>
            </div>
            <!-- Anexar Logo -->
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="logo">
                        <label class="custom-file-label" for="customFile" style="font-size: 18px;">Anexar a logo da empresa (opcional)</label>
                    </div>
                </div>
            </div>
            <!-- Deseja receber currículos via e-mail? -->
            <div class="mb-3">
                <label class="form-check-label" for="chkDeseja">
                    <input type="checkbox" value="receber" id="chkDeseja" style="width: 15px;" name="deseja">
                    Deseja receber avisos de interessados no e-mail de cadastro?
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

    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

</html>