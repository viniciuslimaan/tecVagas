<?php
include_once('../modelo/empresa.php');

//SQL injection
foreach($_REQUEST as $dado => $valor) {
    $_REQUEST[$dado] = addslashes($_REQUEST[$dado]);
}

$empresa = new Empresa();
$empresa->__set('idEmpresa', $_GET['id']);

if ($empresa->verEmpresa()) {
    $resultado = $empresa->verEmpresa();

    if ($resultado[0]['empresaParceira'] == 's') {
        $empresaParceira = 'Sim';
    } else {
        $empresaParceira = 'Não';
    }

    echo '
    <!-- Banner empresa -->
    <div class="row">
        <div class="col-12 col-md-12 rounded shadow-sm p-3 banner">
            <div class="bg-white rounded p-3">
                <img class="img-fluid" src="../logos/'.$resultado[0]['logo'].'" alt="'.$resultado[0]['logo'].'"
                    style="max-width: 160px;max-height: 90px;">
            </div>
            <h1 class="bg-light rounded-right p-3 d-none d-sm-block">'.$resultado[0]['nome'].'</h1>
        </div>
    </div>
    <!-- Informações -->
    <div class="row mt-3">
        <!-- Vagas Anunciadas -->
        <div class="col-12 col-md-6 mini-banners rounded shadow-sm mb-1 mb-md-0">
            <i class="fas fa-bullhorn mt-3" style="font-size: 35px;"></i>
            <p class="texto"><b>Vagas Anunciadas:</b> '.$resultado[0]['vagasAnunciadas'].'</p>
        </div>
        <!-- Vagas em Aberto -->
        <div class="col-12 col-md-6 mini-banners rounded shadow-sm">
            <i class="fas fa-envelope-open-text mt-3" style="font-size: 35px;"></i>
            <p class="texto"><b>Vagas em Aberto:</b> '.$resultado[0]['vagasAberto'].'</p>
        </div>
    </div>
    <!-- Descrição -->
    <div class="row mt-3">
        <div class="col-12 col-md-8 bg-white rounded shadow-sm p-3">
            <h3>Sobre</h3>
            <p class="texto text-justify">'.nl2br($resultado[0]['descricao']).'</p>
            <hr class="w-100 d-md-none d-lg-none">
        </div>
        <div class="col-12 col-md-4 bg-white rounded shadow-sm p-3">
            <h3 class="text-center">Informações</h3>
            <p class="texto"><b>Cidade</b><br>'.$resultado[0]['cidade'].'</p>
            <p class="texto"><b>Localização</b><br>'.$resultado[0]['localizacao'].'</p>
            <p class="texto"><b>Telefone</b><br>'.$resultado[0]['telefone'].'</p>
            <p class="texto"><b>Ramo</b><br>'.$resultado[0]['ramo'].'</p>
            <p class="texto"><b>Empresa parceira</b><br>'.$empresaParceira.'</p>
        </div>
    </div>';
} else {
    $_SESSION['erro'] = 'Empresa não encontrada.';
}