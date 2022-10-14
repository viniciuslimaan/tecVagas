<?php
include_once('../modelo/candidatar.php');

include_once('../../../arquivos/PHPMailer/PHPMailer.php');
include_once('../../../arquivos/PHPMailer/Exception.php');
include_once('../../../arquivos/PHPMailer/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
session_start();

if (isset($_COOKIE['nome']) && isset($_COOKIE['id'])) {
    $_SESSION['nome'] = $_COOKIE['nome'];
    $_SESSION['id'] = $_COOKIE['id'];
}

//Verifica se está logado
if (isset($_SESSION['nome']) && isset($_SESSION['id'])) {
    $candidatar = new Candidatar();
    $candidatar->__set('idCandidato', $_SESSION['id']);
    $candidatar->__set('idVaga', $_GET['id']);
    $candidatar->__set('data', date('Y/m/d H:i:s', time()));

    //Verifica se tem currículo
    include_once('../../candidato/modelo/candidato.php');

    $candidato = new Candidato();
    $candidato->__set('idCandidato', $_SESSION['id']);
    $resultado = $candidato->verificarCurriculo();

    if ($resultado['curriculo'] != 'semCurriculo') {
        //Executa a ação
        if ($candidatar->candidatarCandidato()) {
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

                $candidatar->enviarEmail();
                $resultado = $candidatar->enviarEmail();
                $email = utf8_encode($resultado[1]['email']);
                $nome = utf8_encode($resultado[1]['nome']);
                $mail->addAddress($email, $nome);
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                // Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Alguém se candidatou em sua vaga!';
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
                    Alguém se candidatou em sua vaga!<br>
                    Vaga <b>'.$resultado[0]['titulo'].'</b>.<br>
                    Veja todas as pessoas que se candidataram na sua vaga <a href="http://www.eteclins.com.br/tecvagas/sistema/empresa/visao/painel.php">clicando aqui</a>!</p>
                </div>
                ';
                $mail->AltBody = 'TecVagas: Alguém se candidatou em sua vaga! 
                Veja todas as pessoas que se candidataram na sua vaga http://www.eteclins.com.br/tecvagas/sistema/empresa/visao/painel.php';
                $mail->send();

                $_SESSION['msg'] = 'Candidatado com sucesso!';
                header('Location: ../../vaga/visao/vaga.php?id='.$_GET['id']);
            } catch (Exception $e) {
                $erro = "Aconteceu um erro, por favor, avise um administrador. ERRO: {$mail->ErrorInfo}";
                $_SESSION['erro'] = $erro;
                header('Location: ../../vaga/visao/vaga.php?id='.$_GET['id']);
            }
        } else {
            $_SESSION['erro'] = $candidatar->__get('erro');
            header('Location: ../../vaga/visao/vaga.php?id='.$_GET['id']);
        }
    } else {
        $_SESSION['erro'] = 'Você precisar adicionar seu currículo antes de se candidatar a uma vaga.';
        header('Location: ../../candidato/visao/curriculo.php');
    }
} else {
    $_SESSION['erro'] = 'Você precisar estar logado para se candidatar a uma vaga.';
    header('Location: ../../candidato/visao/login.php');
}