<div class="container mt-5">
    <h2>Enviar Promoções Personalizadas</h2>
    <form action="email.php?page=enviarEmail" method="POST">
        <div class="form-group">
            <label for="titulo_promocao">Título da Promoção</label>
            <input type="text" class="form-control" id="titulo_promocao" name="titulo_promocao" placeholder="Digite o título da promoção" required>
        </div>
        <div class="form-group">
            <label for="conteudo_promocional">Conteúdo da Promoção</label>
            <textarea class="form-control" id="conteudo_promocional" name="conteudo_promocional" rows="5" placeholder="Escreva o conteúdo da promoção aqui." required></textarea>
            <p>Use {{nome}} para personalizar com o nome do cliente.</p>
        </div>
        <button type="submit" class="btn btn-success">Enviar Promoções</button>
    </form>

    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'sucesso') {
            echo "<div class='alert alert-success'>Promoções enviadas com sucesso!</div>";
        } elseif ($_GET['status'] == 'erro') {
            echo "<div class='alert alert-danger'>Erro ao enviar promoções. Tente novamente mais tarde.</div>";
        }
    }
    ?>
</div>