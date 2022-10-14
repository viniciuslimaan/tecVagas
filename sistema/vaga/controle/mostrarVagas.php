<?php
include_once(dirname(__FILE__).'/../modelo/vaga.php');

$vaga = new Vaga();

if ($vaga->mostrarVagas()) {
    $resultado = $vaga->mostrarVagas();

    for ($i = count($resultado)-1; $i >= 0; $i--){
        if ($arquivo == 'index.php') {
            $botao = '
            <a href="sistema/vaga/visao/vaga.php?id='.$resultado[$i]['idVaga'].'" class="botao botao-roxo d-inline-flex">
                Mais informações
            </a>';
        } else {
            $botao = '
            <a href="../../vaga/visao/vaga.php?id='.$resultado[$i]['idVaga'].'" class="botao botao-roxo d-inline-flex">
                Mais informações
            </a>';
        }
        echo '
        <div class="row mb-3">
            <div class="col-12 bg-white rounded shadow p-3" style="font-size: 18px;">
                <h3 class="tituloVaga text-center">'.$resultado[$i]['titulo'].'</h3>
                <hr>
                <p><b>» Tipo de contrato</b><br>
                    '.$resultado[$i]['tipoContrato'].'
                </p>
                <p><b>» Pré-requisitos</b><br>
                    '.nl2br($resultado[$i]['preRequisitos']).'
                </p>
                '.$botao.'
            </div>
        </div>';
    }
} else {
    echo '
    <div class="row mb-3">
        <div class="col-12 bg-white rounded shadow text-center" style="color: #565C9E;">
            <i class="far fa-sad-tear pt-5" style="font-size: 4em;"></i>
            <p class="py-3" style="font-size: 20px;">Nenhuma vaga está ativa no momento, por favor, tente novamente mais tarde!</p>
        </div>
    </div>';
}