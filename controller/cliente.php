<?php
include("../model/banco.php");
include("../model/model_cliente.php");
include("../view/template.php");

switch (@$_REQUEST["page"]) {
    case "novo":
        include("../view/cadastrar_cliente.php");
        break;

    case "listar":
        include("../view/listar_cliente.php");
        break;

    case "visualizar":
        $id_cliente = intval($_REQUEST['id_cliente']);
        $cliente = getCliente($conexao, $id_cliente); 
        include("../view/visualizar_cliente.php");
        break;

    case "salvar":
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $score = intval($_POST['score']);
        $data_nascimento = $_POST['data_nascimento'];
        $limite_credito = floatval($_POST['limite_credito']);
        $email = $_POST['email'];
        $recebe_whatsapp = isset($_POST['recebe_whatsapp']) ? 1 : 0;
        $recebe_email = isset($_POST['recebe_email']) ? 1 : 0;
        $recebe_sms = isset($_POST['recebe_sms']) ? 1 : 0;

        $id_cliente = isset($_POST['id_cliente']) && !empty($_POST['id_cliente']) ? intval($_POST['id_cliente']) : null;

        if (salvarCliente($conexao, $cpf, $nome, $telefone, $score, $data_nascimento, $limite_credito, $email, $recebe_whatsapp, $recebe_email, $recebe_sms, $id_cliente)) {
            echo "<script>alert('Cliente " . ($id_cliente ? "atualizado" : "cadastrado") . " com sucesso!');</script>";
        } else {
            echo "<script>alert('Não foi possível " . ($id_cliente ? "atualizar" : "cadastrar") . " o cliente.');</script>";
        }
        echo "<script>location.href='?page=listar';</script>";
        break;

    case "editar":
        $id_cliente = intval($_REQUEST['id_cliente']);
        $cliente = getCliente($conexao, $id_cliente); 
        include("../view/editar_cliente.php");
        break;

    case "excluir":
        $id_cliente = intval($_REQUEST['id_cliente']);
        if (excluirCliente($conexao, $id_cliente)) {
            echo "<script>alert('Cliente excluído com sucesso!');</script>";
        } else {
            echo "<script>alert('Não foi possível excluir o cliente.');</script>";
        }
        echo "<script>location.href='?page=listar';</script>";
        break;

    case "visualizar_historico":
        $id_cliente = intval($_REQUEST['id_cliente']); 
        $historico_compras = getHistoricoCompras($conexao, $id_cliente);  
        include("../view/visualizar_historico.php"); 
        break;

    default:
        include("../view/cadastrar_cliente.php"); 
        break;
}
?>
