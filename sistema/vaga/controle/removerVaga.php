<?php
include_once('../modelo/vaga.php');
session_start();

//SQL injection
foreach($_REQUEST as $dado => $valor) {
    $_REQUEST[$dado] = addslashes($_REQUEST[$dado]);
}

$vaga = new Vaga();
$vaga->__set('idVaga', $_GET['id']);
$vaga->__set('idEmpresa', $_SESSION['idEmpresa']);

if ($vaga->desativarVaga() && $vaga->excluirVaga()) {
    header('Location: ../../empresa/visao/painel.php');
} else {
    $_SESSION['erro'] = 'Ocorreu um erro ao tentar excluir a vaga.';
    header('Location: ../visao/removerVaga.php?id='.$_GET['id'].'');
}