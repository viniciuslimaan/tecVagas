<?php
session_start();

if (isset($_COOKIE['nome']) && isset($_COOKIE['id'])) {
    $_SESSION['nome'] = $_COOKIE['nome'];
    $_SESSION['id'] = $_COOKIE['id'];
}

if (empty($_SESSION['nome'] && $_SESSION['id'])) {
    header('Location: ../visao/login.php');
}