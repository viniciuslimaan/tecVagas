<?php
include_once('../modelo/empresa.php');

$empresa = new Empresa();

if ($empresa->listarEmpresa()) {
    $resultado = $empresa->listarEmpresa();
    for ($i = count($resultado)-1; $i >= 0; $i--){
        if ($resultado[$i]['empresaParceira'] == 's') {
            $empresaParceira = 'Sim';
        } else {
            $empresaParceira = 'Não';
        }
        echo '
        <tr>
            <td scope="row">'.$resultado[$i]['nome'].'</td>
            <td>'.$resultado[$i]['cidade'].'</td>
            <td>'.$empresaParceira.'</td>
            <td>
                <a href="verEmpresa.php?id='.$resultado[$i]['idEmpresa'].'" class="botao botao-azul botao-pequeno"><i
                class="fas fa-eye"></i></a>
                <a href="editarEmpresa.php?id='.$resultado[$i]['idEmpresa'].'" class="botao botao-amarelo botao-pequeno"><i
                class="fas fa-wrench"></i></a>
                <a href="excluirEmpresa.php?id='.$resultado[$i]['idEmpresa'].'" class="botao botao-vermelho botao-pequeno"><i
                class="fas fa-trash"></i></a>
                <a href="perfilEmpresa.php?id='.$resultado[$i]['idEmpresa'].'" class="botao botao-roxo botao-pequeno" target="_blank"><i
                class="fas fa-desktop"></i></a>
            </td>
        </tr>';
    }
} else {
    $_SESSION['erro'] = 'Nenhuma empresa foi cadastrada ainda.';
}