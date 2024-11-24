<?php

function excluirVendasRelacionadas($conexao, $id_cliente) {
    $sql = "DELETE FROM venda WHERE id_cliente = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id_cliente);
    return $stmt->execute();
}

function excluirCliente($conexao, $id_cliente) {
    excluirVendasRelacionadas($conexao, $id_cliente);
    $sql = "DELETE FROM cliente WHERE id_cliente = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id_cliente);
    return $stmt->execute();
}

function salvarCliente($conexao, $cpf, $nome, $telefone, $score, $data_nascimento, $limite_credito, $email, $recebe_whatsapp, $recebe_email, $recebe_sms, $id = null) {
    if ($id) {
        $sql = "UPDATE cliente SET cpf = ?, nome = ?, telefone = ?, score = ?, data_nascimento = ?, limite_credito = ?, email = ?, recebe_whatsapp = ?, recebe_email = ?, recebe_sms = ? WHERE id_cliente = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ssssssssssi", $cpf, $nome, $telefone, $score, $data_nascimento, $limite_credito, $email, $recebe_whatsapp, $recebe_email, $recebe_sms, $id);
    } else {
        $sql = "INSERT INTO cliente (cpf, nome, telefone, score, data_nascimento, limite_credito, email, recebe_whatsapp, recebe_email, recebe_sms) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ssssssssss", $cpf, $nome, $telefone, $score, $data_nascimento, $limite_credito, $email, $recebe_whatsapp, $recebe_email, $recebe_sms);
    }
    return $stmt->execute();
}

function getCliente($conexao, $id_cliente) {
    $sql = "SELECT * FROM cliente WHERE id_cliente = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('i', $id_cliente);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc(); 
}

function listarClientes($conexao) {
    $sql = "SELECT * FROM cliente";
    $result = $conexao->query($sql);
    $clientes = [];
    while ($row = $result->fetch_assoc()) {
        $clientes[] = $row;
    }
    return $clientes;
}

function getHistoricoCompras($conexao, $id_cliente) {
    $sql = "SELECT * FROM venda WHERE id_cliente = ?";
    $stmt = $conexao->prepare($sql);    
    if ($stmt === false) {
        die('Erro na preparação da query: ' . $conexao->error);
    }
    $stmt->bind_param("i", $id_cliente);
    $stmt->execute();
    
    $result = $stmt->get_result();
    return $result;
}
?>
