<?php
include_once('../modelo/candidato.php');
session_start();

$candidato = new Candidato();
$candidato->__set('idCandidato', $_SESSION['id']);

if (!empty($_FILES['curriculo']['name'])) {
    $extensao = pathinfo($_FILES['curriculo']['name'], PATHINFO_EXTENSION);

    if (in_array($extensao, array('jpg', 'jpeg', 'png', 'pdf'))) {
        $pasta = '../curriculos/';
        $curriculo = uniqid().'.'.$extensao;
        move_uploaded_file($_FILES['curriculo']['tmp_name'], $pasta.$curriculo);
        $candidato->__set('curriculo', $curriculo);
        if ($_REQUEST['curriculoVelho'] != 'semCurriculo') {
            unlink($pasta.$_REQUEST['curriculoVelho']);
        }
    } else {
        $_SESSION['erro'] = 'O formato do curriculo não foi aceito.';
        header('Location: ../visao/curriculo.php');
        exit();
    }

    if ($candidato->adicionarCurriculo()) {
        header('Location: ../visao/painel.php');
    } else {
        $_SESSION['erro'] = $candidato->__get('erro');
        header('Location: ../visao/curriculo.php');
    }
} else {
    $_SESSION['erro'] = 'Você precisa fazer o upload do arquivo.';
    header('Location: ../visao/curriculo.php');
}
