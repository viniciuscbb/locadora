<?php
include('../functions.php');

if (isset($_POST['btnAdicionar'])) {
    include('../functions.php');
    $conection = conection();
    $modelo = mysqli_real_escape_string($conection, $_POST['modelo']);
    $motor = mysqli_real_escape_string($conection, $_POST['motor']);
    $cambio = mysqli_real_escape_string($conection, $_POST['cambio']);
    $arCondicionado = mysqli_real_escape_string($conection, $_POST['arCondicionado']);
    $passageiros = mysqli_real_escape_string($conection, $_POST['passageiros']);
    $portas = mysqli_real_escape_string($conection, $_POST['portas']);
    $direcao = mysqli_real_escape_string($conection, $_POST['direcao']);
    $valor = mysqli_real_escape_string($conection, $_POST['valor']);
    $query = mysqli_query($conection, "INSERT INTO carro (modelo, motor, cambio, ar_condicionado, passageiros, portas, direcao, valor) VALUES ('$modelo', '$motor', '$cambio', '$arCondicionado', '$passageiros', '$portas', '$direcao', '$valor')");
    if ($query) {
        echo "<script language='javascript' type='text/javascript'>
          alert('Cadastro realizado com sucesso!');
         </script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Dados incorretos');window.location.href='login.php';</script>";
    }
}

function status($id_carro)
{
    $conection = conection();
    $query = mysqli_query($conection, "SELECT * FROM aluguel WHERE id_carro = '$id_carro'");
    $resultado = mysqli_num_rows($query);
    if ($resultado >= 1) {
        $status = "<td class='denied'>Alugado</td>";
    } else {
        $status = "<td class='process'>Disponível</td>";
    }
    return $status;
}

function mostraEstoque()
{

    $conection = conection();
    $query = mysqli_query($conection, "SELECT * from carro");

    while ($row = mysqli_fetch_array($query)) {
        $id_carro        = $row['id_carro'];
        $modelo          = $row['modelo'];
        $motor           = $row['motor'];
        $cambio          = $row['cambio'];
        $ar_condicionado = $row['ar_condicionado'];
        $passageiros     = $row['passageiros'];
        $portas          = $row['portas'];
        $direcao         = $row['direcao'];
        $valor           = $row['valor'];
        if ($ar_condicionado == 1) {
            $ar_condicionado = '<span class="status--process">Sim</span>';
        } else {
            $ar_condicionado = '<span class="status--denied">Não</span>';
        }

        $status = status($id_carro);

        echo '<tr>
                <td>' . $modelo . '</td>
                <td>' . number_format($motor, 1) . '</td>   
                <td>' . $cambio . '</td>
                <td>' . $ar_condicionado . '</td>
                <td>' . $passageiros . '</td>
                <td>' . $portas . '</td>
                <td>' . $direcao . '</td>
                <td>R$ ' . number_format($valor, 2, ',', '.') . ' / dia</td>
                ' . $status . '
            </tr>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard 3</title>

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">


    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="#">
                            <img src="../images/icon/logo-white.png" alt="CoolAdmin" />
                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li class="has-sub">
                                <a href="index.php">
                                    <i class="fas fa-tachometer-alt"></i>Painel
                                    <span class="bot-line"></span>
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span class="bot-line"></span>Estoque</a>
                            </li>
                        </ul>
                    </div>
                    <div class="header__tool">
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="../images/icon/user.png" alt="John Doe" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#"><?php echo getUserName(); ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="../images/icon/user.png" alt="John Doe" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#"><?php echo getUserName(); ?></a>
                                            </h5>
                                            <span class="email"><?php echo getEmail(); ?></span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="sair.php">
                                            <i class="zmdi zmdi-power"></i>Sair</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">Você está aqui:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="index.php">Inicio</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Estoque</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->
            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Seja bem vindo(a),
                                <span><?php echo getUserName(); ?>!</span>
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->
            <!-- DATA TABLE-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button style="float: right; margin: 10px" class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#largeModal">
                            <i class="zmdi zmdi-plus"></i>novo carro</button>
                        <! - TABELA DE DADOS ->
                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>Modelo</th>
                                            <th>Motor</th>
                                            <th>Cambio</th>
                                            <th>Ar condicionado</th>
                                            <th>Passageiros</th>
                                            <th>Portas</th>
                                            <th>Direção</th>
                                            <th>Valor</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo mostraEstoque(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <! - FINAL DA TABELA DE DADOS ->
                    </div>
                </div>
                </section>
                <!-- END DATA TABLE-->

                <!-- COPYRIGHT-->
                <section class="p-t-60 p-b-20">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Direitos autorais © 2019 NeedCar. Todos os direitos reservados.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- END COPYRIGHT-->
            </div>

        </div>
        <form method="post">
            <!-- modal cadastrar novo carro -->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Adicionar novo carro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="has-success form-group">
                                <label for="inputSuccess2i" class=" form-control-label">Modelo</label>
                                <input type="text" name="modelo" id="inputModelo" class="form-control-success form-control" value="">
                                <label for="inputSuccess2i" class=" form-control-label">Motor</label>
                                <input type="text" name="motor" id="inputEmail" class="form-control-success form-control" value="">
                                <label for="inputSuccess2i" class=" form-control-label">Cambio</label>
                                <select name="cambio" id="inputNome" class="form-control">
                                    <option>Selecione uma opção</option>
                                    <option>Automático</option>
                                    <option>Manual</option>
                                </select>
                                <label for="inputSuccess2i" class=" form-control-label">Ar Condicionado</label>
                                <select name="arCondicionado" id="inputNome" class="form-control">
                                    <option>Selecione uma opção</option>
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                                <label for="inputSuccess2i" class=" form-control-label">Passageiros</label>
                                <input type="number" name="passageiros" id="inputNome" class="form-control-success form-control" value="">
                                <label for="inputSuccess2i" class=" form-control-label">Portas</label>
                                <input type="number" name="portas" id="inputNome" class="form-control-success form-control" value="">
                                <label for="inputSuccess2i" class=" form-control-label">Direção</label>
                                <select name="direcao" id="inputNome" class="form-control">
                                    <option>Selecione uma opção</option>
                                    <option>Hidráulica</option>
                                    <option>Eletro-hidráulica</option>
                                    <option>Elétrica</option>
                                </select>
                                <label for="inputSuccess2i" class=" form-control-label">Valor</label>
                                <input type="number" name="valor" id="inputNome" class="form-control-success form-control" value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="btnAdicionar" class="btn btn-primary">Adicionar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal static -->
        </form>
        <!-- Jquery JS-->
        <script src="../vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="../vendor/slick/slick.min.js">
        </script>
        <script src="../vendor/wow/wow.min.js"></script>
        <script src="../vendor/animsition/animsition.min.js"></script>
        <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="../vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="../vendor/circle-progress/circle-progress.min.js"></script>
        <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="../vendor/select2/select2.min.js">
        </script>

        <!-- Main JS-->
        <script src="../js/main.js"></script>
        <script src="../js/teste.js"></script>

</body>

</html>
<!-- end document-->