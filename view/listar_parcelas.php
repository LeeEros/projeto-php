<?php include 'template.php'; ?>
<div class="container">

<?php
include_once '../model/banco.php';
include_once '../view/contas_receber.php';

$status = $_GET['status'] ?? null;
$parcelas = listarParcelas($conexao, $status);

$sql = "SELECT COUNT(*) as total_parcelas FROM parcela";
$res = $conexao->query($sql);
$row = $res->fetch_assoc();
$total_parcelas = $row['total_parcelas'];
?>

<?php if ($total_parcelas > 0): ?>
    <h2>Contas a Receber</h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Forma de Pagamento</th>
                <th>Valor</th>
                <th>Data de Vencimento</th>
                <th>Data de Pagamento</th>
                <th>Status</th>
                <th>Parcelas Restantes</th>
                <th>Dias de Atraso</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parcelas as $parcela): ?>
                <tr>
                    <td><?php echo $parcela['id_parcela']; ?></td>
                    <td><?php echo $parcela['cliente_nome']; ?></td>
                    <td><?php echo $parcela['forma_pagamento_nome']; ?></td>
                    <td><?php echo $parcela['valor_parcela']; ?></td>
                    <td><?php echo $parcela['data_vencimento']; ?></td>
                    <td><?php echo $parcela['data_pagamento']; ?></td>
                    <td><?php echo $parcela['confirma_pagamento'] ? 'Pago' : 'Atrasado'; ?></td>
                    <td><?php echo $parcela['parcelas_restantes']; ?></td>
                    <td><?php echo $parcela['confirma_pagamento'] ? 0 : $parcela['dias_atraso']; ?></td>
                    <td>
                        <a href="visualizar_parcela.php?id=<?php echo $parcela['id_parcela']; ?>" class="btn btn-info">Visualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="alert alert-danger" role="alert">Não foram encontradas parcelas.</div>
<?php endif; ?>
</div>