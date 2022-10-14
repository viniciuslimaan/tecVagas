<?php
include_once('../modelo/candidato.php');

if (!empty($_REQUEST['nome']) && 
    !empty($_REQUEST['sobrenome']) && 
    !empty($_REQUEST['email']) && 
    !empty($_REQUEST['telefone']) && 
    !empty($_REQUEST['cidade']) && 
    !empty($_REQUEST['cep'])) {

    $candidato = new Candidato ();
    $candidato->__set('idCandidato', $_REQUEST['idCandidato']);
    $candidato->__set('nome', $_REQUEST['nome']);
    $candidato->__set('sobrenome', $_REQUEST['sobrenome']);
    $candidato->__set('email', $_REQUEST['email']);
    $candidato->__set('telefone', $_REQUEST['telefone']);
    $candidato->__set('cidade', $_REQUEST['cidade']);
    $candidato->__set('cep', $_REQUEST['cep']);
    $candidato->__set('sexo', $_REQUEST['sexo']);
    $candidato->__set('relacaoEtec', $_REQUEST['relacaoEtec']);
    if (isset($_REQUEST['deseja'])) {
        $candidato->__set('deseja', 's');
    } else {
        $candidato->__set('deseja', 'n');
    }

    if ($candidato->editarCandidato()) {
        header('Location: ../visao/listarCandidato.php');
    } else {
        $_SESSION['erro'] = $candidato->__get('erro');
        header('Location: ../visao/editarCandidato.php?id='.$_REQUEST['idCandidato'].'');
    }
} else {
    $_SESSION['erro'] = 'Algum campo não foi preenchido ou escolhido.';
    header('Location: ../visao/editarCandidato.php?id='.$_REQUEST['idCandidato'].'');
}