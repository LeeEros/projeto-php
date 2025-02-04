<?php
include_once '../model/model_email.php';
include_once '../model/banco.php';

switch (@$_REQUEST["page"]) {
    case "enviarEmail":
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = trim($_POST['titulo_promocao']);
            $conteudo = trim($_POST['conteudo_promocional']);

            if (empty($titulo) || empty($conteudo)) {
                echo "<script>alert('Título e conteúdo são obrigatórios.');</script>";
                
                exit;
            }

            $sucesso = enviarPromocoes($conexao, $titulo, $conteudo);

            if ($sucesso) {
                echo "<script>alert('Promoções enviadas com sucesso..');</script>";
                echo "<script>location.href='cliente.php?page=enviar_promocoes';</script>";;
            } else {
                echo  "<script>alert('Erro ao enviar promoções.');</script>";
            }
        }
        break;
    
    default:
        echo "<script>alert('Página inválidascript>";
        break;
}
?>