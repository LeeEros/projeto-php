<?php
include_once '../controller/email.php';
include_once '../model/banco.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conteudo = trim($_POST['conteudo_promocional']);
    
    if (empty($conteudo)) {
        header("Location: ../view/enviar_promocoes.php?status=erro");
        exit;
    }
    
    if (enviarPromocoes($conexao, $conteudo)) {
        header("Location: ../view/enviar_promocoes.php?status=sucesso");
    } else {
        header("Location: ../view/enviar_promocoes.php?status=erro");
    }
}
?>
