<h1>Cadastrar Medicos</h1>
<form action="?page=salvar-medico" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label for="">Nome</label>
        <input type="text" name="nome_medico" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="">CRM</label>
        <input type="text" name="crm_medico" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="">Especialidade</label>
        <input type="text" name="especialidade_medico" class="form-control" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success footer">Enviar</button>
    </div>
</form>
