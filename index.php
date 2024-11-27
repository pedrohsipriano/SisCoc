<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Controle Clínico</title>
    <link rel="icon" href="img/icons8-plano-de-saúde-96.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&family=Orbitron:wght@400..900&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="page lexend-deca">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="?page=home"><img width="25" height="25" src="https://img.icons8.com/ios/50/treatment-plan--v1.png" alt="treatment-plan--v1"/> SisCoc</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?page=home">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Médico
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?page=cadastrar-medico">Cadastrar</a></li>
                                <li><a class="dropdown-item" href="?page=listar-medico">Listar</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pacientes
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?page=cadastrar-paciente">Cadastrar</a></li>
                                <li><a class="dropdown-item" href="?page=listar-paciente">Listar</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Consultas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?page=cadastrar-consulta">Cadastrar</a></li>
                                <li><a class="dropdown-item" href="?page=listar-consulta">Listar</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Exames
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?page=cadastrar-exame">Cadastrar</a></li>
                                <li><a class="dropdown-item" href="?page=listar-exame">Listar</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row mt-3">
                <div class="col">
                    <?php
                    //arquivo de conexão com o banco de dados 
                    include('config.php');

                    switch (@$_REQUEST['page']) {
                        case 'cadastrar-medico':
                            include('cadastrar-medico.php');
                            break;
                        case 'editar-medico':
                            include('editar-medico.php');
                            break;
                        case 'listar-medico':
                            include('listar-medico.php');
                            break;
                        case 'salvar-medico':
                            include('salvar-medico.php');
                            break;

                        case 'cadastrar-paciente':
                            include('cadastrar-paciente.php');
                            break;
                        case 'editar-paciente':
                            include('editar-paciente.php');
                            break;
                        case 'listar-paciente':
                            include('listar-paciente.php');
                            break;
                        case 'salvar-paciente':
                            include('salvar-paciente.php');
                            break;

                        case 'cadastrar-consulta':
                            include('cadastrar-consulta.php');
                            break;
                        case 'editar-consulta':
                            include('editar-consulta.php');
                            break;
                        case 'listar-consulta':
                            include('listar-consulta.php');
                            break;
                        case 'salvar-consulta':
                            include('salvar-consulta.php');
                            break;

                        case 'cadastrar-exame':
                            include('cadastrar-exame.php');
                            break;
                        case 'editar-exame':
                            include('editar-exame.php');
                            break;
                        case 'listar-exame':
                            include('listar-exame.php');
                            break;
                        case 'salvar-exame':
                            include('salvar-exame.php');
                            break;
                        default:
                            include('home.php');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>

</html>