<div class="container mt-5">
    <h2>Visualizar Cliente</h2>
    <form>

        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" value="<?php echo htmlspecialchars($cliente['cpf']); ?>" disabled>
        </div>

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" value="<?php echo htmlspecialchars($cliente['nome']); ?>" disabled>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" value="<?php echo htmlspecialchars($cliente['telefone']); ?>" disabled>
        </div>

        <div class="form-group">
            <label for="score">Score</label>
            <input type="number" class="form-control" id="score" value="<?php echo htmlspecialchars($cliente['score']); ?>" disabled>
        </div>

        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" id="data_nascimento" value="<?php echo htmlspecialchars(date('Y-m-d', strtotime($cliente['data_nascimento']))); ?>" disabled>
        </div>

        <div class="form-group">
            <label for="limite_credito">Limite de Crédito</label>
            <input type="number" class="form-control" id="limite_credito" value="<?php echo htmlspecialchars($cliente['limite_credito']); ?>" disabled>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" value="<?php echo htmlspecialchars($cliente['email']); ?>" disabled>
        </div>

        <div class="form-group">
            <label for="whatsapp">Recebe WhatsApp?</label>
            <input type="text" class="form-control" id="whatsapp" value="<?php echo isset($cliente['whatsapp']) ? ($cliente['whatsapp'] == 1 ? 'Sim' : 'Não') : 'Não'; ?>" disabled>
        </div>

        <div class="form-group">
            <label for="recebe_email">Recebe Email?</label>
            <input type="text" class="form-control" id="recebe_email" value="<?php echo isset($cliente['recebe_email']) ? ($cliente['recebe_email'] == 1 ? 'Sim' : 'Não') : 'Não'; ?>" disabled>
        </div>

        <div class="form-group">
            <label for="sms">Recebe SMS?</label>
            <input type="text" class="form-control" id="sms" value="<?php echo isset($cliente['sms']) ? ($cliente['sms'] == 1 ? 'Sim' : 'Não') : 'Não'; ?>" disabled>
        </div>
    </form>

    <div class="btn-group">
        <button type="button" class="btn btn-info" onclick="window.location.href='?page=listar'">Voltar</button>
        <button type="button" class="btn btn-primary" onclick="window.location.href='?page=editar&id=<?php echo htmlspecialchars($cliente['id']); ?>'">Editar</button>

</div>
