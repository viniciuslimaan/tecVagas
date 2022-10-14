<?php
include_once('../modelo/vaga.php');

include_once('../../../arquivos/PHPMailer/PHPMailer.php');
include_once('../../../arquivos/PHPMailer/Exception.php');
include_once('../../../arquivos/PHPMailer/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
session_start();

//SQL injection
foreach($_REQUEST as $dado => $valor) {
    $_REQUEST[$dado] = addslashes($_REQUEST[$dado]);
}

if (!empty($_REQUEST['titulo']) && 
    !empty($_REQUEST['tipoContrato']) && 
    !empty($_REQUEST['jornada']) && 
    !empty($_REQUEST['preRequisitos']) && 
    !empty($_REQUEST['descricao'])) {

    $vaga = new Vaga();
    $vaga->__set('titulo', $_REQUEST['titulo']);
    $vaga->__set('tipoContrato', $_REQUEST['tipoContrato']);
    $vaga->__set('jornada', $_REQUEST['jornada']);
    $vaga->__set('preRequisitos', $_REQUEST['preRequisitos']);
    $vaga->__set('descricao', $_REQUEST['descricao']);
    $vaga->__set('ativo', 's');
    $vaga->__set('idEmpresa', $_REQUEST['idEmpresa']);
    
    if ($vaga->adicionarVaga()) {
        try {
            $mail = new PHPMailer(true);

            //Server settings
            $mail->SMTPDebug = false;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = $_ENV['MAIL_USERNAME'];           // SMTP username
            $mail->Password   = $_ENV['MAIL_PASS'];                         // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->CharSet = 'UTF-8';
        
            //Recipients
            $mail->setFrom($_ENV['MAIL_USERNAME'], 'TecVagas');
        
            if ($vaga->receberVaga()) {
                $resultado = $vaga->receberVaga();
                for ($i = 0; $i < count($resultado); $i++) {
                    $email = $resultado[$i]['email'];
                    $nome = $resultado[$i]['nome'].' '.$resultado[$i]['sobrenome'];
                    $mail->addAddress($email, $nome);
                }
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');
            
                // Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            
                // Content
                $mail->isHTML(true);                                    // Set email format to HTML
                $mail->Subject = '[VAGA] '.$_REQUEST['titulo'];
                $mail->Body    = '
                <style>
                @import url("https://fonts.googleapis.com/css?family=Questrial&display=swap");
                * {
                    font-family: Questrial, sans-serif;
                    text-align: center;
                }
                h3 {
                    font-size: 54px;
                    font-weight: bold;
                    color: #565C9E;
                }
                p {
                    font-size: 20px;
                    color: #212529;
                }
                .row {
                    padding: 8vh 0;
                }
                </style>
                <div class="row">
                    <h3>TecVagas</h3>
                    <p><small>Site de busca de <b>emprego</b> e <b>estágio</b>, totalmente gratuito em Lins e região!</small></p><br>
                    <p>Olá!<br>
                    Acabamos de receber uma vaga, e talvez possa te interessar.<br>
                    Vaga <b>'.$_REQUEST['titulo'].'</b>.<br>
                    Veja nossas vagas <a href="http://www.eteclins.com.br/tecvagas">clicando aqui</a>!</p>
                </div>
                ';
                $mail->AltBody = 'TecVagas: Acabamos de receber uma vaga, e talvez possa te interessar. 
                Veja nossas vagas em http://www.eteclins.com.br/tecvagas';
                $mail->send();

                header('Location: ../../empresa/visao/painel.php');
            } else {
                header('Location: ../../empresa/visao/painel.php');
            }
        } catch (Exception $e) {
            echo "Aconteceu um erro, por favor, avise um administrador. ERRO: {$mail->ErrorInfo}";
        }
    } else {
        $_SESSION['erro'] = $vaga->__get('erro');
        header('Location: ../visao/adicionarVaga.php');
    }
} else {
    $_SESSION['erro'] = 'Algum campo não foi preenchido ou escolhido.';
    header('Location: ../visao/adicionarVaga.php');
}