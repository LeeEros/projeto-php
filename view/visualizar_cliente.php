<div class="container mt-5">
    <h2>Visualizar Cliente</h2>
    <form>
        <!-- Campo oculto para o ID do cliente -->
        <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">

        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" value="<?php echo $cliente['cpf']; ?>" disabled>
        </div>

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" value="<?php echo $cliente['nome']; ?>" disabled>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" value="<?php echo $cliente['telefone']; ?>" disabled>
        </div>

        <div class="form-group">
            <label for="score">Score</label>
            <input type="number" class="form-control" id="score" value="<?php echo $cliente['score']; ?>" disabled>
        </div>

        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" id="data_nascimento" value="<?php echo $cliente['data_nascimento']; ?>" disabled>
        </div>

        <div class="form-group">
            <label for="limite_credito">Limite de Crédito</label>
            <input type="number" class="form-control" id="limite_credito" value="<?php echo $cliente['limite_credito']; ?>" disabled>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" value="<?php echo $cliente['email']; ?>" disabled>
        </div>

        <div class="form-group">
            <label for="whatsapp">Recebe WhatsApp?</label>
            <input type="text" class="form-control" id="whatsapp" value="<?php echo $cliente['whatsapp'] == 1 ? 'Sim' : 'Não'; ?>" disabled>
        </div>

        <div class="form-group">
            <label for="recebe_email">Recebe Email?</label>
            <input type="text" class="form-control" id="recebe_email" value="<?php echo $cliente['recebe_email'] == 1 ? 'Sim' : 'Não'; ?>" disabled>
        </div>

        <div class="form-group">
            <label for="sms">Recebe SMS?</label>
            <input type="text" class="form-control" id="sms" value="<?php echo $cliente['sms'] == 1 ? 'Sim' : 'Não'; ?>" disabled>
        </div>
    </form>
    <button type="button" class="btn btn-info" onclick="window.location.href='?page=listar'">Voltar</button>
    <button type="button" class="btn btn-primary" onclick="window.location.href='?page=editar&id=<?php echo $cliente['id']; ?>'">Editar</button>
</div>
