<div class="container">

<h2>Lista de Clientes</h2>
<div class="mb-3 d-flex justify-content-between">
    <a href="?page=novo" class="btn btn-primary">Adicionar Cliente</a>
    <a href="?page=enviar_promocoes" class="btn btn-success">Enviar Promoções</a>
</div>

<?php 
    $sql = "SELECT * FROM cliente";
    $res = $conexao->query($sql); 
    $qtd = $res->num_rows; 

    if ($qtd > 0) {
        print "<table class='table table-bordered'>";
        print "<thead class='thead-dark'>";
        print "<tr>"; 
        print "<th>ID</th>";
        print "<th>CPF</th>";
        print "<th>Nome</th>";
        print "<th>Telefone</th>";
        print "<th>Email</th>";
        print "<th>Ações</th>";
        print "</tr>";
        print "</thead>";
        print "<tbody>";

        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . $row->id_cliente . "</td>";
            print "<td>" . $row->cpf . "</td>";
            print "<td>" . $row->nome . "</td>";
            print "<td>" . $row->telefone . "</td>";
            print "<td>" . $row->email . "</td>";
            print "<td>";
            print "<button onclick=\"location.href='?page=visualizar&id_cliente=" . $row->id_cliente . "';\" class='btn btn-info'>Visualizar</button> ";
            print "<button onclick=\"location.href='?page=editar&id_cliente=" . $row->id_cliente . "';\" class='btn btn-warning'>Editar</button> ";
            print "<button onclick=\"if(confirm('Tem certeza que deseja excluir este cliente?')) {location.href='?page=excluir&id_cliente=" . $row->id_cliente . "';}\" class='btn btn-danger'>Excluir</button>";
            print "<button onclick=\"location.href='?page=visualizar_historico&id_cliente=" . $row->id_cliente . "';\" class='btn btn-success'>Ver Histórico de Compras</button>";
        }
        

        print "</tbody>";
        print "</table>";
    } else {
        print "<div class='alert alert-danger' role='alert'>Não foram encontrados clientes.</div>";
    }
?>
</div>
