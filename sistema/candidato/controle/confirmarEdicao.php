<?php
include_once('../modelo/candidato.php');

$candidato = new Candidato();
$candidato->__set('idCandidato', $_GET['id']);

if ($candidato->verCandidato()) {
    $resultado = $candidato->verCandidato();

    if($resultado[0]['sexo'] == 'm') {
        $sexo = '
        <option selected value="m">Masculino</option>
        <option value="f">Feminino</option>';
    } else {
        $sexo = '
        <option value="m">Masculino</option>
        <option selected value="f">Feminino</option>';
    }

    if($resultado[0]['relacaoEtec'] == 'aluno') {
        $relacao = '
        <option selected value="aluno">Aluno</option>
        <option value="ex_aluno">Ex aluno</option>
        <option value="nenhuma">Nenhuma</option>';
    } else if ($resultado[0]['relacaoEtec'] == 'ex_aluno') {
        $relacao = '
        <option value="aluno">Aluno</option>
        <option selected value="ex_aluno">Ex aluno</option>
        <option value="nenhuma">Nenhuma</option>';
    } else {
        $relacao = '
        <option value="aluno">Aluno</option>
        <option value="ex_aluno">Ex aluno</option>
        <option selected value="nenhuma">Nenhuma</option>';
    }

    if($resultado[0]['sexo'] == 'm') {
        $sexo = '
        <option selected value="m">Masculino</option>
        <option value="f">Feminino</option>';
    } else {
        $sexo = '
        <option value="m">Masculino</option>
        <option selected value="f">Feminino</option>';
    }

    if($resultado[0]['deseja'] == 's') {
        $deseja = '
        <input type="checkbox" value="receber" id="chkDeseja" style="width: 20px;" name="deseja" checked> 
        Deseja receber vagas de emprego no e-mail?';
    } else {
        $deseja = '
        <input type="checkbox" value="receber" id="chkDeseja" style="width: 20px;" name="deseja"> 
        Deseja receber vagas de emprego no e-mail?';
    }
    echo '
    <div class="bg-white rounded shadow-lg p-5">
        <h3>Dados do candidato <b>'.$resultado[0]['nome'].' '.$resultado[0]['sobrenome'].'</b></h3>
        <form action="../controle/editarCandidato.php" method="post">
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="txtNome">Nome</label>
                    <input id="txtNome" class="form-control" type="text" name="nome" 
                    value="'.$resultado[0]['nome'].'" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="txtSobrenome">Sobrenome</label>
                    <input id="txtSobrenome" class="form-control" type="text" name="sobrenome" 
                    value="'.$resultado[0]['sobrenome'].'" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-7">
                    <label for="txtEmail">E-mail</label>
                    <input id="txtEmail" class="form-control" type="email" name="email" 
                    value="'.$resultado[0]['email'].'" required>
                </div>
                <div class="form-group col-12 col-md-5">
                    <label for="txtSenha">Senha</label>
                    <input id="txtSenha" class="form-control" type="password" name="" 
                    placeholder="Apenas o dono da conta pode alterar." readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-5">
                    <label for="txtTelefone">Telefone</label>
                    <input id="txtTelefone" class="form-control" type="text" name="telefone" 
                    value="'.$resultado[0]['telefone'].'" required>
                </div>
                <div class="form-group col-12 col-md-5">
                    <label for="txtCidade">Cidade</label>
                    <input id="txtCidade" class="form-control" type="text" name="cidade" 
                    value="'.$resultado[0]['cidade'].'" required>
                </div>
                <div class="form-group col-12 col-md-2">
                    <label for="txtCEP">CEP</label>
                    <input id="txtCEP" class="form-control" type="text" name="cep" 
                    value="'.$resultado[0]['cep'].'" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="optSexo">Sexo</label>
                    <select id="optSexo" class="form-control" name="sexo" required>
                        '.$sexo.'
                    </select>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="optRelacao">Relação com a Etec de Lins</label>
                    <select id="optRelacao" class="form-control" name="relacaoEtec" required>
                        '.$relacao.'
                    </select>
                </div>
            </div>
            <label class="form-check-label mt-2 mb-3" for="chkDeseja">
                '.$deseja.'
            </label>
            <input type="hidden" name="idCandidato" value="'.$resultado[0]['idCandidato'].'">
            <br>
            <div class="text-center">
                <a href="listarCandidato.php" class="botao botao-vermelho botao-grande mr-md-1">
                    <i class="fas fa-times pr-1"></i> Cancelar
                </a>
                <button type="submit" class="botao botao-verde mt-3 mt-md-0">
                    <i class="fas fa-check pr-1"></i> Salvar
                </button>
            </div>
        </form>
    </div>';
} else {
    $_SESSION['erro'] = 'Candidato não encontrado.';
}