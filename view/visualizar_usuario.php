<div class="container mt-5">
    <h2>Visualizar Usuário</h2>
    <form action="?page=salvar" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" disabled>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" disabled>
        </div>
    </form>
    <button type="button" class="btn btn-info" onclick="window.location.href='?page=listar'">Voltar</button>
    <button type="button" class="btn btn-primary" onclick="window.location.href='?page=editar&id=<?php echo $usuario['id']; ?>'">Editar</button>
</div>
