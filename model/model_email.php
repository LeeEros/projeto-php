<?php
use Mailgun\Mailgun;
require '../vendor/autoload.php';

function enviarPromocoes($conexao,$titulo, $conteudo)
{
    $clientes = [];
    $sql = "SELECT nome, email FROM cliente WHERE recebe_email = 1";

    $result = mysqli_query($conexao, $sql);

    if (!$result) {
        error_log("Erro na consulta SQL: " . mysqli_error($conexao));
        return [];
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $clientes[$row['email']] = $row['nome'];
    }
        

    $mg = Mailgun::create('eb252d8691b330ecd28f23ffebdd6399-667818f5-339f527f');

    foreach ($clientes as $email => $nome) {
        $body = str_replace('{{nome}}', $nome, $conteudo);

        try {
            $result = $mg->messages()->send(
                'sandboxbe19c77e25ce4c38b0271ee53061e6cf.mailgun.org',
                [
                    'from' => 'Mailgun Sandbox <postmaster@sandboxbe19c77e25ce4c38b0271ee53061e6cf.mailgun.org>',
                    'to' => $email,
                    'subject' => $titulo,
                    'text' => $body
                ]
            );
            return true;
            
        } catch (Exception $e) {
            error_log("Erro ao enviar e-mail para $email: " . $e->getMessage());
            print "Erro ao enviar para $email: " . $e->getMessage(); 
            return false;
        }
    }
}

?>