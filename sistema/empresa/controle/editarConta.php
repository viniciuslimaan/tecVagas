<?php
include_once('../modelo/empresa.php');
session_start();

//SQL injection
foreach($_REQUEST as $dado => $valor) {
    $_REQUEST[$dado] = addslashes($_REQUEST[$dado]);
}

if (!empty($_REQUEST['nome']) && 
    !empty($_REQUEST['email']) && 
    !empty($_REQUEST['cnpj']) && 
    !empty($_REQUEST['telefone']) && 
    !empty($_REQUEST['cidade']) && 
    !empty($_REQUEST['localizacao']) && 
    !empty($_REQUEST['ramo']) && 
    !empty($_REQUEST['cep']) && 
    !empty($_REQUEST['descricao'])) {

    $empresa = new Empresa ();
    $empresa->__set('idEmpresa', $_REQUEST['idEmpresa']);
    $empresa->__set('nome', $_REQUEST['nome']);
    $empresa->__set('email', $_REQUEST['email']);
    $empresa->__set('cnpj', $_REQUEST['cnpj']);
    $empresa->__set('telefone', $_REQUEST['telefone']);
    $empresa->__set('cidade', $_REQUEST['cidade']);
    $empresa->__set('localizacao', $_REQUEST['localizacao']);
    $empresa->__set('ramo', $_REQUEST['ramo']);
    $empresa->__set('cep', $_REQUEST['cep']);
    $empresa->__set('descricao', $_REQUEST['descricao']);
    if (isset($_REQUEST['deseja'])) {
        $empresa->__set('deseja', 's');
    } else {
        $empresa->__set('deseja', 'n');
    }
    if (!empty($_FILES['logo']['name'])) {
        $extensao = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);

        if (in_array($extensao, array('jpg', 'jpeg', 'png'))) {
            $pasta = '../logos/';
            $logo = uniqid().'.'.$extensao;
            move_uploaded_file($_FILES['logo']['tmp_name'], $pasta.$logo);
            $empresa->__set('logo', $logo);
            if ($_REQUEST['logoVelha'] != 'semLogo.png') {
                unlink($pasta.$_REQUEST['logoVelha']);
            }
        } else {
            $_SESSION['erro'] = 'O formato da logo não foi aceito.';
            header('Location: ../visao/editarConta.php');
            exit();
        }
    } else {
        $empresa->__set('logo', $_REQUEST['logoVelha']);
    }

    if ($empresa->editarEmpresa()) {
        header('Location: ../visao/painel.php');
    } else {
        $_SESSION['erro'] = $empresa->__get('erro');
        header('Location: ../visao/editarConta.php');
    }
} else {
    $_SESSION['erro'] = 'Algum campo não foi preenchido ou escolhido.';
    header('Location: ../visao/editarConta.php');
}