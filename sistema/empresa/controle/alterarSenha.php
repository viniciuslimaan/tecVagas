<?php
session_start();
include_once('../modelo/empresa.php');

//SQL injection
foreach($_REQUEST as $dado => $valor) {
    $_REQUEST[$dado] = addslashes($_REQUEST[$dado]);
}

if (!empty($_REQUEST['senha'])) {

    $empresa = new Empresa();
    $empresa->__set('idEmpresa', $_SESSION['idEmpresa']);
    $empresa->__set('senha', md5($_REQUEST['senha']));

    if ($empresa->alterarSenha()) {
        header('Location: ../visao/painel.php');
    } else {
        $_SESSION['erro'] = $empresa->__get('erro');
        header('Location: ../visao/alterarSenha.php');
    }
} else {
    $_SESSION['erro'] = 'A senha não foi preenchida.';
    header('Location: ../visao/alterarSenha.php');
}