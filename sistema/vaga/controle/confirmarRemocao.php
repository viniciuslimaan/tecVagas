<?php
include_once('../modelo/vaga.php');

$vaga = new Vaga();
$vaga->__set('idVaga', $_GET['id']);
$vaga->__set('idEmpresa', $_SESSION['idEmpresa']);

if ($vaga->verVaga()){
    $resultado = $vaga->verVaga();

    echo '
        <p>
            <i class="fas fa-exclamation-triangle pb-3" style="font-size: 2.5em;"></i><br>
            Tem certeza que deseja excluir a vaga <b>'.$resultado[0]['titulo'].'</b>?<br>
        </p>
        <p style="font-size: 1.3em;">
            <small>* Se fizer isso, todos os candidatos cadastrados na sua vaga irão ser excluidos juntos.<br>
            Sugerimos que apenas desative a vaga. *</small>
        </p>
        <br>
        <a href="../../empresa/visao/painel.php" class="botao botao-vermelho botao-grande"><i class="fas fa-times pr-1"></i>
            Cancelar</a>
        <a href="../controle/removerVaga.php?id='.$_GET['id'].'" class="botao botao-verde botao-grande mt-3 mt-md-0">
        <i class="fas fa-check pr-1"></i> Excluir</a>';
} else {
    $_SESSION['erro'] = 'Vaga não encontrada.';
}
