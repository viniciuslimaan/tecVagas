<?php
session_start();

if (isset($_COOKIE['nomeEmpresa']) && isset($_COOKIE['idEmpresa'])) {
    $_SESSION['nomeEmpresa'] = $_COOKIE['nomeEmpresa'];
    $_SESSION['idEmpresa'] = $_COOKIE['idEmpresa'];
}

if (empty($_SESSION['nomeEmpresa'] && $_SESSION['idEmpresa'])) {
    header('Location: ../visao/login.php');
}