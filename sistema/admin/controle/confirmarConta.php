<?php
include_once('../modelo/admin.php');

$admin = new Admin();
$admin->__set('idAdmin', $_SESSION['idAdmin']);
$resultado = $admin->dadosConta();

echo '
    <div class="row justify-content-center" style="margin-top: 15%;">
        <div class="col-12 col-md-4" style="font-size: 20px;">
            <form action="../controle/editarConta.php" method="post">
                <div class="form-group">
                    <label for="txtLogin" style="margin-bottom: -5px;">Login</label>
                    <input id="txtLogin" class="form-control" type="text" name="login" value="'.$resultado['login'].'" required>
                </div>
                <div class="form-group">
                    <label for="txtSenha" style="margin-bottom: -5px;">Senha <small>(min. 8 caracteres)</small></label>
                    <input id="txtSenha" class="form-control" type="password" name="senha" minlength="8" required>
                </div>
                <button type="submit" class="botao botao-roxo btn-lg btn-block mb-3" style="font-size: 20px;">Salvar</button>
                <a class="botao botao-vermelho btn-lg btn-block" href="painel.php" style="font-size: 20px;">Cancelar</a>
            </form>
        </div>
    </div>';