<?php
include_once('../modelo/empresa.php');

$empresa = new Empresa();
$empresa->__set('idEmpresa', $_SESSION['idEmpresa']);

if ($empresa->virarParceira()) {
    $resultado = $empresa->virarParceira();

    if ($resultado[0]['empresaParceira'] == 's') {
        echo '
        <h2 class="text-center" style="color: #F8F9FA;"><b>Você é uma empresa parceira!</b></h2>
        <p class="text-center" style="font-size: 28px;">Agradecemos por usar nossa plataforma.</p>';
    } else {    
        echo '
        <h2 class="text-center" style="color: #F8F9FA;"><b>Seja uma empresa parceira!</b></h2>
        <p class="text-center" style="font-size: 28px;">É muito fácil! Basta anunciar 3 ou mais vagas, e
            automaticamente se tornará uma empresa parceira.</p>';
    }
}