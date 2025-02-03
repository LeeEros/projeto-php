<div class="container mt-5">
    <h2>Enviar Promoções Personalizadas</h2>
    <form action="model_email.php" method="POST">
        <div class="form-group">
            <label for="conteudo_promocional">Conteúdo da Promoção</label>
            <textarea class="form-control" id="conteudo_promocional" name="conteudo_promocional" rows="5" placeholder="Escreva o conteúdo da promoção aqui. Use {{nome}} para personalizar com o nome do cliente." required></textarea>
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
