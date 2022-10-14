<?php 
include_once(dirname(__FILE__).'/../modelo/empresa.php');

$empresa = new Empresa();

if ($empresa->listarParceiras()) {
    $resultado = $empresa->listarParceiras();

    
    if ($arquivo == 'index.php') {
        for ($i = 0; $i < 4; $i++) {
            if (isset($resultado[$i]['idEmpresa']) && isset($resultado[$i]['logo'])) {
                echo '
                <div class="col-6 col-md-3 mb-3">
                    <a href="sistema/empresa/visao/perfilEmpresa.php?id='.$resultado[$i]['idEmpresa'].'" target="blank">
                        <img class="img-fluid" src="sistema/empresa/logos/'.$resultado[$i]['logo'].'" 
                        alt="'.$resultado[$i]['logo'].'" style="max-width: 150px;max-height: 80px;">
                    </a>
                </div>';
            }
        }
    } else if ($arquivo == 'empresa.php') {
        for ($i = count($resultado)-1; $i >= 0; $i--) {
            echo '
            <div class="col-6 col-md-3 mb-3">
                <a href="sistema/empresa/visao/perfilEmpresa.php?id='.$resultado[$i]['idEmpresa'].'" target="blank">
                    <img class="img-fluid" src="sistema/empresa/logos/'.$resultado[$i]['logo'].'" 
                    alt="'.$resultado[$i]['logo'].'" style="max-width: 150px;max-height: 80px;">
                </a>
            </div>';
        }
    } else if ($arquivo == 'painel.php') {
        for ($i = count($resultado)-1; $i >= 0; $i--) {
            echo '
            <div class="col-6 col-md-3 mb-3">
                <a href="../../empresa/visao/perfilEmpresa.php?id='.$resultado[$i]['idEmpresa'].'" target="blank">
                    <img class="img-fluid" src="../../empresa/logos/'.$resultado[$i]['logo'].'" 
                    alt="'.$resultado[$i]['logo'].'" style="max-width: 150px;max-height: 80px;">
                </a>
            </div>';
        }
    }
} else {
    echo '<div class="col-12">
            <p class="text-center" style="margin-top: -35px;font-size: 1.2em">
                Nenhuma empresa se tornou parceira ainda.
            </p>
        </div>';
}