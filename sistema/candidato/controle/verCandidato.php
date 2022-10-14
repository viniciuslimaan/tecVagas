<?php
include_once('../modelo/candidato.php');

$candidato = new Candidato();
$candidato->__set('idCandidato', $_GET['id']);

if ($candidato->verCandidato()) {
    $resultado = $candidato->verCandidato();

    // Sexo
    if ($resultado[0]['sexo'] == 'm') {
        $sexo = 'Masculino';
    } else if ($resultado[0]['sexo'] == 'f') {
        $sexo = 'Feminino';
    } else {
        $sexo = 'Não definido';
    }

    // Relação com a Etec
    if (($resultado[0]['relacaoEtec'] == 'aluno')) {
        $relacao = 'Aluno';
    } else if ($resultado[0]['relacaoEtec'] == 'ex_aluno') {
        $relacao = 'Ex aluno';
    } else if ($resultado[0]['relacaoEtec'] == 'nenhuma') {
        $relacao = 'Nenhuma';
    } else {
        $relacao = 'Não definido';
    }

    // Curriculo
    if ($resultado[0]['curriculo'] == 'semCurriculo') {
        $curriculo = 'Não adicionado';
    } else {
        $curriculo = '<a href="../curriculos/'.$resultado[0]['curriculo'].'" target="blank">Abrir</a>';
    }

    // Deseja receber email
    if ($resultado[0]['deseja'] == 's') {
        $deseja = 'Sim';
    } else if ($resultado[0]['deseja'] == 'n') {
        $deseja = 'Não';
    } else {
        $deseja = 'Não definido';
    }

    echo '
    <div class="bg-white rounded shadow-lg p-5">
        <h3>Dados do candidato <b>'.$resultado[0]['nome'].' '.$resultado[0]['sobrenome'].'</b></h3>
        <p><b>Nome:</b> '.$resultado[0]['nome'].' '.$resultado[0]['sobrenome'].'</p>
        <p><b>E-mail:</b> '.$resultado[0]['email'].'</p>
        <p><b>Telefone:</b> '.$resultado[0]['telefone'].'</p>
        <p><b>Cidade:</b> '.$resultado[0]['cidade'].'</p>
        <p><b>CEP:</b> '.$resultado[0]['cep'].'</p>
        <p><b>Sexo:</b> '.$sexo.'</p>
        <p><b>Relação com a Etec:</b> '.$relacao.'</p>
        <p><b>Currículo:</b> '.$curriculo.'</p>
        <p><b>Deseja receber e-mail das vagas:</b> '.$deseja.'</p>
        <br>
        <a href="listarCandidato.php" class="botao botao-roxo"><i class="fas fa-reply pr-1"></i> Voltar</a>
    </div>';
} else {
    $_SESSION['erro'] = 'Candidato não encontrado.';
}