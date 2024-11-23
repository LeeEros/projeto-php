<div class="container">

<h2>Lista de Clientes</h2>
<div class="mb-3">
    <a href="?page=novo" class="btn btn-primary">Adicionar Cliente</a>
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
            print "<td>" . $row->id . "</td>";
            print "<td>" . $row->cpf . "</td>";
            print "<td>" . $row->nome . "</td>";
            print "<td>" . $row->telefone . "</td>";
            print "<td>" . $row->email . "</td>";
            print "<td>";
            print "<button onclick=\"location.href='?page=visualizar&id=" . $row->id . "';\" class='btn btn-info'>Visualizar</button> ";
            print "<button onclick=\"location.href='?page=editar&id=" . $row->id . "';\" class='btn btn-warning'>Editar</button> ";
            print "<button onclick=\"if(confirm('Tem certeza que deseja excluir este cliente?')) {location.href='?page=excluir&id=" . $row->id . "';}\" class='btn btn-danger'>Excluir</button>";
            print "</td>";
            print "</tr>";
        }

        print "</tbody>";
        print "</table>";
    } else {
        print "<div class='alert alert-danger' role='alert'>Não foram encontrados clientes.</div>";
    }
?>
</div>
