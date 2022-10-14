<?php
include_once('../modelo/empresa.php');

$empresa = new Empresa();
$empresa->__set('idEmpresa', $_GET['id']);

if ($empresa->verEmpresa()){
    $resultado = $empresa->verEmpresa();

    echo '
        <p>
            <i class="fas fa-exclamation-triangle pb-3" style="font-size: 2.5em;"></i><br>
            Tem certeza que deseja excluir a empresa <b>'.$resultado[0]['nome'].'</b>?<br>
        </p>
        <br>
        <a href="listarEmpresa.php" class="botao botao-vermelho botao-grande"><i class="fas fa-times pr-1"></i>
            Cancelar</a>
        <a href="../controle/excluirEmpresa.php?id='.$_GET['id'].'" class="botao botao-verde botao-grande mt-3 mt-md-0">
        <i class="fas fa-check pr-1"></i> Excluir</a>';
} else {
    $_SESSION['erro'] = 'Empresa não encontrada.';
}
