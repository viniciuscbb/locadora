<?php
include('../functions.php');
/*
$data_inicial =  date('Y-m-d');
$data_final = "2019-11-15";
$time_inicial = strtotime($data_inicial);
$time_final = strtotime($data_final);
$diferenca = $time_final - $time_inicial;
$dias = (int) floor($diferenca / (60 * 60 * 24));
*/

function UserID(){
$sei = $_COOKIE['user'];
$conection = conection();
$busca = "SELECT id_cliente FROM cliente WHERE email='$sei'";
$identificacao = mysqli_query($conection, $busca);
$retorno = mysqli_fetch_array($identificacao);
return $retorno['id_cliente'];
}	

function getUserName(){
    $id = UserID();
    $conection = conection();
    $busca = "SELECT nome FROM cliente WHERE id_cliente='$id'";
    $identificacao = mysqli_query($conection, $busca);
    $retorno = mysqli_fetch_array($identificacao);
    return $retorno['nome'];
}
function getEmail(){
    $id = UserID();
    $conection = conection();
    $busca = "SELECT email FROM cliente WHERE id_cliente='$id'";
    $identificacao = mysqli_query($conection, $busca);
    $retorno = mysqli_fetch_array($identificacao);
    return $retorno['email'];
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
                                    <a class="js-acc-btn" href="#"><?php echo getUserName();?></a>
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
                                                <a href="#"><?php echo getUserName();?></a>
                                            </h5>
                                            <span class="email"><?php echo getEmail();?></span>
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
                            <h1 class="title-4">Seja bem vindo,
                                <span>usuário!</span>
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
                                <h2 class="number">5</h2>
                                <span class="desc">total de alugueis</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number">1</h2>
                                <span class="desc">contratos em aberto</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number">R$60,80</h2>
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
                                        <tr class="tr-shadow">
                                            <?php
                                            $ID = 15155;
                                            ?>
                                            <td>Gol</td>
                                            <td>08-11-2019</td>
                                            <td>10-11-2019</td>
                                            <td>R$679.00</td>
                                            <td>
                                                <span class="status--process">Aberto</span>
                                            </td>
                                            <td>R$0.00</td>
                                            <td>1 Dia(s)</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button onclick="trocar()" name="btnModal" type="button" data-toggle="modal" data-target="#staticModal" class="btn btn-success btn-sm" id="btnModal" value=<?php echo $ID; ?>>
                                                        <i class="fa fa-clock-o"></i>&nbsp;Adiar
                                                    </button>
                                                    <button onclick="trocar()" name="btnDelete" type="button" data-toggle="modal" data-target="#smallmodal" class="btn btn-danger btn-sm" id="btnDelete" value=<?php echo $ID; ?>>
                                                        <i class="fa fa-times-circle"></i>&nbsp;Cancelar
                                                    </button>
                                                </div>
                                            </td>
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
                            <label for="inputSuccess2i" class=" form-control-label">Código do contrato</label>
                            <input type="number" id="inputModal" class="form-control-success form-control" value="0" disabled>
                            <label for="inputSuccess2i" class=" form-control-label">Adiar por mais quantos dias?</label>
                            <input type="number" id="inputSuccess2i" class="form-control-success form-control" value="0">
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
                        <label for="inputSuccess2i" class=" form-control-label">Código do contrato</label>
                        <input type="number" id="inputModalCancelar" class="form-control-success form-control" value="0" disabled>
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