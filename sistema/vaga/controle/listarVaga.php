<?php
include_once('../modelo/vaga.php');

$vaga = new Vaga();

if ($vaga->listarVaga()) {
    $resultado = $vaga->listarVaga();
    for ($i = 0; $i < count($resultado); $i++){
        if ($resultado[$i]['ativo'] == 's') {
            $status = '<span class="badge badge-success">Ativo</span>';
        } else {
            $status = '<span class="badge badge-danger">Desativado</span>';
        }
        echo '
        <tr>
            <td scope="row">'.$resultado[$i]['titulo'].'</td>
            <td>'.$status.'</td>
            <td>
                <a href="excluirVaga.php?idVaga='.$resultado[$i]['idVaga'].'&idEmpresa='.$resultado[$i]['idEmpresa'].'" 
                class="botao botao-vermelho botao-pequeno"><i class="fas fa-trash"></i></a>
                <a href="vaga.php?id='.$resultado[$i]['idEmpresa'].'" class="botao botao-roxo botao-pequeno" target="_blank"><i
                class="fas fa-desktop"></i></a>
            </td>
        </tr>';
    }
} else {
    $_SESSION['erro'] = 'Nenhuma empresa foi cadastrada ainda.';
}