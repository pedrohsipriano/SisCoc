<h1>Listar Consultas</h1>
<?php
// Consulta para agrupar consultas por paciente
$sql = "SELECT 
            p.id_paciente, 
            p.nome_paciente, 
            m.nome_medico, 
            GROUP_CONCAT(c.id_consulta SEPARATOR '|') AS ids_consultas,
            GROUP_CONCAT(c.descricao_consulta SEPARATOR '|') AS descricoes,
            GROUP_CONCAT(c.data_consulta SEPARATOR '|') AS datas,
            GROUP_CONCAT(c.hora_consulta SEPARATOR '|') AS horas
        FROM consulta AS c
        INNER JOIN paciente AS p ON c.paciente_id_paciente = p.id_paciente
        INNER JOIN medico AS m ON c.medico_id_medico = m.id_medico
        GROUP BY p.id_paciente, p.nome_paciente, m.nome_medico";

$res = $conn->query($sql);
$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<p>Encontrou <b>$qtd</b> paciente(s) com consulta(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Paciente</th>";
    print "<th>Médico</th>";
    print "<th>Detalhes</th>"; // Accordion para exibir todas as consultas do paciente
    print "</tr>";

    while ($row = $res->fetch_object()) {
        // Separar os dados agrupados
        $ids_consultas = explode('|', $row->ids_consultas);
        $descricoes = explode('|', $row->descricoes);
        $datas = explode('|', $row->datas);
        $horas = explode('|', $row->horas);

        print "<tr>";
        print "<td>{$row->id_paciente}</td>";
        print "<td>{$row->nome_paciente}</td>";
        print "<td>{$row->nome_medico}</td>";
        print "<td>";
        print "<div class='accordion' id='accordionPaciente{$row->id_paciente}'>";
        print "  <div class='accordion-item'>";
        print "    <h2 class='accordion-header' id='heading{$row->id_paciente}'>";
        print "      <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapse{$row->id_paciente}' aria-expanded='false' aria-controls='collapse{$row->id_paciente}'>";
        print "        Ver Detalhes";
        print "      </button>";
        print "    </h2>";
        print "    <div id='collapse{$row->id_paciente}' class='accordion-collapse collapse' aria-labelledby='heading{$row->id_paciente}' data-bs-parent='#accordionPaciente{$row->id_paciente}'>";
        print "      <div class='accordion-body'>";
        print "        <ul>";
        foreach ($descricoes as $index => $descricao) {
            $id_consulta = $ids_consultas[$index];
            $data = $datas[$index];
            $hora = $horas[$index];
            print "          <li>";
            print "            <div><b>Descrição:</b> $descricao</div>";
            print "            <div><b>Data:</b> $data | <b>Hora:</b> $hora</div>";
            print "            <div style='margin-top: 5px;'>";
            print "              <button class='btn btn-success btn-sm' onclick=\"location.href='?page=editar-consulta&id_consulta=$id_consulta';\">Editar Consulta</button>";
            print "              <button class='btn btn-danger btn-sm' onclick=\"if(confirm('Tem certeza que deseja excluir a consulta $id_consulta?')) {location.href='?page=salvar-consulta&acao=excluir&id_consulta=$id_consulta';}\">Excluir Consulta</button>";
            print "            </div>";
            print "          </li>";
        }
        print "        </ul>";
        print "      </div>";
        print "    </div>";
        print "  </div>";
        print "</div>";
        print "</td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "<p>Não encontrou resultados</p>";
}
?>
