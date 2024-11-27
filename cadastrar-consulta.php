<h1>Cadastrar Consulta</h1>
<form action="?page=salvar-consulta" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label for="">Médico</label>
        <select name="medico_id_medico" class="form-select form-control" required>
        <option>Selecione o Médico</option>
            <?php
            $sql = "SELECT * FROM medico";
            $res = $conn->query($sql);
            while ($row = $res->fetch_object()) {
                print "<option value='".$row ->id_medico."'>";
                print $row-> nome_medico."</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="">Paciente</label>
        <select name="paciente_id_paciente" class="form-select form-control" >
        <option>Selecione o Paciente</option>
            <?php
            $sql = "SELECT * FROM paciente";
            $res = $conn->query($sql);
            while ($row = $res->fetch_object()) {
                print "<option value='".$row ->id_paciente."'>";
                print $row-> nome_paciente."</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="">Data da Consulta</label>
        <input type="date" name="data_consulta" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="">Hora</label>
        <input type="time" name="hora_consulta" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="">Descrição da Consulta</label>
        <input type="text" name="descricao_consulta" class="form-control" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>