<?php
include("../model/banco.php");  

if (isset($_GET['id_cliente'])) {
    $id_cliente = intval($_GET['id_cliente']);  
} else {
    echo "<div class='alert alert-danger text-center' role='alert'>
            <strong>Erro!</strong> ID do cliente não encontrado.
          </div>";
    exit;
}

$sql = "SELECT v.id_venda AS venda_id, v.valor AS valor_real, v.data, f.nome AS forma_pagamento
        FROM venda v
        INNER JOIN forma_pagamento f ON v.id_pagamento = f.id_pagamento
        WHERE v.id_cliente = ?";

if ($stmt = $conexao->prepare($sql)) {
    $stmt->bind_param("i", $id_cliente);  
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<table class='table table-striped table-hover'>";
        echo "<thead class='table-dark'><tr><th>ID da Venda</th><th>Valor</th><th>Data</th><th>Forma de Pagamento</th></tr></thead>";
        echo "<tbody>";
        while ($row = $result->fetch_object()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row->venda_id) . "</td>";
            echo "<td>R$ " . number_format(htmlspecialchars($row->valor_real), 2, ',', '.') . "</td>";
            echo "<td>" . htmlspecialchars(date("d/m/Y", strtotime($row->data))) . "</td>";
            echo "<td>" . htmlspecialchars($row->forma_pagamento) . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<div class='alert alert-danger text-center' role='alert'>
                <strong>Atenção!</strong> Nenhuma compra encontrada para este cliente.
              </div>";
    }

    $stmt->close(); 
} else {
    echo print "<div class='alert alert-danger' role='alert'>Não foram encontradas Compras desse cliente.</div>";
}
?>
