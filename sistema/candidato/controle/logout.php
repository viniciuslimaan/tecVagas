<?php
session_start();
session_destroy();
unset($_COOKIE['nome']);
unset($_COOKIE['id']);
setcookie('nome', null, -1, '/');
setcookie('id', null, -1, '/');
header('Location: ../visao/login.php');