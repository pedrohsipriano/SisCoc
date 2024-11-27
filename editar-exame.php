<h1>Editar Exame</h1>

<?php
$sql = "SELECT * FROM exame AS e
        INNER JOIN paciente AS p ON e.paciente_id_paciente = p.id_paciente
        INNER JOIN medico AS m ON e.medico_id_medico = m.id_medico
        WHERE e.id_exame = " . $_REQUEST['id_exame'];

$resExame = $conn->query($sql);
$rowExame = $resExame->fetch_object();
?>

<form action="?page=salvar-exame" method="POST">
    <input type="hidden" name="id_exame" value="<?php print $rowExame->id_exame; ?>">
    <input type="hidden" name="acao" value="editar">

    <div class="mb-3">
        <label for="">Médico</label>
        <select name="medico_id_medico" class="form-select form-control" required>
            <option>Selecione o Médico</option>
            <?php
            $resMedico = $conn->query("SELECT * FROM medico");
            while ($rowMedico = $resMedico->fetch_object()) {
                $selected = ($rowExame->medico_id_medico == $rowMedico->id_medico) ? "selected" : "";
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
                $selected = ($rowExame->paciente_id_paciente == $rowPaciente->id_paciente) ? "selected" : "";
                print "<option value='" . $rowPaciente->id_paciente . "' $selected>";
                print $rowPaciente->nome_paciente . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="">Data do Exame</label>
        <input type="date" name="data_exame" class="form-control" required value="<?php print $rowExame->data_exame; ?>">
    </div>

    <div class="mb-3">
        <label for="">Hora do Exame</label>
        <input type="time" name="hora_exame" class="form-control" required value="<?php print $rowExame->hora_exame; ?>">
    </div>

    <div class="mb-3">
        <label for="">Descrição do Exame</label>
        <input type="text" name="descricao_exame" class="form-control" required value="<?php print $rowExame->descricao_exame; ?>">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>
