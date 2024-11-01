<div class="container mt-5">
    <h2>Cadastro de Cliente</h2>
    <form action="?page=salvar" method="POST">
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(42) 0 0000-0000" required>
        </div>
        <div class="form-group">
            <label for="score">Score</label>
            <input type="number" class="form-control" id="score" name="score" required>
        </div>
        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
        </div>
        <div class="form-group">
            <label for="limite_credito">Limite de Credito</label>
            <input type="number" class="form-control" id="limite_credito" name="limite_credito" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
        </div>
        <div class="form-group">
            <label for="senha">Recebe Whatsapp?</label>
            <input type="radio" class="form-control" id="sim" name="sim" placeholder="Sim" required>
            <input type="radio" class="form-control" id="nao" name="nao" placeholder="Não" required>
        </div>
        <div class="form-group">
            <label for="senha">Recebe Email?</label>
            <input type="radio" class="form-control" id="sim" name="sim" placeholder="Sim" required>
            <input type="radio" class="form-control" id="nao" name="nao" placeholder="Não" required>
        </div>
        <div class="form-group">
            <label for="senha">Recebe sms?</label>
            <input type="radio" class="form-control" id="sim" name="sim" placeholder="Sim" required>
            <input type="radio" class="form-control" id="nao" name="nao" placeholder="Não" required>
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>