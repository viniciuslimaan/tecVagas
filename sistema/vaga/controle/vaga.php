<?php
include_once('../modelo/vaga.php');
include_once('../../empresa/modelo/empresa.php');

//SQL injection
foreach($_REQUEST as $dado => $valor) {
    $_REQUEST[$dado] = addslashes($_REQUEST[$dado]);
}

$vaga = new Vaga();
$vaga->__set('idVaga', $_GET['id']);

if ($vaga->vagaDados()) {
    $resultado = $vaga->vagaDados();

    $empresa = new Empresa();
    $empresa->__set('idEmpresa', $resultado[0]['idEmpresa']);
    $resultado = array_merge($empresa->verEmpresa(), $vaga->vagaDados());

    if ($resultado[1]['ativo'] == 's') {
        $ativoPC = '
        <a href="../../candidatar/controle/candidatar.php?id='.$resultado[1]['idVaga'].'" 
        class="botao botao-roxo d-none d-md-inline-block">Candidatar-se</a>';
        $ativoCel = '
        <a href="../../candidatar/controle/candidatar.php?id='.$resultado[1]['idVaga'].'" 
        class="botao botao-roxo btn-lg btn-block d-md-none d-lg-none">Candidatar-se</a>';
    } else {
        $ativoPC = '
        <p class="col-12 text-danger text-center d-none d-md-inline-block pt-3">
        Essa vaga foi desativada pela empresa!<br>Tente novamente mais tarde.
        </p>';
        $ativoCel = '
        <p class="text-danger text-center d-md-none d-lg-none pt-3">
        Essa vaga foi desativada pela empresa!<br>Tente novamente mais tarde.
        </p>';
    }

    echo '
    <!-- Primeiro Card -->
    <div class="row bg-white rounded shadow-sm pt-3">
        <div class="col-12">
            <h3 class="tituloVaga m-0">'.$resultado[1]['titulo'].'</h3>
        </div>
    </div>
    <div class="row bg-white rounded shadow-sm px-3 pb-3">
        <hr class="w-100">
        <div class="col-12 col-md-3">
            <img class="img-fluid my-3" src="../../empresa/logos/'.$resultado[0]['logo'].'" alt="'.$resultado[0]['logo'].'"
                style="max-width: 150px;max-height: 80px;">
        </div>
        <div class="col-6 col-md-3" style="padding-top: 3%;">
            <p style="font-size: 20px;font-weight: bold;margin-bottom: -3px;">Empresa</p>
            <p>'.$resultado[0]['nome'].'</p>
        </div>
        <div class="col-6 col-md-3" style="padding-top: 3%;">
            <p style="font-size: 20px;font-weight: bold;margin-bottom: -3px;">Ramo</p>
            <p>'.$resultado[0]['ramo'].'</p>
        </div>
        <div class="col-12 col-md-3" style="padding-top: 3%;">
            <a href="../../empresa/visao/perfilEmpresa.php?id='.$resultado[0]['idEmpresa'].'" 
            class="botao botao-roxo btn-lg btn-block">Visitar perfil</a>
        </div>
    </div>
    <div class="row mt-3">
        <!-- Pré-Requisitos e Descrição -->
        <div class="col-12 col-md-8 bg-white rounded shadow-sm p-3" style="font-size: 18px;">
            <h3 class="font-weight-bold">Pré-requisitos</h3>
            <p>'.nl2br($resultado[1]['preRequisitos']).'</p>
            <hr>
            <h3 class="font-weight-bold">Descrição</h3>
            <p>'.nl2br($resultado[1]['descricao']).'</p>
            '.$ativoPC.'
            <hr class="w-100 d-md-none d-lg-none mb-0">
        </div>
        <!-- Informações -->
        <div class="col-12 col-md-4 bg-white rounded shadow-sm p-3" style="font-size: 20px">
            <h3 class="font-weight-bold text-center">Informações</h3>
            <p><b>Tipo de Contrato</b><br>'.$resultado[1]['tipoContrato'].'</p>
            <p><b>Jornada</b><br>'.$resultado[1]['jornada'].'</p>
            <p><b>Cidade</b><br>'.$resultado[0]['cidade'].'</p>
            '.$ativoCel.'
        </div>
    </div>';
} else {
    $_SESSION['erro'] = 'Vaga não encontrada.';
}