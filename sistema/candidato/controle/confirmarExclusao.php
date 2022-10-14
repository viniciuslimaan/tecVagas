<?php
include_once('../modelo/candidato.php');

$candidato = new Candidato();
$candidato->__set('idCandidato', $_GET['id']);

if ($candidato->verCandidato()){
    $resultado = $candidato->verCandidato();

    echo '
        <p>
            <i class="fas fa-exclamation-triangle pb-3" style="font-size: 2.5em;"></i><br>
            Tem certeza que deseja excluir o candidato <b>'.$resultado[0]['nome'].' '.$resultado[0]['sobrenome'].'</b>?<br>
        </p>
        <br>
        <a href="listarCandidato.php" class="botao botao-vermelho botao-grande"><i class="fas fa-times pr-1"></i>
            Cancelar</a>
        <a href="../controle/excluirCandidato.php?id='.$_GET['id'].'" class="botao botao-verde botao-grande mt-3 mt-md-0">
        <i class="fas fa-check pr-1"></i> Excluir</a>';
} else {
    $_SESSION['erro'] = 'Usuário não encontrado.';
}