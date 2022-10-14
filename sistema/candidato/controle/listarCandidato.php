<?php
include_once('../modelo/candidato.php');

$candidato = new Candidato();

if ($candidato->listarCandidato()) {
    $resultado = $candidato->listarCandidato();
    for ($i = 0; $i < count($resultado); $i++){
        echo '
        <tr>
        <td scope="row">'.$resultado[$i]['nome'].' '.$resultado[$i]['sobrenome'].'</td>
        <td>'.$resultado[$i]['email'].'</td>
        <td>'.$resultado[$i]['cidade'].'</td>
        <td>
        <a href="verCandidato.php?id='.$resultado[$i]['idCandidato'].'" class="botao botao-azul botao-pequeno"><i
        class="fas fa-eye"></i></a>
        <a href="editarCandidato.php?id='.$resultado[$i]['idCandidato'].'" class="botao botao-amarelo botao-pequeno"><i
        class="fas fa-wrench"></i></a>
        <a href="excluirCandidato.php?id='.$resultado[$i]['idCandidato'].'" class="botao botao-vermelho botao-pequeno"><i
        class="fas fa-trash"></i></a>
        </td>
        </tr>';
    }
} else {
    $_SESSION['erro'] = 'Nenhum candidato foi cadastrado ainda.';
}