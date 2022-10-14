<?php
include_once('../modelo/candidato.php');
session_start();

//SQL injection
foreach($_REQUEST as $dado => $valor) {
    $_REQUEST[$dado] = addslashes($_REQUEST[$dado]);
}

if (!empty($_REQUEST['email']) && !empty($_REQUEST['senha'])) {
    if (isset($_SESSION['nomeEmpresa']) && 
    isset($_SESSION['idEmpresa']) || 
    isset($_COOKIE['nomeEmpresa']) && 
    isset($_COOKIE['idEmpresa'])) {
        $_SESSION['erro'] = 'Primeiro, você precisa sair da conta da empresa.';
        header('Location: ../visao/login.php');
    } else {
        $candidato = new Candidato();
        $candidato->__set('email', $_REQUEST['email']);
        $candidato->__set('senha', md5($_REQUEST['senha']));
        
        if ($candidato->logar() > 0) {
            $resultado = $candidato->logar();
            $nome = $resultado[0]['nome'].' '.$resultado[0]['sobrenome'];
            $id = $resultado[0]['idCandidato'];
            if (isset($_REQUEST['permanecerConectado'])) {
                $_SESSION['nome'] = $nome;
                $_SESSION['id'] = $id;
                $tempo = time() + 60 + 60 + 24 + 30;
                setcookie('nome', $nome, $tempo, '/');
                setcookie('id', $id, $tempo, '/');
                header('Location: ../visao/painel.php');
            } else {
                $_SESSION['nome'] = $nome;
                $_SESSION['id'] = $id;
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