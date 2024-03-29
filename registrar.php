<?php
if (isset($_POST['btnRegistrar'])) {
    include('functions.php');
    $conection = conection();
    $username = mysqli_real_escape_string($conection, $_POST['username']);
    $email = mysqli_real_escape_string($conection, $_POST['email']);
    $endereco = mysqli_real_escape_string($conection, $_POST['endereco']);
    $cpf = mysqli_real_escape_string($conection, $_POST['cpf']);
    $data_nascimento = mysqli_real_escape_string($conection, $_POST['data_nascimento']);
    $password = mysqli_real_escape_string($conection, $_POST['password']);
    $query = mysqli_query($conection, "INSERT INTO cliente (nome, endereco, cpf, data_nascimento, email, senha) VALUES ('$username', '$endereco', '$cpf', '$data_nascimento', '$email', '$password')");
    if ($query) {
        echo "<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='login.php'</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
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
    <title>Registro</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper2">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Nome completo">
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Endereço do e-mail">
                                </div>
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input class="au-input au-input--full" type="adress" name="endereco" placeholder="Endereço onde mora">
                                </div>
                                <div class="form-group">
                                    <label>CPF</label>
                                    <input class="au-input au-input--full" type="text" name="cpf" placeholder="Somente números">
                                </div>
                                <div class="form-group">
                                    <label>Data de nascimento</label>
                                    <input class="au-input au-input--full" type="date" name="data_nascimento" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Senha</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Senha">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Concorde com os termos e a política
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="btnRegistrar" type="submit">Registrar</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Já possui uma conta?
                                    <a href="#">Entre aqui</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->