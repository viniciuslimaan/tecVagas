<?php
include_once('../../vaga/modelo/vaga.php');
session_start();

//SQL injection
foreach($_REQUEST as $dado => $valor) {
    $_REQUEST[$dado] = addslashes($_REQUEST[$dado]);
}

$vaga = new Vaga();
$vaga->__set('idVaga', $_GET['id']);
$vaga->__set('idEmpresa', $_SESSION['idEmpresa']);
$vaga->desativarVaga();
header('Location: ../../empresa/visao/painel.php');