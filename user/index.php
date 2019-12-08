<?php
include('../functions.php');

administrador(UserID());

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
                        <a href="#">
                            <img src="../images/icon/logo-white.png" alt="CoolAdmin" />
                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-tachometer-alt"></i>Painel
                                    <span class="bot-line"></span>
                                </a>

                            </li>
                            <li>
                                <a href="alugar.php">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span class="bot-line"></span>Aluguel</a>
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
                                                <i class="zmdi zmdi-account"></i>Seus dados</a>
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
                                            <a href="#">Inicio</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Painel</li>
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
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number"><?php echo getAlugueis(); ?></h2>
                                <span class="desc">total de alugueis</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number"><?php echo getContratos(); ?></h2>
                                <span class="desc">contratos em aberto</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number">R$ <?php echo getDebito(); ?></h2>
                                <span class="desc">total em débito</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-money"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Tabela de alugueis</h3>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>modelo</th>
                                            <th>data inicial</th>
                                            <th>data final</th>
                                            <th>valor</th>
                                            <th>status</th>
                                            <th>multa</th>
                                            <th>Dias restantes</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo mostraListaAluguel(UserID()); ?>
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
        <!-- modal static -->
        <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Adie seu contrato</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="has-success form-group">
                            <input type="hidden" name="inputCodigoAdiar" id="inputModal" class="form-control-success form-control" value="">
                            <label for="inputSuccess2i" class=" form-control-label">Adiar por mais quantos dias?</label>
                            <input type="number" name="inputDias" id="inputSuccess2i" class="form-control-success form-control" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="btnAdiar" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal static -->
        <!-- modal small -->
        <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="smallmodalLabel">Cancelar contrato</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="inputCodigo" id="inputModalCancelar" class="form-control-success form-control" value="">
                        <p>
                            Você tem certeza que realmente deseja cancelar esse contrato?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="btnCancelar" class="btn btn-primary">Confirmar</button>
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
<?php

if (isset($_POST['btnCancelar'])) {
    $conection = conection();
    $inputCodigo = mysqli_real_escape_string($conection, $_POST['inputCodigo']);
    $query = mysqli_query($conection, "UPDATE aluguel SET status = 'Fechado' WHERE id_aluguel = '$inputCodigo'");
    if ($query) {
        echo "<script language='javascript' type='text/javascript'>
          alert('Contrato cancelado!');window.location = ('index.php');
         </script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Erro ao cancelar');</script>";
    }
}

if (isset($_POST['btnAdiar'])) {
    $conection = conection();
    $inputCodigoAdiar = mysqli_real_escape_string($conection, $_POST['inputCodigoAdiar']);
    $inputDias = mysqli_real_escape_string($conection, $_POST['inputDias']);
    $busca = "SELECT * FROM aluguel WHERE id_aluguel='$inputCodigoAdiar'";
    $identificacao = mysqli_query($conection, $busca);
    $retorno = mysqli_fetch_array($identificacao);
    $data = $retorno['data_vencimento'];
    $data   = date('Y-m-d', strtotime($data. " + ".$inputDias." days"));
    $result = mysqli_query($conection, "UPDATE aluguel SET data_vencimento='$data', status='Aberto' WHERE id_aluguel='$inputCodigoAdiar'");
    if ($result) {
        echo "<script language='javascript' type='text/javascript'>
          alert('Adiado com sucesso!');window.location = ('index.php');
         </script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Erro ao adiar');</script>";
    }
}
?>