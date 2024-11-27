<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $quantidade_exame = isset($_POST['quantidade_exame']) ? (int)$_POST['quantidade_exame'] : 0;
    
        if ($quantidade_exame > 0) {
            for ($i = 0; $i < $quantidade_exame; $i++) {
                $data_exame = $_POST['data_exame'][$i] ?? '';
                $hora_exame = $_POST['hora_exame'][$i] ?? '';
                $descricao_exame = $_POST['descricao_exame'][$i] ?? '';
                $id_medico = $_POST['medico_id_medico'][0] ?? 0; // Seleciona o primeiro médico
                $id_paciente = $_POST['paciente_id_paciente'][0] ?? 0; // Seleciona o primeiro paciente
    
                    $sql = "INSERT INTO exame 
                            (data_exame, 
                            hora_exame, 
                            descricao_exame, 
                            quantidade_exame, 
                            medico_id_medico, 
                            paciente_id_paciente)
                            VALUES 
                            ('$data_exame', 
                            '$hora_exame', 
                            '$descricao_exame', 
                            '$quantidade_exame', 
                            '$id_medico', 
                            '$id_paciente')";
    
                    $res = $conn->query($sql);
            }
    
            print "<script>alert('Exames(s) cadastrado(s) com sucesso!');</script>";
            print "<script>location.href='?page=listar-exame';</script>";
        } else {
            print "<script>alert('Exame(s) não cadastrado(s)!');</script>";
            print "<script>location.href='?page=cadastrar-exame';</script>";
        }
        break;
    


    case 'editar':
        $data_exame = $_POST['data_exame'];
        $hora_exame = $_POST['hora_exame'];
        $descricao_exame = $_POST['descricao_exame'];
        $id_medico = $_POST['medico_id_medico'];
        $id_paciente = $_POST['paciente_id_paciente'];

        $sql = "UPDATE exame SET 
                    data_exame = '{$data_exame}',
                    hora_exame ='{$hora_exame}',
                    descricao_exame = '{$descricao_exame}',
                    medico_id_medico =' {$id_medico}',
                    paciente_id_paciente = '{$id_paciente}'
                WHERE
                    id_exame = " . $_POST["id_exame"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastro editado com sucesso!');</script>";
            print "<script>location.href='?page=listar-exame';</script>";
        } else {
            print "<script>alert('Erro no seu cadastro!');</script>";
            print "<script>location.href='?page=listar-exame';</script>";
        }
        break;

    case 'excluir':
        $id_exame = $_REQUEST["id_exame"];
        $sql = "DELETE FROM exame WHERE id_exame = $id_exame";
        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastro excluido com sucesso!');</script>";
            print "<script>location.href='?page=listar-exame';</script>";
        } else {
            print "<script>alert('Erro ao excluir');</script>";
            print "<script>location.href='?page=listar-exame';</script>";
        }
        break;
}
