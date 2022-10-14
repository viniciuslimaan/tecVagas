<?php
include_once('../modelo/candidato.php');

$candidato = new Candidato();
$candidato->__set('idCandidato', $_SESSION['id']);

if ($candidato->listarVagasCandidatas()) {
    $resultado = $candidato->listarVagasCandidatas();

    for ($i = 0; $i < count($resultado); $i++) {
        echo '
        <tr>
            <td scope="row">'.$resultado[$i]['titulo'].'</td>
            <td class="text-right">
                <a class="botao botao-roxo botao-pequeno mx-1" href="../../vaga/visao/vaga.php?id='.$resultado[$i]['idVaga'].'" target="blank">
                    <i class="fas fa-desktop pr-2"></i>Vaga
                </a>
                <a class="botao botao-vermelho botao-pequeno mx-1" href="../../candidatar/controle/deixarVaga.php?id='.$resultado[$i]['idVaga'].'">
                    <i class="fas fa-power-off pr-2"></i>Cancelar
                </a>
            </td>
        </tr>';
    }
} else {
    echo '<p class="text-center">Você ainda não se candidatou a vaga alguma.</p>';
}