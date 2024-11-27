<h1>Listar Pacientes</h1>
<?php

$sql = "SELECT * FROM paciente";
$res = $conn->query($sql);
$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome</th>";
    print "<th>CPF</th>";
    print "<th>E-mail</th>";
    print "<th>Data de Nascimento</th>";
    print "<th>Sexo</th>";
    print "<th>Endereço</th>";
    print "<th>Ações</th>";
    print "</tr>";

    while ($row = $res->fetch_object()) {

        print "<tr>";
        print "<td>" . $row->id_paciente . "</td>";
        print "<td>" . $row->nome_paciente . "</td>";
        print "<td>" . $row->cpf_paciente . "</td>";
        print "<td>" . $row->email_paciente . "</td>";
        print "<td>" . $row->data_nasc_paciente . "</td>";
        print "<td>" . $row->sexo_paciente . "</td>";
        print "<td>" . $row->endereco_paciente . "</td>";
        print "<td>";
        print "    <div style='display: flex; gap: 10px;'>"; // Usando flexbox para alinhar os botões lado a lado
        print "        <button class='btn btn-success' style='width: 100px;' onclick=\"location.href='?page=editar-paciente&id_paciente=" . $row->id_paciente . "';\">Editar</button>";
        print "        <button class='btn btn-danger' style='width: 100px;' onclick=\"if(confirm('Tem certeza que deseja excluir?')) {location.href='?page=salvar-paciente&acao=excluir&id_paciente=" . $row->id_paciente . "';} else {false;}\">Excluir</button>";
        print "    </div>";
        print "</td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "Não encontrou resultado";
}


?>