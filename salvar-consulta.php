<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $data_consulta = $_POST['data_consulta'];
        $hora_consulta = $_POST['hora_consulta'];
        $descricao_consulta = $_POST['descricao_consulta'];
        $id_medico = $_POST['medico_id_medico'];
        $id_paciente = $_POST['paciente_id_paciente'];

        $sql = "INSERT INTO consulta 
                (data_consulta, 
                hora_consulta, 
                descricao_consulta,
                medico_id_medico,
                paciente_id_paciente) 
                VALUES 
                ('{$data_consulta}',
                '{$hora_consulta}',
                '{$descricao_consulta}',
                '{$id_medico}',
                '{$id_paciente}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastro efetuado com sucesso!');</script>";
            print "<script>location.href='?page=listar-consulta';</script>";
        } else {
            print "<script>alert('Cadastro sem sucesso!');</script>";
            print "<script>location.href='?page=cadastrar-consulta';</script>";
        }
        break;

    case 'editar':
        $data_consulta = $_POST['data_consulta'];
        $hora_consulta = $_POST['hora_consulta'];
        $descricao_consulta = $_POST['descricao_consulta'];
        $id_medico = $_POST['medico_id_medico'];
        $id_paciente = $_POST['paciente_id_paciente'];

        $sql = "UPDATE consulta SET 
                    data_consulta = '{$data_consulta}',
                    hora_consulta = '{$hora_consulta}',
                    descricao_consulta ='{$descricao_consulta}',
                    medico_id_medico ='{$id_medico}',
                    paciente_id_paciente ='{$id_paciente}'
                WHERE
                    id_consulta = ".$_POST["id_consulta"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastro editado com sucesso!');</script>";
            print "<script>location.href='?page=listar-consulta';</script>";
        } else {
            print "<script>alert('Erro no seu cadastro!');</script>";
            print "<script>location.href='?page=listar-consulta';</script>";
        }
        break;

    case 'excluir':

        $id_consulta = $_REQUEST["id_consulta"];
        $sql = "DELETE FROM consulta WHERE id_consulta = $id_consulta";
        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastro excluido com sucesso!');</script>";
            print "<script>location.href='?page=listar-consulta';</script>";
        } else {
            print "<script>alert('Erro ao excluir');</script>";
            print "<script>location.href='?page=listar-consulta';</script>";
        }
        break;
}
