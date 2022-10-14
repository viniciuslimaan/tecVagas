<?php
include_once('../modelo/vaga.php');

$vaga = new Vaga();
$vaga->__set('idVaga', $_GET['id']);
$vaga->__set('idEmpresa', $_SESSION['idEmpresa']);

if ($vaga->verVaga()) {
    $resultado = $vaga->verVaga();

    echo '
    <div class="bg-white rounded shadow-lg p-5">
        <h3>Editando a vaga <b>'.$resultado[0]['titulo'].'</b></h3>
        <form action="../controle/editarVaga.php" method="post">
            <div class="form-row">
                <div class="form-group col-12 col-md-12">
                    <label for="txtTitulo">Título</label>
                    <input id="txtTitulo" class="form-control" type="text" name="titulo" 
                    value="'.$resultado[0]['titulo'].'" maxlength="50" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="txtContrato">Tipo de Contrato</label>
                    <input id="txtContrato" class="form-control" type="text" name="tipoContrato" 
                    maxlength="30" value="'.$resultado[0]['tipoContrato'].'" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="txtJornada">Jornada</label>
                    <input id="txtJornada" class="form-control" type="text" name="jornada" 
                    maxlength="50" value="'.$resultado[0]['jornada'].'" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-12">
                    <label for="txtRequisitos">Pré-Requisitos</label>
                    <textarea rows="4" class="form-control" id="txtRequisitos"
                    maxlength="500" name="preRequisitos" required>'.$resultado[0]['preRequisitos'].'</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-12">
                    <label for="txtDescricao">Descrição</label>
                    <textarea rows="4" class="form-control" id="txtDescricao"
                    maxlength="500" name="descricao" required>'.$resultado[0]['descricao'].'</textarea>
                </div>
            </div>
            <input type="hidden" value="'.$resultado[0]['idVaga'].'" name="idVaga">
            <input type="hidden" value="'.$resultado[0]['idEmpresa'].'" name="idEmpresa">
            <div class="text-center">
                <a href="../../empresa/visao/painel.php" class="botao botao-vermelho botao-grande"><i
                        class="fas fa-times pr-1"></i>
                    Cancelar</a>
                <button type="submit" class="botao botao-verde mt-3 mt-md-0"><i class="fas fa-check pr-1"></i>
                    Salvar</button>
            </div>
        </form>
    </div>';
} else {
    $_SESSION['erro'] = 'Vaga não encontrada.';
}