<?php
include_once('../modelo/empresa.php');
session_start();

if (!empty($_POST['email']) && !empty($_POST['senha'])) {
    if (isset($_SESSION['nome']) && 
    isset($_SESSION['id']) || 
    isset($_COOKIE['nome']) && 
    isset($_COOKIE['id'])) {
        $_SESSION['erro'] = 'Primeiro, você precisa sair da conta do candidato.';
        header('Location: ../visao/login.php');
    } else {
        $empresa = new Empresa();
        $empresa->__set('email', $_POST['email']);
        $empresa->__set('senha', md5($_POST['senha']));
    
        if ($empresa->logar() > 0) {
            $resultado = $empresa->logar();
            $nome = $resultado[0]['nome'];
            $id = $resultado[0]['idEmpresa'];
            if (isset($_POST['permanecerConectado'])) {
                $_SESSION['nomeEmpresa'] = $nome;
                $_SESSION['idEmpresa'] = $id;
                $tempo = time() + 60 + 60 + 24 + 30;
                setcookie('nomeEmpresa', $nome, $tempo, '/');
                setcookie('idEmpresa', $id, $tempo, '/');
                header('Location: ../visao/painel.php');
            } else {
                $_SESSION['nomeEmpresa'] = $nome;
                $_SESSION['idEmpresa'] = $id;
                header('Location: ../visao/painel.php');
            }
        } else {
            $_SESSION['erro'] = 'E-mail ou Senha incorretos.';
            header('Location: ../visao/login.php');
        }
    }
} else {
    $_SESSION['erro'] = 'Algum campo não foi preenchido.';
    header('Location: ../visao/login.php');
}