<?php
require_once '../vendor/autoload.php';

use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;

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
    $apiKey = 'mlsn.dc6f160e86c1db181a6f75c1c47e8141e9c934f8db1f9b2be7a7eb1a3c8a0d3a';
    $mailersend = new MailerSend(['api_key' => $apiKey]);

    $clientes = getClientesParaPromocoes($conexao);
    if (empty($clientes)) {
        return false;
    }

    foreach ($clientes as $email => $nome) {
        $emailConteudo = str_replace('{{nome}}', $nome, $conteudo);
        $recipients = [new Recipient($email, $nome)];

        $emailParams = (new EmailParams())
            ->setFrom('20220008550@estudantes.ifpr.edu.br')
            ->setFromName('Nome da Empresa')
            ->setRecipients($recipients)
            ->setSubject('Promoção Exclusiva para Você!')
            ->setHtml($emailConteudo)
            ->setText(strip_tags($emailConteudo));

        try {
            $mailersend->email->send($emailParams);
        } catch (Exception $e) {
            error_log("Erro ao enviar e-mail para $email: " . $e->getMessage());
        }
    }

    return true;
}
?>
