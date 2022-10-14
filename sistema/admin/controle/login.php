<?php
include_once('../modelo/admin.php');
session_start();

//SQL injection
foreach($_REQUEST as $dado => $valor) {
    $_REQUEST[$dado] = addslashes($_REQUEST[$dado]);
}

$admin = new Admin();
$admin->__set('login', $_REQUEST['login']);
$admin->__set('senha', md5($_REQUEST['senha']));

if ($admin->logar() > 0) {
    $resultado = $admin->logar();
    if (isset($_POST['permanecerConectado'])) {
        $_SESSION['idAdmin'] = $resultado['idAdmin'];
        $_SESSION['loginAdmin'] = $resultado['login'];
        $tempo = time() + 60 + 60 + 24 + 30;
        setcookie('idAdmin', $resultado['idAdmin'], $tempo, '/');
        setcookie('loginAdmin', $resultado['login'], $tempo, '/');
        header('Location: ../visao/painel.php');
    } else {
        $_SESSION['idAdmin'] = $resultado['idAdmin'];
        $_SESSION['loginAdmin'] = $resultado['login'];
        header('Location: ../visao/painel.php');
    }
} else {
    $_SESSION['erro'] = 'Login ou Senha inválidos.';
    header('Location: ../../../admin.php');
}
