<?php
include_once('../modelo/candidatar.php');
session_start();

$candidatar = new Candidatar();
$candidatar->__set('idCandidato', $_SESSION['id']);
$candidatar->__set('idVaga', $_GET['id']);
$candidatar->deixarVaga();
header('Location: ../../candidato/visao/painel.php');