<h1>Cadastrar Exame</h1>

<!-- Formulário para Exames -->
<form action="?page=salvar-exame" method="POST" id="exameForm">
    <input type="hidden" name="acao" value="cadastrar">

    <!-- Campo para inserir a quantidade de exames -->
    <div class="mb-3">
        <label for="">Quantos Exames?</label>
        <input type="number" id="quantidade_exame" name="quantidade_exame" class="form-control" value="1" min="1" max="10" onchange="updateForms()">
    </div>

    <div class="mb-3">
        <label for="">Médico</label>
        <select name="medico_id_medico[]" class="form-select form-control" required>
            <option>Selecione o Médico</option>
            <?php
            $sql = "SELECT * FROM medico";
            $res = $conn->query($sql);
            while ($row = $res->fetch_object()) {
                echo "<option value='".$row->id_medico."'>".$row->nome_medico."</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="">Paciente</label>
        <select name="paciente_id_paciente[]" class="form-select form-control" required>
            <option>Selecione o Paciente</option>
            <?php
            $sql = "SELECT * FROM paciente";
            $res = $conn->query($sql);
            while ($row = $res->fetch_object()) {
                echo "<option value='".$row->id_paciente."'>".$row->nome_paciente."</option>";
            }
            ?>
        </select>
    </div>

    <div id="exameFields">
        <!-- Aqui serão gerados os formulários dos exames -->
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>

<script>
// Função para adicionar os formulários automaticamente
function updateForms() {
    const quantidade_exame = document.getElementById('quantidade_exame').value;
    const exameFields = document.getElementById('exameFields');
    exameFields.innerHTML = '';

    for (let i = 0; i < quantidade_exame; i++) {
        const newForm = document.createElement('div');
        newForm.classList.add('exame-form');
        
        newForm.innerHTML = `
            <div class="mb-3">
                <br><br><br>
                <label for="">Data do Exame</label>
                <input type="date" name="data_exame[]" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="">Hora do Exame</label>
                <input type="time" name="hora_exame[]" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="">Descrição do Exame</label>
                <input type="text" name="descricao_exame[]" class="form-control" required>
            </div>
        `;
        exameFields.appendChild(newForm);
    }
}

// Chama a função ao carregar a página
window.onload = updateForms;
</script>
