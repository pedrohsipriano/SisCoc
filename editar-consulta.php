<h1>Editar Consultas</h1>

<?php
$sql = "SELECT * FROM consulta AS c
        INNER JOIN paciente AS p ON c.paciente_id_paciente = p.id_paciente
        INNER JOIN medico AS m ON c.medico_id_medico = m.id_medico
        WHERE c.id_consulta = " . $_REQUEST['id_consulta'];

$resConsulta = $conn->query($sql);
$rowConsulta = $resConsulta->fetch_object();
?>

<form action="?page=salvar-consulta" method="POST">
    <input type="hidden" name="id_consulta" value="<?php print $rowConsulta->id_consulta; ?>">
    <input type="hidden" name="acao" value="editar">

    <div class="mb-3">
        <label for="">Médico</label>
        <select name="medico_id_medico" class="form-select form-control" required>
            <option>Selecione o Médico</option>
            <?php
            $resMedico = $conn->query("SELECT * FROM medico");
            while ($rowMedico = $resMedico->fetch_object()) {
                $selected = ($rowConsulta->medico_id_medico == $rowMedico->id_medico) ? "selected" : "";
                print "<option value='" . $rowMedico->id_medico . "' $selected>";
                print $rowMedico->nome_medico . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="">Paciente</label>
        <select name="paciente_id_paciente" class="form-select form-control" required>
            <option>Selecione o Paciente</option>
            <?php
            $resPaciente = $conn->query("SELECT * FROM paciente");
            while ($rowPaciente = $resPaciente->fetch_object()) {
                $selected = ($rowConsulta->paciente_id_paciente == $rowPaciente->id_paciente) ? "selected" : "";
                print "<option value='" . $rowPaciente->id_paciente . "' $selected>";
                print $rowPaciente->nome_paciente . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="">Data da Consulta</label>
        <input type="date" name="data_consulta" class="form-control" required value="<?php print $rowConsulta->data_consulta; ?>">
    </div>

    <div class="mb-3">
        <label for="">Hora</label>
        <input type="time" name="hora_consulta" class="form-control" required value="<?php print $rowConsulta->hora_consulta; ?>">
    </div>

    <div class="mb-3">
        <label for="">Descrição da Consulta</label>
        <input type="text" name="descricao_consulta" class="form-control" required value="<?php print $rowConsulta->descricao_consulta; ?>">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>
