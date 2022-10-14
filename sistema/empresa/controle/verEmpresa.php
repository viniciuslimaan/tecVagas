<?php
include_once('../modelo/empresa.php');

$empresa = new Empresa();
$empresa->__set('idEmpresa', $_GET['id']);

if ($empresa->verEmpresa()) {
    $resultado = $empresa->verEmpresa();

    // Empresa parceira
    if ($resultado[0]['empresaParceira'] == 's') {
        $empresaParceira = 'Sim';
    } else if ($resultado[0]['empresaParceira'] == 'n') {
        $empresaParceira = 'Não';
    } else {
        $empresaParceira = 'Não definido';
    }

    // Deseja receber curriculos no email
    if ($resultado[0]['deseja'] == 's') {
        $deseja = 'Sim';
    } else if ($resultado[0]['deseja'] == 'n') {
        $deseja = 'Não';
    } else {
        $deseja = 'Não definido';
    }

    echo '
    <div class="bg-white rounded shadow-lg p-5">
        <h3>Dados da empresa <b>'.$resultado[0]['nome'].'</b></h3>
        <p><b>Nome da empresa:</b> '.$resultado[0]['nome'].'</p>
        <p><b>E-mail:</b> '.$resultado[0]['email'].'</p>
        <p><b>CNPJ:</b> '.$resultado[0]['cnpj'].'</p>
        <p><b>Telefone:</b> '.$resultado[0]['telefone'].'</p>
        <p><b>Cidade:</b> '.$resultado[0]['cidade'].'</p>
        <p><b>Localização:</b> '.$resultado[0]['localizacao'].'</p>
        <p><b>Ramo:</b> '.$resultado[0]['ramo'].'</p>
        <p><b>CEP:</b> '.$resultado[0]['cep'].'</p>
        <p><b>Descrição:</b> '.$resultado[0]['descricao'].'</p>
        <p><b>Empresa parceira:</b> '.$empresaParceira.'</p>
        <p><b>Deseja receber os currículos no e-mail:</b> '.$deseja.'</p>
        <p><b>Logo:</b></p>
        <img class="img-fluid" src="../logos/'.$resultado[0]['logo'].'" alt="'.$resultado[0]['logo'].'"
        style="max-width: 160px;max-height: 90px;margin-bottom: 15px; margin-top: -15px;">       
        <br>
        <a href="listarEmpresa.php" class="botao botao-roxo"><i class="fas fa-reply pr-1"></i> Voltar</a>
    </div>';
} else {
    $_SESSION['erro'] = 'Empresa não encontrada.';
}