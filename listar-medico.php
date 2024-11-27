<h1>Listar Medicos</h1>
<?php

$sql = "SELECT * FROM medico";
$res = $conn->query($sql);
$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome</th>";
    print "<th>CRM</th>";
    print "<th>Especialidades</th>";
    print "<th>Ações</th>";
    print "</tr>";
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id_medico . "</td>";
        print "<td>" . $row->nome_medico . "</td>";
        print "<td>" . $row->crm_medico . "</td>";
        print "<td>" . $row->especialidade_medico . "</td>";
        print "<td>";
        print "    <div style='display: flex; gap: 10px;'>"; // Usando flexbox para alinhar os botões lado a lado
        print "        <button class='btn btn-success' style='width: 100px;' onclick=\"location.href='?page=editar-medico&id_medico=" . $row->id_medico . "';\">Editar</button>";
        print "        <button class='btn btn-danger' style='width: 100px;' onclick=\"if(confirm('Tem certeza que deseja excluir?')) {location.href='?page=salvar-medico&acao=excluir&id_medico=" . $row->id_medico . "';} else {false;}\">Excluir</button>";
        print "    </div>";
        "</td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "Não encontrou resutado";
}

?>