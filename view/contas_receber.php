<?php

function atualizarStatusParcelas() {
    include '../model/banco.php';

    $data_atual = date('Y-m-d');

    $sql = "UPDATE parcela 
            SET confirma_pagamento = 0 
            WHERE data_vencimento < '$data_atual' AND confirma_pagamento IS NULL";
    $conexao->query($sql);


    $sql = "UPDATE parcela 
            SET confirma_pagamento = 1 
            WHERE data_pagamento IS NOT NULL";
    $conexao->query($sql);
}

function listarParcelas($conexao, $status = null) {
    $sql = "SELECT p.id_parcela, c.nome as cliente_nome, f.nome as forma_pagamento_nome, p.valor_parcela, p.data_vencimento, p.data_pagamento, p.confirma_pagamento, 
                   (SELECT COUNT(*) FROM parcela WHERE id_cliente = p.id_cliente AND confirma_pagamento = 0) as parcelas_restantes,
                   DATEDIFF(CURDATE(), p.data_vencimento) as dias_atraso
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
