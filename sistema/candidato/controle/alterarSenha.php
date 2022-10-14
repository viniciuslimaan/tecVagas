<?php
session_start();
include_once('../modelo/candidato.php');

//SQL injection
foreach($_REQUEST as $dado => $valor) {
    $_REQUEST[$dado] = addslashes($_REQUEST[$dado]);
}

if (!empty($_REQUEST['senha'])) {

    $candidato = new Candidato();
    $candidato->__set('idCandidato', $_SESSION['id']);
    $candidato->__set('senha', md5($_REQUEST['senha']));

    if ($candidato->alterarSenha()) {
        header('Location: ../visao/painel.php');
    } else {
        $_SESSION['erro'] = $candidato->__get('erro');
        header('Location: ../visao/alterarSenha.php');
    }
} else {
    $_SESSION['erro'] = 'A senha não foi preenchida.';
    header('Location: ../visao/alterarSenha.php');
}