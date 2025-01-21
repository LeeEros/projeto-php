<?php
require_once '../vendor/autoload.php'; // Inclua o autoloader do Composer
use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;

class EmailController {
    private $mailerSend;

    public function __construct() {
        $this->mailerSend = new MailerSend(['api_key' => 'mlsn.dc6f160e86c1db181a6f75c1c47e8141e9c934f8db1f9b2be7a7eb1a3c8a0d3a']);
    }

    public function enviarEmailPromocional($conteudo, $destinatarios) {
        $recipients = [];
        foreach ($destinatarios as $destinatario) {
            $recipients[] = new Recipient($destinatario['email'], $destinatario['nome']);
        }

        $emailParams = (new EmailParams())
            ->setFrom('20220008550@estudantes.ifpr.edu.br')
            ->setFromName('Sua Empresa')
            ->setRecipients($recipients)
            ->setSubject('Promoção Especial para Você!')
            ->setHtml("<p>$conteudo</p>")
            ->setText(strip_tags($conteudo));

        try {
            $this->mailerSend->email->send($emailParams);
            return true;
        } catch (Exception $e) {
            return 'Erro ao enviar o e-mail: ' . $e->getMessage();
        }
    }
}
