<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;

$mg = Mailgun::create('eb252d8691b330ecd28f23ffebdd6399-667818f5-339f527f');

try {
    $result = $mg->messages()->send(
        'sandboxbe19c77e25ce4c38b0271ee53061e6cf.mailgun.org',
        [
            'from' => 'Mailgun Sandbox <postmaster@sandboxbe19c77e25ce4c38b0271ee53061e6cf.mailgun.org>',
            'to' => 'Kayane Alebrante <20220008550@estudantes.ifpr.edu.br>',
            'subject' => 'Hello Kayane Alebrante',
            'text' => 'Congratulations Kayane Alebrante, you just sent an email with Mailgun! You are truly awesome!'
        ]
    );
    echo "✅ E-mail enviado com sucesso!";
} catch (Exception $e) {
    echo "❌ Erro ao enviar e-mail: " . $e->getMessage();
}
?>
