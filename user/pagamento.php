<?php
include('../functions.php');

function getValor()
{
  $id = UserID();
  $conection = conection();
  $busca = "SELECT debito FROM cliente WHERE id_cliente='$id'";
  $identificacao = mysqli_query($conection, $busca);
  $retorno = mysqli_fetch_array($identificacao);
  return number_format($retorno['debito'], 2, ',', '.');
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

              <li>
                <a href="#">
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
            <div class="col-md-6 col-lg-4" style="margin-left: 35%;">
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
            <div class="col-lg-4" style="margin-left: 35%;">

              <button type="button" data-toggle="modal" data-target="#staticModal" class="btn btn-success btn-lg btn-block">Realizar pagamento</button>
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
          <div class="card">
            <div class="card-header">Cartão de crédito</div>
            <div class="card-body">
              <div class="card-title">
                <h3 class="text-center title-2">Pagamento de fatura</h3>
              </div>
              <hr>
              <form action="" method="post" novalidate="novalidate">
                <div class="form-group">
                  <label for="cc-payment" class="control-label mb-1">Valor</label>
                  <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value=<?php echo getValor(); ?>>
                </div>
                <div class="form-group has-success">
                  <label for="cc-name" class="control-label mb-1">Nome no cartão</label>
                  <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                  <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                </div>
                <div class="form-group">
                  <label for="cc-number" class="control-label mb-1">Número do cartão</label>
                  <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                  <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="cc-exp" class="control-label mb-1">Validade</label>
                      <input id="cc-exp" name="cc-exp" type="tel" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="10 / 2020" autocomplete="cc-exp">
                      <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="x_card_code" class="control-label mb-1">CVV</label>
                    <div class="input-group">
                      <input id="x_card_code" name="x_card_code" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div>
                  <button type="submit" id="payment-button" name="btnPagar" class="btn btn-lg btn-info btn-block">
                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                    <span id="payment-button-amount">Pagar R$ <?php echo getValor(); ?></span>
                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                  </button>

                </div>

              </form>

            </div>

          </div>
          <button type="button" class="btn btn-danger" style="margin-top: -30px;" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
    <!-- end modal static -->
    <!-- modal small -->
    <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">

          <div class="modal-footer">
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

?>