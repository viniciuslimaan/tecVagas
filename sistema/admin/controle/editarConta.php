<?php
include_once('../modelo/admin.php');
session_start();

//SQL injection
foreach($_REQUEST as $dado => $valor) {
    $_REQUEST[$dado] = addslashes($_REQUEST[$dado]);
}

if (isset($_REQUEST['login']) && isset($_REQUEST['senha'])) {
    $admin = new Admin();
    $admin->__set('login', $_REQUEST['login']);
    $admin->__set('senha', md5($_REQUEST['senha']));
    $admin->__set('idAdmin', $_SESSION['idAdmin']);

    if ($admin->editarConta()) {
        header('Location: ../visao/painel.php');
    } else {
        $_SESSION['erro'] = $admin->__get('erro');
        header('Location: ../visao/editarConta.php');
    }
} else {
    $_SESSION['erro'] = 'Algum campo não foi preenchido.';
    header('Location: ../visao/editarConta.php');
}