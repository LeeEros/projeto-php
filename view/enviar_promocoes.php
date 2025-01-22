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
    
    $sql = "SELECT nome, email FROM clientes WHERE aceita_email = 1";
    $result = $conn->query($sql);
    
    $destinatarios = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $destinatarios[] = array(
                'nome' => $row['nome'],
                'email' => $row['email']
            );
        }
        
        if (enviarPromocoes($conteudo, $destinatarios)) {
            echo "<div class='alert alert-success'>Promoções enviadas com sucesso!</div>";
        } else {
            echo "<div class='alert alert-danger'>Erro ao enviar promoções. Verifique os logs.</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Nenhum cliente disponível para receber promoções.</div>";
    }
}
?>