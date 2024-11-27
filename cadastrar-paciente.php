<h1>Cadastrar Pacientes</h1>
<form action="?page=salvar-paciente" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label for="">Nome</label>
        <input type="text" name="nome_paciente" class="form-control" placeholder="Digite seu nome completo." required>
    </div>
    <div class="mb-3">
        <label for="">Data de Nascimento</label>
        <input type="date" name="data_nasc_paciente" class="form-control" placeholder="Selecione sua data de nascimento" required>
    </div>
    <div class="mb-3">
        <label for="">CPF</label>
        <input type="number" name="cpf_paciente" class="form-control" placeholder="Digite seu CPF. Apenas números são aceitos." required>
    </div>
    <div class="mb-3">
        <label for="">Email</label>
        <input type="email" name="email_paciente" class="form-control" placeholder="email@email.com" required>
    </div>
    <div class="mb-3">
        <label for="">Endereço</label>
        <input type="text" name="endereco_paciente" class="form-control" placeholder="Digite seu endereço" required>
    </div>
    <div class="mb-3">
        <label for="">Sexo</label>
        <select name="sexo_paciente" class="form-select form-control form-control-lg" aria-label="Default select example" required>
            <option selected></option>
            <option value="Masculino">Masculino</option>
            <option value="Femnino">Feminino</option>
            <option value="Outros">Outros</option>
        </select>
    </div>
    <div class="md-3">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>