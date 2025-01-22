<?php

function atualizarStatusParcelas() {
    include '../model/banco.php';

    $data_atual = date('Y-m-d');

    // Atualizar status para "Atrasado" caso a data de vencimento tenha passado
    $sql = "UPDATE parcela 
            SET confirma_pagamento = 0 
            WHERE data_vencimento < '$data_atual' AND confirma_pagamento IS NULL";
    $conexao->query($sql);

    // Atualizar status para "Pago" caso a parcela tenha sido paga
    $sql = "UPDATE parcela 
            SET confirma_pagamento = 1 
            WHERE data_pagamento IS NOT NULL";
    $conexao->query($sql);
}

function listarParcelas($conexao, $status = null) {
    $sql = "SELECT p.id_parcela, c.nome as cliente_nome, f.nome as forma_pagamento_nome, p.valor_parcela, p.data_vencimento, p.data_pagamento, p.confirma_pagamento
            FROM parcela p
            JOIN cliente c ON p.id_cliente = c.id_cliente
            JOIN forma_pagamento f ON p.id_forma_pagamento = f.id_pagamento";
    
    if ($status !== null) {
        $sql .= " WHERE p.confirma_pagamento = " . ($status == 'pago' ? 1 : 0);
    }

    $res = $conexao->query($sql);
    $parcelas = [];

    while ($row = $res->fetch_assoc()) {
        $parcelas[] = $row;
    }

    return $parcelas;
}
?>
