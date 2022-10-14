<?php
include_once('../modelo/candidato.php');

$candidato = new Candidato();
$candidato->__set('idCandidato', $_GET['id']);

if ($candidato->excluirCandidato()) {
    header('Location: ../visao/listarCandidato.php');
} else {
    $_SESSION['erro'] = 'Ocorreu um erro ao tentar excluir o candidato.';
    header('Location: ../visao/excluirCandidato.php?'.$_GET['id'].'');
}