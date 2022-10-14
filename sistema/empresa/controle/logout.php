<?php
session_start();
session_destroy();
unset($_COOKIE['nomeEmpresa']);
unset($_COOKIE['idEmpresa']);
setcookie('nomeEmpresa', null, -1, '/');
setcookie('idEmpresa', null, -1, '/');
header('Location: ../visao/login.php');