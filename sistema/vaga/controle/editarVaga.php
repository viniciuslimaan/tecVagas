<?php
include_once('../modelo/vaga.php');
session_start();

//SQL injection
foreach($_REQUEST as $dado => $valor) {
    $_REQUEST[$dado] = addslashes($_REQUEST[$dado]);
}

if (!empty($_REQUEST['titulo']) &&
    !empty($_REQUEST['tipoContrato']) &&
    !empty($_REQUEST['jornada']) &&
    !empty($_REQUEST['preRequisitos']) &&
    !empty($_REQUEST['descricao'])) {
    
    $vaga = new Vaga();
    $vaga->__set('idVaga', $_REQUEST['idVaga']);
    $vaga->__set('titulo', $_REQUEST['titulo']);
    $vaga->__set('tipoContrato', $_REQUEST['tipoContrato']);
    $vaga->__set('jornada', $_REQUEST['jornada']);
    $vaga->__set('preRequisitos', $_REQUEST['preRequisitos']);
    $vaga->__set('descricao', $_REQUEST['descricao']);

    if ($vaga->editarVaga()) {
        header('Location: ../../empresa/visao/painel.php');
    } else {
        $_SESSION['erro'] = $empresa->__get('erro');
        header('Location: ../visao/editarVaga.php?id='.$_REQUEST['idVaga'].'');
    }
} else {
    $_SESSION['erro'] = 'Algum campo não foi preenchido ou escolhido.';
    header('Location: ../visao/editarVaga.php?id='.$_REQUEST['idVaga'].'');
}