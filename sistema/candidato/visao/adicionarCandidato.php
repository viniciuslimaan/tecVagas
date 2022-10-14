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
        <!-- Dados do Candidato -->
        <div class="bg-white rounded shadow-lg p-5">
            <h3>Cadastrar um novo candidato</h3>
            <form action="../controle/adicionarCandidato.php" method="post">
                <div class="form-row">
                    <div class="form-group col-12 col-md-6">
                        <label for="txtNome">Nome</label>
                        <input id="txtNome" class="form-control" type="text" name="nome" required>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="txtSobrenome">Sobrenome</label>
                        <input id="txtSobrenome" class="form-control" type="text" name="sobrenome" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-7">
                        <label for="txtEmail">E-mail</label>
                        <input id="txtEmail" class="form-control" type="email" name="email" required>
                    </div>
                    <div class="form-group col-12 col-md-5">
                        <label for="txtSenha">Senha <small>(min. 8 caracteres)</small></label>
                        <input id="txtSenha" class="form-control" type="password" minlength="8" name="senha" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-4">
                        <label for="txtTelefone">Telefone</label>
                        <input id="txtTelefone" class="form-control" type="text" name="telefone" required>
                    </div>
                    <div class="form-group col-12 col-md-5">
                        <label for="txtCidade">Cidade</label>
                        <input id="txtCidade" class="form-control" type="text" name="cidade" required>
                    </div>
                    <div class="form-group col-12 col-md-3">
                        <label for="txtCEP">CEP</label>
                        <input id="txtCEP" class="form-control" type="text" name="cep" required>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="optSexo">Sexo</label>
                        <select id="optSexo" class="form-control" name="sexo" required>
                            <option selected value="">Escolher...</option>
                            <option value="m">Masculino</option>
                            <option value="f">Feminino</option>
                        </select>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="optSexo">Relação com a Etec de Lins</label>
                        <select id="optSexo" class="form-control" name="relacaoEtec" required>
                            <option selected value="">Escolher...</option>
                            <option value="aluno">Aluno</option>
                            <option value="ex_aluno">Ex aluno</option>
                            <option value="nenhuma">Nenhuma</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="width: 15px;
                    height: 15px;margin-top: 5px;" name="deseja">
                    <label class="form-check-label" for="exampleCheck1">Receber vagas de emprego no
                        e-mail?</label>
                </div>
                <br>
                <div class="text-center">
                    <a href="listarCandidato.php" class="botao botao-vermelho botao-grande"><i
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