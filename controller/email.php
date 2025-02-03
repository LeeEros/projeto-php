<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function getClientesParaPromocoes($conexao)
{
    $clientes = [];
    $sql = "SELECT nome, email FROM clientes WHERE recebe_email = 1";

    $result = mysqli_query($conexao, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $clientes[$row['email']] = $row['nome'];
    }

    return $clientes;
}

function enviarPromocoes($conexao, $conteudo)
{
    $clientes = getClientesParaPromocoes($conexao);
    if (empty($clientes)) {
        return false;
    }

    foreach ($clientes as $email => $nome) {
        $mail = new PHPMailer(true);
        
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'testetestephp@gmail.com'; 
            $mail->Password = '@testePHP25'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            
            $mail->setFrom('alebrante.kayane22@gmail.com', 'Nome da Empresa');
            $mail->addAddress($email, $nome);
            $mail->isHTML(true);
            $mail->Subject = 'Promoção Exclusiva para Você!';
            $mail->Body = str_replace('{{nome}}', $nome, $conteudo);
            $mail->AltBody = strip_tags($mail->Body);
            
            $mail->send();
        } catch (Exception $e) {
            error_log("Erro ao enviar e-mail para $email: " . $mail->ErrorInfo);
        }
    }

    return true;
}