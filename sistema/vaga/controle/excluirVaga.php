<?php
include_once('../modelo/vaga.php');
session_start();

$vaga = new Vaga();
$vaga->__set('idVaga', $_GET['idVaga']);
$vaga->__set('idEmpresa', $_GET['idEmpresa']);

if ($vaga->desativarVaga() && $vaga->excluirVaga()) {
    header('Location: ../visao/listarVaga.php');
} else {
    $_SESSION['erro'] = 'Ocorreu um erro ao tentar excluir a vaga.';
    header('Location: ../visao/excluirVaga.php?idVaga='.$_GET['idVaga'].'&idEmpresa='.$_GET['idEmpresa'].'');
}