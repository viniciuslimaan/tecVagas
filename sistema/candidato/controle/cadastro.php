<?php
session_start();
include_once('../modelo/candidato.php');

//SQL injection
foreach($_REQUEST as $dado => $valor) {
    $_REQUEST[$dado] = addslashes($_REQUEST[$dado]);
}

// Verifica se tudo foi setado
if (!empty($_REQUEST['nome']) && 
    !empty($_REQUEST['sobrenome']) && 
    !empty($_REQUEST['email']) && 
    !empty($_REQUEST['senha']) && 
    !empty($_REQUEST['telefone']) && 
    !empty($_REQUEST['cidade']) && 
    !empty($_REQUEST['cep']) && 
    $_REQUEST['relacaoEtec'] != '' && 
    $_REQUEST['sexo'] != '') {

    // Setar os dados
    $candidato = new Candidato ();
    $candidato->__set('nome', $_REQUEST['nome']);
    $candidato->__set('sobrenome', $_REQUEST['sobrenome']);
    $candidato->__set('email', $_REQUEST['email']);
    $candidato->__set('senha', md5($_REQUEST['senha']));
    $candidato->__set('telefone', $_REQUEST['telefone']);
    $candidato->__set('cidade', $_REQUEST['cidade']);
    $candidato->__set('cep', $_REQUEST['cep']);
    $candidato->__set('sexo', $_REQUEST['sexo']);
    $candidato->__set('relacaoEtec', $_REQUEST['relacaoEtec']);
    $candidato->__set('curriculo', 'semCurriculo');
    if (isset($_REQUEST['deseja'])) {
        $candidato->__set('deseja', 's');
    } else {
        $candidato->__set('deseja', 'n');
    }

    // Verificar se funcionou
    if ($candidato->adicionarCandidato()) {
        $_SESSION['msg'] = 'Cadastro efetuado com sucesso!<br>Faça o login abaixo.';
        header('Location: ../visao/login.php');
    } else {
        $_SESSION['erro'] = $candidato->__get('erro');
        header('Location: ../visao/cadastro.php');
    }
} else {
    $_SESSION['erro'] = 'Algum campo não foi preenchido ou escolhido.';
    header('Location: ../visao/cadastro.php');
}
