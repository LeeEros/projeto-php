<div class="container mt-5">
    <h2>Enviar Promoções Personalizadas</h2>
    <form action="?page=enviar_promocoes" method="POST">
        <div class="form-group">
            <label for="conteudo_promocional">Conteúdo da Promoção</label>
            <textarea class="form-control" id="conteudo_promocional" name="conteudo_promocional" rows="5" placeholder="Escreva o conteúdo da promoção aqui. Use {{nome}} para personalizar com o nome do cliente." required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Enviar Promoções</button>
    </form>
</div>

<?php
include_once '../model/model_email.php';
include_once '../model/banco.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conteudo = $_POST['conteudo_promocional'];
    if (enviarPromocoes($conteudo)) {
        echo "<div class='alert alert-success'>Promoções enviadas com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao enviar promoções. Verifique os logs.</div>";
    }
}
?>