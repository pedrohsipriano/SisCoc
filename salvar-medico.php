<?php

    switch($_REQUEST ['acao']){
        case 'cadastrar':
            $nome = $_POST['nome_medico'];
            $crm = $_POST['crm_medico'];
            $especialidade = $_POST['especialidade_medico'];

            $sql = "INSERT INTO medico
                (nome_medico,
                crm_medico,
                especialidade_medico)
                    VALUES
                ('{$nome}',
                '{$crm}',
                '{$especialidade}')";

            $res = $conn -> query($sql);
            

            if ($res==true){
                print"<script>alert('Cadastro efetuado com sucesso!');</script>";
                print"<script>location.href='?page=listar-medico';</script>";
            }else{
                print"<script>alert('Cadastro sem sucesso!');</script>";
                print"<script>location.href='?page=listar-medico';</script>";
            }
            break;

            case 'editar':
                $nome = $_POST['nome_medico'];
                $crm = $_POST['crm_medico'];
                $especialidade = $_POST['especialidade_medico'];
     
                $sql = "UPDATE medico SET
                    nome_medico='{$nome}',
                    crm_medico='{$crm}',
                    especialidade_medico='{$especialidade}'
                WHERE 
                    id_medico = ".$_POST["id_medico"];
    
                $res = $conn->query($sql);
     
                if($res==true){
                 print "<script>alert('Cadastro editado com sucesso!');</script>";
                 print "<script>location.href='?page=listar-medico';</script>";
                }else{
                 print "<script>alert('Erro no seu cadastro!');</script>";
                 print "<script>location.href='?page=listar-medico';</script>";
                }
             break;
    
             case 'excluir':

                $id_medico = $_REQUEST["id_medico"];
                $sql = "DELETE FROM medico WHERE id_medico = $id_medico";
                $res = $conn->query($sql);
     
                if($res == true){
                 print "<script>alert('Cadastro excluido com sucesso!');</script>";
                 print "<script>location.href='?page=listar-medico';</script>";
                }else{
                 print "<script>alert('Erro ao excluir!');</script>";
                 print "<script>location.href='?page=listar-medico';</script>";
                 }
             break;
    }
?>