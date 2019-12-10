<?php
include('../functions.php');

function listaAlugar()
{

    $conection = conection();
    $query = mysqli_query($conection, "SELECT * from carro");

    while ($row = mysqli_fetch_array($query)) {
        $ID              = $row['id_carro'];
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

        echo '<tr class="tr-shadow">
                <td>'.$modelo.'</td>
                <td>'.number_format($motor, 1).'</td>
                <td class="desc">'.$cambio .'</td>
                <td>'.$ar_condicionado.'</td>
                <td>'.$passageiros.'</td>
                <td>'.$portas.'</td>
                <td><span class="block-email">'.$direcao.'</span></td>
                <td>R$ '.number_format($valor, 2, ',', '.').' / dia</td>
                <td>
                    <div class="table-data-feature">
                        <button onclick="trocarAlugar(' . $ID . ')" name="btnModal" type="button" data-toggle="modal" data-target="#largeModal" class="btn btn-primary btn-sm" id="btnModal">
                            <i class="fa fa-car"></i>&nbsp;Foto
                        </button>
                        <button onclick="trocarAlugar(' . $ID . ')" name="btnDelete" type="button" data-toggle="modal" data-target="#smallmodal" class="btn btn-success btn-sm" id="btnDelete">
                            <i class="fa fa-calendar-check-o"></i>&nbsp;Alugar
                        </button>
                    </div>
                </td>
            </tr>';
    }
}

if (isset($_POST['btnAlugar'])) {
    $conection = conection();
    $id_cliente = UserID();
    $id_carro = mysqli_real_escape_string($conection, $_POST['inputModalCancelar']);
    $query = mysqli_query($conection, "SELECT * from carro where id_carro = '$id_carro'");
    $retorno = mysqli_fetch_array($query);
    $valor = $retorno['valor'];
    $status = "Aberto";
    $data_devolucao = mysqli_real_escape_string($conection, $_POST['data_devolucao']);
    $data_aluguel = date('Y-m-d');
    $query = mysqli_query($conection, "INSERT INTO aluguel (data_aluguel, data_vencimento, id_carro, id_cliente, valor, status, multa) VALUES ('$data_aluguel', '$data_devolucao', '$id_carro', '$id_cliente', '$valor', '$status', 0)");
    if ($query) {
        echo "<script language='javascript' type='text/javascript'>
          alert('Aluguel realizado com sucesso');
         </script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Erro ao alugar');</script>";
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
    <title>NeedCar</title>

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
                        <a href="index.php">
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
                                    <span class="bot-line"></span>Aluguel</a>
                            </li>

                            <li>
                                <a href="pagamento.php">
                                    <i class="fas fa-credit-card"></i>
                                    <span class="bot-line"></span>Pagamento</a>
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
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="conta.php">
                                                <i class="zmdi zmdi-account"></i>Conta</a>
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
                                        <li class="list-inline-item">Alugar</li>
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
                            <h1 class="title-4">Tabela de carros disponíveis</h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->
            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>modelo</th>
                                            <th>motor</th>
                                            <th>cambio</th>
                                            <th>ar condicionado</th>
                                            <th>passageiros</th>
                                            <th>portas</th>
                                            <th>direção</th>
                                            <th>valor</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo listaAlugar(); ?>
                                        <tr class="spacer"></tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
        <!-- modal foto -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Foto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="has-success form-group">

                            <img src="#" id="imgCarro" alt="CoolAdmin" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal  -->
        <!-- modal alugar -->
        <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="smallmodalLabel">Realizar novo aluguel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="inputModalCancelar" id="inputModalCancelar" class="form-control-success form-control" value="">
                        <div class="form-group">
                            <label>Data de devolução</label>
                            <input class="au-input au-input--full" type="date" name="data_devolucao" placeholder="">
                        </div>
                        <p>
                            Ao clicar em confirmar você está concordando com os <a href="../termos.html" target="_blank">termos e condições</a>.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="btnAlugar" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal small -->
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