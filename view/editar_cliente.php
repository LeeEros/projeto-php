<div class="container mt-5">
    <h2>Editar Cliente</h2>
    <form action="?page=salvar" method="POST">
        <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">

        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $cliente['cpf']; ?>" required>
        </div>

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $cliente['nome']; ?>" required>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $cliente['telefone']; ?>" required>
        </div>

        <div class="form-group">
            <label for="score">Score</label>
            <input type="number" class="form-control" id="score" name="score" value="<?php echo $cliente['score']; ?>" required>
        </div>

        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo $cliente['data_nascimento']; ?>" required>
        </div>

        <div class="form-group">
            <label for="limite_credito">Limite de Crédito</label>
            <input type="number" class="form-control" id="limite_credito" name="limite_credito" value="<?php echo $cliente['limite_credito']; ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $cliente['email']; ?>" required>
        </div>

        <div class="form-group">
            <label for="whatsapp">Recebe WhatsApp?</label>
            <select class="form-control" id="whatsapp" name="whatsapp">
                <option value="1" <?php echo $cliente['whatsapp'] == 1 ? 'selected' : ''; ?>>Sim</option>
                <option value="0" <?php echo $cliente['whatsapp'] == 0 ? 'selected' : ''; ?>>Não</option>
            </select>
        </div>

        <div class="form-group">
            <label for="recebe_email">Recebe Email?</label>
            <select class="form-control" id="recebe_email" name="recebe_email">
                <option value="1" <?php echo $cliente['recebe_email'] == 1 ? 'selected' : ''; ?>>Sim</option>
                <option value="0" <?php echo $cliente['recebe_email'] == 0 ? 'selected' : ''; ?>>Não</option>
            </select>
        </div>

        <div class="form-group">
            <label for="sms">Recebe SMS?</label>
            <select class="form-control" id="sms" name="sms">
                <option value="1" <?php echo $cliente['sms'] == 1 ? 'selected' : ''; ?>>Sim</option>
                <option value="0" <?php echo $cliente['sms'] == 0 ? 'selected' : ''; ?>>Não</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
