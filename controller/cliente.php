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
        $id = intval($_REQUEST['id']);
        $cliente = getCliente($conexao, $id); 
        include("../view/visualizar_cliente.php");
        break;

    case "salvar":
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $score = $_POST['score'];
        $data_nascimento = $_POST['data_nascimento'];
        $limite_credito = $_POST['limite_credito'];
        $email = $_POST['email'];
        $recebe_whatsapp = isset($_POST['recebe_whatsapp']) ? 1 : 0;
        $recebe_email = isset($_POST['recebe_email']) ? 1 : 0;
        $recebe_sms = isset($_POST['recebe_sms']) ? 1 : 0;

    
        $id = isset($_POST['id']) && !empty($_POST['id']) ? intval($_POST['id']) : null;


        if (salvarCliente($conexao, $cpf, $nome, $telefone, $score, $data_nascimento, $limite_credito, $email, $recebe_whatsapp, $recebe_email, $recebe_sms, $id)) {
            echo "<script>alert('Cliente " . ($id ? "atualizado" : "cadastrado") . " com sucesso!');</script>";
        } else {
            echo "<script>alert('Não foi possível " . ($id ? "atualizar" : "cadastrar") . " o cliente.');</script>";
        }
        echo "<script>location.href='?page=listar';</script>";
        break;

    case "editar":
        $id = intval($_REQUEST['id']);
        $cliente = getCliente($conexao, $id); 
        include("../view/editar_cliente.php");
        break;

    case "excluir":
        $id = intval($_REQUEST['id']);
        if (excluirCliente($conexao, $id)) {
            echo "<script>alert('Cliente excluído com sucesso!');</script>";
        } else {
            echo "<script>alert('Não foi possível excluir o cliente.');</script>";
        }
        echo "<script>location.href='?page=listar';</script>";
        break;

    default:
        include("../view/cadastrar_cliente.php"); 
        break;
}
?>