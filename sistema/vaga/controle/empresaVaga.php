<?php
include_once('../../vaga/modelo/vaga.php');

$vaga = new Vaga();
$vaga->__set('idEmpresa', $_SESSION['idEmpresa']);
$resultado = $vaga->empresaVaga();

if (!is_null($resultado)) {
    for ($i = 0; $i < count($resultado); $i++){
        if ($resultado[$i]['ativo'] == 's') {
            $status = '<span class="badge badge-success">Ativo</span>';
            $ativo = '
            <a href="../../vaga/controle/desativarVaga.php?id='.$resultado[$i]['idVaga'].'" 
            class="botao botao-roxo btn-block px-5 py-2"><i class="fas fa-eye-slash pr-2"></i>Desativar</a>';
        } else {
            $status = '<span class="badge badge-danger">Desativado</span>';
            $ativo = '
            <a href="../../vaga/controle/ativarVaga.php?id='.$resultado[$i]['idVaga'].'" 
            class="botao botao-roxo btn-block px-5 py-2"><i class="fas fa-eye pr-2"></i>Ativar</a>';
        }
        echo '
        <div class="row mt-3">
            <!-- Esquerdo -->
            <div class="col-12 col-md-8 bg-white rounded shadow-sm p-3" style="font-size: 18px;">
                <h3 class="tituloVaga">'.$resultado[$i]['titulo'].'</h3>
                <hr class="mt-0">
                <h3 class="font-weight-bold">Pré-requisitos</h3>
                <p>'.nl2br($resultado[$i]['preRequisitos']).'</p>
                <hr>
                <h3 class="font-weight-bold">Descrição</h3>
                <p>'.nl2br($resultado[$i]['descricao']).'</p>
                <hr class="w-100 d-md-none d-lg-none mb-0">
            </div>
            <!-- Direito -->
            <div class="col-12 col-md-4 bg-white rounded shadow-sm p-3" style="font-size: 20px">
                <h3 class="font-weight-bold text-center" style="font-size: 1.6em;">Informações</h3>
                <p><b>Status:</b><br>'.$status.'</p>
                <p><b>Tipo de Contrato</b><br>'.$resultado[$i]['tipoContrato'].'</p>
                <p><b>Jornada</b><br>'.$resultado[$i]['jornada'].'</p>
                <!-- Ativar / Desativar Vaga -->
                '.$ativo.'
                <!-- Ver Vaga -->
                <a href="../../vaga/visao/vaga.php?id='.$resultado[$i]['idVaga'].'" 
                    class="botao botao-roxo btn-block px-5 py-2">
                    <i class="fas fa-desktop pr-2"></i>Ver
                </a>
                <!-- Editar Vaga -->
                <a href="../../vaga/visao/editarVaga.php?id='.$resultado[$i]['idVaga'].'" 
                    class="botao botao-roxo btn-block px-5 py-2">
                    <i class="fas fa-edit pr-2"></i>Editar
                </a>
                <!-- Excluir Vaga -->
                <a href="../../vaga/visao/removerVaga.php?id='.$resultado[$i]['idVaga'].'" 
                    class="botao botao-roxo btn-block px-5 py-2">
                    <i class="fas fa-trash-alt pr-2"></i>Excluir
                </a>
            </div>
        </div>
        ';
    }
} else {
    echo '
    <div class="row mt-3">
        <div class="col-12 bg-white shadow-sm p-5 text-center" style="font-size: 20px;">
            <p>Você não adicionou vagas ainda!</p>
            <p style="margin-top: -15px;">Adicione clicando no botão acima.</p>
        </div>
    </div>';
}