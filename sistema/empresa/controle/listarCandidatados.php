<?php
include_once('../modelo/empresa.php');

$empresa = new Empresa();
$empresa->__set('idEmpresa', $_SESSION['idEmpresa']);

if ($empresa->listarCandidatados()) {
    $resultado = $empresa->listarCandidatados();

    for ($i = 0; $i < count($resultado); $i++) {
        echo '
        <tr>
            <td scope="row">'.$resultado[$i]['nome'].' '.$resultado[$i]['sobrenome'].'</td>
            <td>'.$resultado[$i]['titulo'].'</td>
            <td>
                <a class="botao botao-roxo botao-pequeno btn-block" href="dadosCandidato.php?id='.$resultado[$i]['idCandidato'].'">
                    <i class="fas fa-user pr-2"></i> Dados
                </a>
            </td>
        </tr>';
    }
} else {
    echo '<p class="text-center">Ninguém se candidatou em suas vagas ainda.</p>';
}