<h1>Editar Pacientes</h1>
<?php

$sql = "SELECT * FROM paciente WHERE id_paciente =" . $_REQUEST['id_paciente'];
$res = $conn->query($sql);
$row = $res->fetch_object();

if (isset($_FILES["foto_paciente"]) && !empty($_FILES["foto_paciente"]["name"])) {
    $destino = "./img/" . $_FILES["foto_paciente"]["name"];
    if (move_uploaded_file($_FILES["foto_paciente"]["tmp_name"], $destino)) {
        print "Upload realizado com sucesso!";
    } else {
        print "Erro ao mover o arquivo.";
    }
} else {
    print "Nenhum arquivo foi enviado.";
}


?>
<form action="?page=salvar-paciente" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_paciente" value="<?php print $row->id_paciente; ?>">
    <input type="hidden" name="acao" value="editar">
    <div class="mb-3">
        <label for="">Nome</label>
        <input type="text" name="nome_paciente" class="form-control" placeholder="Digite seu nome completo." required value="<?php print $row->nome_paciente;?>">
    </div>
    <div class="mb-3">
        <label for="">Data de Nascimento</label>
        <input type="date" name="data_nasc_paciente" class="form-control" placeholder="Selecione sua data de nascimento" required value="<?php print $row->data_nasc_paciente;?>">
    </div>
    <div class="mb-3">
        <label for="">CPF</label>
        <input type="number" name="cpf_paciente" class="form-control" placeholder="Digite seu CPF. Apenas números são aceitos." required value="<?php print $row->cpf_paciente;?>">
    </div>
    <div class="mb-3">
        <label for="">Email</label>
        <input type="email" name="email_paciente" class="form-control" placeholder="email@email.com" required value="<?php print $row->email_paciente;?>">
    </div>
    <div class="mb-3">
        <label for="">Endereço</label>
        <input type="text" name="endereco_paciente" class="form-control" placeholder="Digite seu endereço" required value="<?php print $row->endereco_paciente;?>">
    </div>
    <div class="mb-3">
        <label for="">Sexo</label>
        <select name="sexo_paciente" class="form-select form-control form-control-lg" aria-label="Default select example" required value="<?php print $row->sexo_paciente;?>">
            <option selected></option>
            <option value="Masculino">Masculino</option>
            <option value="Femnino">Feminino</option>
            <option value="Outros">Outros</option>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>