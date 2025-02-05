<?php 
include 'template.php'; 
include_once '../model/banco.php';

if (!$conexao) {
    die("Erro: Conexão com o banco não foi estabelecida.");
}

$id_parcela = $_GET['id'] ?? null;
$parcela = null;

if ($id_parcela) {
    $sql = "SELECT p.id_parcela, c.nome as cliente_nome, f.nome as forma_pagamento_nome, 
                   p.valor_parcela, p.data_vencimento, p.data_pagamento, p.confirma_pagamento
            FROM parcela p
            JOIN cliente c ON p.id_cliente = c.id_cliente
            JOIN forma_pagamento f ON p.id_pagamento = f.id_pagamento
            WHERE p.id_parcela = ?";
    
    $stmt = $conexao->prepare($sql);
    
    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }

    $stmt->bind_param('i', $id_parcela);
    $stmt->execute();
    $result = $stmt->get_result();
    $parcela = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $parcela) {
    $valor_parcela = $_POST['valor_parcela'];
    $data_vencimento = $_POST['data_vencimento'];
    $data_pagamento = $_POST['data_pagamento'] ?? null;
    $confirma_pagamento = $_POST['confirma_pagamento'];

    $sql = "UPDATE parcela 
            SET valor_parcela = ?, data_vencimento = ?, data_pagamento = ?, confirma_pagamento = ? 
            WHERE id_parcela = ?";
    
    $stmt = $conexao->prepare($sql);
    
    if (!$stmt) {
        die("Erro na preparação da consulta de atualização: " . $conexao->error);
    }

    $stmt->bind_param('dssii', $valor_parcela, $data_vencimento, $data_pagamento, $confirma_pagamento, $id_parcela);
    $stmt->execute();
    $stmt->close();

    echo "<div class='alert alert-success'>Parcela atualizada com sucesso!</div>";
}
?>

<div class="container">
    <?php if ($parcela): ?>
        <h2>Detalhes da Parcela</h2>
        <form action="visualizar_parcela.php?id=<?php echo $id_parcela; ?>" method="POST">
            <div class="form-group">
                <label for="cliente_nome">Cliente</label>
                <input type="text" class="form-control" id="cliente_nome" value="<?php echo htmlspecialchars($parcela['cliente_nome']); ?>" disabled>
            </div>
            <div class="form-group">
                <label for="forma_pagamento_nome">Forma de Pagamento</label>
                <input type="text" class="form-control" id="forma_pagamento_nome" value="<?php echo htmlspecialchars($parcela['forma_pagamento_nome']); ?>" disabled>
            </div>
            <div class="form-group">
                <label for="valor_parcela">Valor</label>
                <input type="number" class="form-control" id="valor_parcela" name="valor_parcela" value="<?php echo $parcela['valor_parcela']; ?>" required>
            </div>
            <div class="form-group">
                <label for="data_vencimento">Data de Vencimento</label>
                <input type="date" class="form-control" id="data_vencimento" name="data_vencimento" value="<?php echo $parcela['data_vencimento']; ?>" required>
            </div>
            <div class="form-group">
                <label for="data_pagamento">Data de Pagamento</label>
                <input type="date" class="form-control" id="data_pagamento" name="data_pagamento" value="<?php echo $parcela['data_pagamento']; ?>">
            </div>
            <div class="form-group">
                <label for="confirma_pagamento">Status</label>
                <select class="form-control" id="confirma_pagamento" name="confirma_pagamento" required>
                    <option value="1" <?php echo ($parcela['confirma_pagamento'] == 1) ? 'selected' : ''; ?>>Pago</option>
                    <option value="0" <?php echo ($parcela['confirma_pagamento'] == 0) ? 'selected' : ''; ?>>Atrasado</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    <?php else: ?>
        <div class="alert alert-danger" role="alert">Parcela não encontrada.</div>
    <?php endif; ?>
</div>
