<?php
include_once('../modelo/empresa.php');

$empresa = new Empresa();
$empresa->__set('idEmpresa', $_GET['id']);

if ($empresa->excluirEmpresa()) {
    header('Location: ../visao/listarEmpresa.php');
} else {
    $_SESSION['erro'] = 'Ocorreu um erro ao tentar excluir a empresa.';
    header('Location: ../visao/excluirEmpresa.php?'.$_GET['id'].'');
}