<?php
session_start();
session_destroy();
unset($_COOKIE['idAdmin']);
unset($_COOKIE['loginAdmin']);
setcookie('idAdmin', null, -1, '/');
setcookie('loginAdmin', null, -1, '/');
header('Location: ../../../admin.php');