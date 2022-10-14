<?php
include_once('../modelo/candidato.php');

$candidato = new Candidato();
$candidato->__set('idCandidato', $_SESSION['id']);
$resultado = $candidato->verificarCurriculo();

if ($resultado['curriculo'] != 'semCurriculo') {
    $curriculo = $resultado['curriculo'];
}