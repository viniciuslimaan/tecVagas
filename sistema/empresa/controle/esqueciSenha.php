<?php
include_once('../modelo/empresa.php');

include_once('../../../arquivos/PHPMailer/PHPMailer.php');
include_once('../../../arquivos/PHPMailer/Exception.php');
include_once('../../../arquivos/PHPMailer/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
session_start();

if (!empty($_REQUEST['email'])) {
    $empresa = new Empresa();
    $empresa->__set('email', $_REQUEST['email']);

    if ($empresa->esqueciSenha()) {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = false;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = $_ENV['MAIL_USERNAME'];                     // SMTP username
            $mail->Password   = $_ENV['MAIL_PASS'];                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->CharSet = 'UTF-8';

            //Recipients
            $mail->setFrom($_ENV['MAIL_USERNAME'], 'TecVagas');

            $email = $_REQUEST['email'];
            $mail->addAddress($email);
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Pedido de alteração de senha';
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
                Você solicitou a troca de sua senha.<br>
                Sua nova senha é <b>'.$empresa->__get('senha').'</b>.<br>
            </div>
            ';
            $mail->AltBody = 'TecVagas: Você solicitou a troca de sua senha. 
            Sua nova senha é <b>'.$empresa->__get('senha').'';
            $mail->send();

            $_SESSION['msg'] = 'Pronto! Enviamos uma nova senha a seu e-mail.';
            header('Location: ../visao/login.php');
        } catch (Exception $e) {
            echo "Aconteceu um erro, por favor, avise um administrador. ERRO: {$mail->ErrorInfo}";
        }
    } else {
        $_SESSION['erro'] = $empresa->__get('erro');
        header('Location: ../visao/esqueciSenha.php');
    }
} else {
    $_SESSION['erro'] = 'Você precisa informar o seu e-mail.';
    header('Location: ../visao/esqueciSenha.php');
}