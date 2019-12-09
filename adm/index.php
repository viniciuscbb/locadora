<?php
include('../functions.php');

function calcDiasRestantes($dataInicial, $dataFinal)
{
  $time_inicial = strtotime($dataInicial);
  $time_final = strtotime($dataFinal);
  $diferenca = $time_final - $time_inicial;
  $dias = (int) floor($diferenca / (60 * 60 * 24));
  $diasRestantes   = $dias;
  if ($diasRestantes < 1) {
    $dias = 0;
  }
  return $dias;
}

function getNome($id_cliente){
    $conection = conection();
    $query = mysqli_query($conection, "SELECT nome from cliente where id_cliente = '$id_cliente'");
    $retorno = mysqli_fetch_array($query);
     return $retorno['nome'];
}

function getModelo($id_carro){
    $conection = conection();
    $query = mysqli_query($conection, "SELECT modelo from carro where id_carro = '$id_carro'");
    $retorno = mysqli_fetch_array($query);
    return $retorno['modelo'];
}

function listaAdm(){
      
  $conection = conection();
  $query = mysqli_query($conection, "SELECT * from aluguel order by status");

    while ($row = mysqli_fetch_array($query)) {
        $id_aluguel      = $row['id_aluguel'];
        $id_cliente      = $row['id_cliente'];
        $id_carro        = $row['id_carro'];
        $data_aluguel    = $row['data_aluguel'];
        $valor           = $row['valor'];
        $status          = $row['status'];
        $multa           = $row['multa'];
        $data_vencimento = $row['data_vencimento'];

        $nome = getNome($id_cliente);
        $modelo = getModelo($id_carro);

        if ($status == "Vencido") {
            $status = '<span class="status--denied">Vencido</span>';
          } else if ($status == "Aberto") {
            $status = '<span class="status--process">Aberto</span>';
          }else {
            $status = '<span class="status--denied">Fechado</span>';
          }
        echo '<tr class="tr-shadow">
                <td>'.$nome.'</td>
                <td>'.$modelo.'</td>
                <td class="desc">'.date("d/m/Y", strtotime($data_aluguel)).'</td>
                <td>R$ '.number_format($valor, 2, ',', '.').' / dia</td>
                <td>'.$status.'</td>
                <td>R$ ' . number_format($multa, 2, ',', '.') . '</td>
                <td>'.calcDiasRestantes($data_aluguel, $data_vencimento).'</td>
                <td>';
                if($status == '<span class="status--denied">Fechado</span>'){
                    echo '<div class="table-data-feature">
                            <button onclick="trocar('.$id_cliente.')" name="btnModal" type="button" data-toggle="modal" data-target="#staticModal" class="btn btn-success btn-sm" id="btnModal" value=<?php echo $ID; ?>
                                <i class="fa fa-clock-o"></i>&nbsp;Dados
                            </button>
                        </div>';
                }else{
                    echo '<div class="table-data-feature">
                            <button onclick="trocar('.$id_cliente.')" name="btnModal" type="button" data-toggle="modal" data-target="#staticModal" class="btn btn-success btn-sm" id="btnModal" value=<?php echo $ID; ?>
                                <i class="fa fa-clock-o"></i>&nbsp;Dados
                            </button>
                            <button onclick="trocar('.$id_aluguel.')" name="btnDelete" type="button" data-toggle="modal" data-target="#smallmodal" class="btn btn-danger btn-sm" id="btnDelete" value=<?php echo $ID; ?>
                                <i class="fa fa-times-circle"></i>&nbsp;Cancelar
                            </button>
                        </div>';
                }
            echo '</td>
            </tr>';
        
    }
}

function graficoMes(){
    $conection = conection();
    $query = mysqli_query($conection, "SELECT SUM(CASE WHEN (MONTH(data_aluguel) = 1) THEN 1 ELSE 0 END) Jan, SUM(CASE WHEN (MONTH(data_aluguel) = 2) THEN 1 ELSE 0 END) Fev, SUM(CASE WHEN (MONTH(data_aluguel) = 3) THEN 1 ELSE 0 END) Mar, SUM(CASE WHEN (MONTH(data_aluguel) = 4) THEN 1 ELSE 0 END) Abr, SUM(CASE WHEN (MONTH(data_aluguel) = 5) THEN 1 ELSE 0 END) Mai, SUM(CASE WHEN (MONTH(data_aluguel) = 6) THEN 1 ELSE 0 END) Jun, SUM(CASE WHEN (MONTH(data_aluguel) = 7) THEN 1 ELSE 0 END) Jul,SUM(CASE WHEN (MONTH(data_aluguel) = 8) THEN 1 ELSE 0 END) Ago, SUM(CASE WHEN (MONTH(data_aluguel) = 9) THEN 1 ELSE 0 END) Sete, SUM(CASE WHEN (MONTH(data_aluguel) = 10) THEN 1 ELSE 0 END) Outu, SUM(CASE WHEN (MONTH(data_aluguel) = 11) THEN 1 ELSE 0 END) Nov, SUM(CASE WHEN (MONTH(data_aluguel) = 12) THEN 1 ELSE 0 END) Dez from aluguel");
    $retorno = mysqli_fetch_array($query);
    $Jan  = $retorno['Jan'];
    $Fev  = $retorno['Fev'];
    $Mar  = $retorno['Mar'];
    $Abr  = $retorno['Abr'];
    $Mai  = $retorno['Mai'];
    $Jun  = $retorno['Jun'];
    $Jul  = $retorno['Jul'];
    $Ago  = $retorno['Ago'];
    $Sete = $retorno['Sete'];
    $Outu = $retorno['Outu'];
    $Nov  = $retorno['Nov'];
    $Dez  = $retorno['Dez'];

    $query = mysqli_query($conection, "SELECT SUM(CASE WHEN (YEAR(data_aluguel) = 2015) THEN 1 ELSE 0 END) a2015,  SUM(CASE WHEN (YEAR (data_aluguel) = 2016) THEN 1 ELSE 0 END) a2016,  SUM(CASE WHEN (YEAR (data_aluguel) = 2017) THEN 1 ELSE 0 END) a2017,  SUM(CASE WHEN (YEAR (data_aluguel) = 2018) THEN 1 ELSE 0 END) a2018,  SUM(CASE WHEN (YEAR (data_aluguel) = 2019) THEN 1 ELSE 0 END) a2019 FROM aluguel");
    $retorno = mysqli_fetch_array($query);
    $a2015  = $retorno['a2015'];
    $a2016  = $retorno['a2016'];
    $a2017  = $retorno['a2017'];
    $a2018  = $retorno['a2018'];
    $a2019  = $retorno['a2019'];


    echo "<script language='javascript' type='text/javascript'>
    (function ($) {
      // USE STRICT
      'use strict';
    
      try {
        //Gráfico do mês
        var ctx = document.getElementById('sales-chart');
        if (ctx) {
          ctx.height = 150;
          var myChart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
              type: 'line',
              defaultFontFamily: 'Poppins',
              datasets: [{
                label: 'Alugueis',
                data: [".$Jan.", ".$Fev.", ".$Mar.", ".$Abr.", ".$Mai.", ".$Jun.", ".$Jul.", ".$Ago.", ".$Sete.", ".$Outu.", ".$Nov.", ".$Dez."],
                backgroundColor: 'transparent',
                borderColor: 'rgba(255, 118, 117,1.0)',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(220,53,69,0.75)',
              }]
            },
            options: {
              responsive: true,
              tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Poppins',
                bodyFontFamily: 'Poppins',
                cornerRadius: 3,
                intersect: false,
              },
              legend: {
                display: false,
                labels: {
                  usePointStyle: true,
                  fontFamily: 'Poppins',
                },
              },
              scales: {
                xAxes: [{
                  display: true,
                  gridLines: {
                    display: false,
                    drawBorder: false
                  },
                  scaleLabel: {
                    display: false,
                    labelString: 'Month'
                  },
                  ticks: {
                    fontFamily: 'Poppins'
                  }
                }],
                yAxes: [{
                  display: true,
                  gridLines: {
                    display: false,
                    drawBorder: false
                  },
                  scaleLabel: {
                    display: true,
                    labelString: 'Quantidades',
                    fontFamily: 'Poppins'
    
                  },
                  ticks: {
                    fontFamily: 'Poppins'
                  }
                }]
              },
              title: {
                display: false,
                text: 'Normal Legend'
              }
            }
          });
        }
    
    
      } catch (error) {
        console.log(error);
      }
    
      try {
    
        //Grafico do ano
        var ctx = document.getElementById('team-chart');
        if (ctx) {
          ctx.height = 150;
          var myChart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: ['2015', '2016', '2017', '2018', '2019'],
              type: 'line',
              defaultFontFamily: 'Poppins',
              datasets: [{
                data: [".$a2015.", ".$a2016.", ".$a2017.", ".$a2018.", ".$a2019."],
                label: 'Alugueis',
                backgroundColor: 'rgba(0,103,255,.15)',
                borderColor: 'rgba(0,103,255,0.5)',
                borderWidth: 3.5,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(0,103,255,0.5)',
              },]
            },
            options: {
              responsive: true,
              tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Poppins',
                bodyFontFamily: 'Poppins',
                cornerRadius: 3,
                intersect: false,
              },
              legend: {
                display: false,
                position: 'top',
                labels: {
                  usePointStyle: true,
                  fontFamily: 'Poppins',
                },
    
    
              },
              scales: {
                xAxes: [{
                  display: true,
                  gridLines: {
                    display: false,
                    drawBorder: false
                  },
                  scaleLabel: {
                    display: false,
                    labelString: 'Month'
                  },
                  ticks: {
                    fontFamily: 'Poppins'
                  }
                }],
                yAxes: [{
                  display: true,
                  gridLines: {
                    display: false,
                    drawBorder: false
                  },
                  scaleLabel: {
                    display: true,
                    labelString: 'Quantidades',
                    fontFamily: 'Poppins'
                  },
                  ticks: {
                    fontFamily: 'Poppins'
                  }
                }]
              },
              title: {
                display: false,
              }
            }
          });
        }
    
    
      } catch (error) {
        console.log(error);
      }
    
    })(jQuery);
    </script>
    ";
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
                                <a href="#">
                                    <i class="fas fa-tachometer-alt"></i>Painel
                                    <span class="bot-line"></span>
                                </a>

                            </li>
                            <li>
                                <a href="estoque.php">
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
                                        <a href="../user/sair.php">
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
                        <div class="col-lg-6">
                            <div class="au-card m-b-30">
                                <div class="au-card-inner">
                                    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                        </div>
                                    </div>
                                    <h3 class="title-2 m-b-40">Vendas do mês</h3>
                                    <canvas id="sales-chart" height="193" width="387" class="chartjs-render-monitor" style="display: block; width: 387px; height: 193px;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="au-card m-b-30">
                                <div class="au-card-inner">
                                    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                        </div>
                                    </div>
                                    <h3 class="title-2 m-b-40">Vendas do ano</h3>
                                    <canvas id="team-chart" height="193" width="387" class="chartjs-render-monitor" style="display: block; width: 387px; height: 193px;"></canvas>
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
                            <h3 class="title-5 m-b-35">Tabela de contratos</h3>

                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>Cliente</th>
                                            <th>Modelo</th>
                                            <th>data inicial</th>
                                            <th>valor</th>
                                            <th>status</th>
                                            <th>multa</th>
                                            <th>Dias restantes</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo listaAdm(); ?>
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
        <!-- modal ver dados do clinte -->
        <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Dados do cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="has-success form-group">
                            <input type="hidden" id="inputModal" class="form-control-success form-control" value="">
                            <label for="inputSuccess2i" class=" form-control-label">Nome</label>
                            <input type="text" id="inputNome" class="form-control-success form-control" value="Fernando" disabled>
                            <label for="inputSuccess2i" class=" form-control-label">E-mail</label>
                            <input type="email" id="inputEmail" class="form-control-success form-control" value="fernando2019@hotmail.com" disabled>
                            <label for="inputSuccess2i" class=" form-control-label">Endereço</label>
                            <input type="text" id="inputEndereco" class="form-control-success form-control" value="Rua Alegre" disabled>
                            <label for="inputSuccess2i" class=" form-control-label">CPF</label>
                            <input type="text" id="inputCPF" class="form-control-success form-control" value="123.456.789-12" disabled>
                            <label for="inputSuccess2i" class=" form-control-label">Data de nascimento</label>
                            <input type="text" id="inputNascimento" class="form-control-success form-control" value="15/10/1998" disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
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
                        <input type="hidden" id="inputModalCancelar" class="form-control-success form-control" value="">
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
    <?php echo graficoMes(); ?>
    <script src="../js/main.js"></script>
    <script src="../js/teste.js"></script>

</body>

</html>
<!-- end document-->