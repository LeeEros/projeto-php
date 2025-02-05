<?php

function atualizarStatusParcelas($conexao) {
    $data_atual = date('Y-m-d');

    $sql = "UPDATE parcela 
            SET confirma_pagamento = 0 
            WHERE data_vencimento < ? AND confirma_pagamento IS NULL";

    $stmt = $conexao->prepare($sql);
    if (!$stmt) {
        die(json_encode(["status" => "error", "message" => "Erro ao preparar a consulta: " . $conexao->error]));
    }
    $stmt->bind_param("s", $data_atual);
    if (!$stmt->execute()) {
        die(json_encode(["status" => "error", "message" => "Erro ao atualizar status: " . $stmt->error]));
    }
    $stmt->close();

    $sql = "UPDATE parcela 
            SET confirma_pagamento = 1 
            WHERE data_pagamento IS NOT NULL";

    if (!$conexao->query($sql)) {
        die(json_encode(["status" => "error", "message" => "Erro ao atualizar status: " . $conexao->error]));
    }
}

function listarParcelas($conexao, $status = null) {
    $sql = "SELECT p.id_parcela, c.nome as cliente_nome, f.nome as forma_pagamento_nome, 
                   p.valor_parcela, p.data_vencimento, p.data_pagamento, p.confirma_pagamento, 
                   (SELECT COUNT(*) FROM parcela WHERE id_cliente = p.id_cliente AND confirma_pagamento = 0) as parcelas_restantes,
                   DATEDIFF(CURDATE(), p.data_vencimento) as dias_atraso
            FROM parcela p
            JOIN cliente c ON p.id_cliente = c.id_cliente
            JOIN forma_pagamento f ON p.id_pagamento = f.id_pagamento";

    if ($status !== null) {
        $sql .= " WHERE p.confirma_pagamento = ?";
    }

    $stmt = $conexao->prepare($sql);
    if (!$stmt) {
        die(json_encode(["status" => "error", "message" => "Erro ao preparar a consulta: " . $conexao->error]));
    }

    if ($status !== null) {
        $status_param = ($status == 'pago') ? 1 : 0;
        $stmt->bind_param("i", $status_param);
    }

    if (!$stmt->execute()) {
        die(json_encode(["status" => "error", "message" => "Erro ao executar a consulta: " . $stmt->error]));
    }

    $result = $stmt->get_result();
    $parcelas = [];

    while ($row = $result->fetch_assoc()) {
        $parcelas[] = $row;
    }

    $stmt->close();
    return $parcelas;
}

?>