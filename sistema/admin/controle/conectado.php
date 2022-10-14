<?php
session_start();

if (isset($_COOKIE['idAdmin']) && isset($_COOKIE['loginAdmin'])) {
    $_SESSION['idAdmin'] = $_COOKIE['idAdmin'];
    $_SESSION['loginAdmin'] = $_COOKIE['loginAdmin'];
}

if (!isset($_SESSION['idAdmin']) && !isset($_SESSION['loginAdmin'])) {
    header('Location: ../../../admin.php');
}