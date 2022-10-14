<?php
include_once('../modelo/empresa.php');

$empresa = new Empresa();
$empresa->__set('idEmpresa', $_GET['id']);

if ($empresa->verEmpresa()) {
    $resultado = $empresa->verEmpresa();

    if($resultado[0]['deseja'] == 's') {
        $deseja = '
        <input type="checkbox" value="receber" id="chkDeseja" style="width: 20px;" name="deseja" checked> 
        Deseja receber avisos de interessados no e-mail de cadastro?';
    } else {
        $deseja = '
        <input type="checkbox" value="receber" id="chkDeseja" style="width: 20px;" name="deseja"> 
        Deseja receber avisos de interessados no e-mail de cadastro?';
    }
    if ($resultado[0]['logo'] == 'semLogo.png') {
        $logo = 'Anexar a logo da empresa (opcional)';
    } else {
        $logo = 'Alterar logo da empresa';
    }
    echo '
    <div class="bg-white rounded shadow-lg p-5">
        <h3>Dados do empresa <b>'.$resultado[0]['nome'].'</b></h3>
        <form action="../controle/editarEmpresa.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-12 col-md-12">
                    <label for="txtNome">Nome da empresa</label>
                    <input id="txtNome" class="form-control" type="text" name="nome" 
                    value="'.$resultado[0]['nome'].'" required>
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
                <div class="form-group col-12 col-md-6">
                    <label for="txtCNPJ">CNPJ</label>
                    <input id="txtCNPJ" class="form-control" type="text" name="cnpj" 
                    value="'.$resultado[0]['cnpj'].'" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="txtTelefone">Telefone</label>
                    <input id="txtTelefone" class="form-control" type="text" name="telefone" 
                    value="'.$resultado[0]['telefone'].'" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="txtCidade">Cidade</label>
                    <input id="txtCidade" class="form-control" type="text" name="cidade" 
                    value="'.$resultado[0]['cidade'].'" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="txtLocalizacao">Localização</label>
                    <input id="txtLocalizacao" class="form-control" type="text" name="localizacao" 
                    value="'.$resultado[0]['localizacao'].'" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-8">
                    <label for="txtRamo">Ramo de atividade</label>
                    <input id="txtRamo" class="form-control" type="text" name="ramo" maxlength="50" 
                    value="'.$resultado[0]['ramo'].'" required>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="txtCEP">CEP</label>
                    <input id="txtCEP" class="form-control" type="text" name="cep" 
                    value="'.$resultado[0]['cep'].'" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-12">
                    <label for="txtDescricao">Descrição da Empresa</label>
                    <textarea rows="4" class="form-control" id="txtDescricao"
                        maxlength="500" name="descricao" required>'.$resultado[0]['descricao'].'</textarea>
                    <div class="invalid-feedback">
                        É obrigatório inserir a descrição da empresa.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="logo">
                        <label class="custom-file-label" for="customFile" style="font-size: 18px;">'.$logo.'</label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="logoVelha" value="'.$resultado[0]['logo'].'">
            <label class="form-check-label mt-2 mb-3" for="chkDeseja">
                '.$deseja.'
            </label>
            <input type="hidden" name="idEmpresa" value="'.$resultado[0]['idEmpresa'].'">
            <br>
            <div class="text-center">
                <a href="listarEmpresa.php" class="botao botao-vermelho botao-grande mr-md-1">
                    <i class="fas fa-times pr-1"></i> Cancelar
                </a>
                <button type="submit" class="botao botao-verde mt-3 mt-md-0">
                    <i class="fas fa-check pr-1"></i> Salvar
                </button>
            </div>
        </form>
    </div>';
} else {
    $_SESSION['erro'] = 'Empresa não encontrada.';
}