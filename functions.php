<?php
include('config.php');

function conection()
{
  include('config.php');
  $conection = new mysqli($host, $user, $password, $dbname);
  mysqli_set_charset($conection, "utf8");
  if (!$conection) {
    die("Não foi possível conectar ao banco de dados" . mysqli_connect_error());
  } else {
    return $conection;
  }
}

function calcDias($dataFinal)
{
  $dataInicial = date('Y-m-d');
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

function calcMulta($dataFinal, $valor, $id)
{
  $conection = conection();
  if (calcDias($dataFinal) < 1) {
    $dataInicial = date('Y-m-d');
    $time_inicial = strtotime($dataInicial);
    $time_final = strtotime($dataFinal);
    $diferenca = $time_final - $time_inicial;
    $dias = (int) floor($diferenca / (60 * 60 * 24));
    $diasRestantes   = $dias;
    $multa = abs($diasRestantes) * ($valor * 2 / 100);
    $busca = "UPDATE aluguel SET multa = '$multa', status = 'Vencido' where id_aluguel = '$id'";
    if (mysqli_query($conection, $busca)) { }
  } else {
    $multa = 0;
    $busca = "UPDATE aluguel SET multa = '$multa' where id_aluguel = '$id'";
    if (mysqli_query($conection, $busca)) { }
  }
  return $multa;
}

function getDebito()
{
  $id = UserID();
  $conection = conection();
  $query = mysqli_query($conection, "SELECT TIMESTAMPDIFF(DAY, data_aluguel, data_vencimento) as total, valor from aluguel where id_cliente = '$id'");
  $calculo = 0;
  while ($row = mysqli_fetch_array($query)) {
    $dias = $row['total'];
    $valor = $row['valor'];
    $calculo = $calculo + $dias * $valor;
  }
  
  $busca = "SELECT sum(multa) as multa FROM aluguel WHERE id_cliente='$id' and status = 'Vencido'";
  $identificacao = mysqli_query($conection, $busca);
  $retorno = mysqli_fetch_array($identificacao);
  $multa = $retorno['multa'];
  $resultado = $calculo + $multa;

  $busca = "UPDATE cliente SET debito = '$resultado' where id_cliente = '$id'";
    if (mysqli_query($conection, $busca)) { }

  $result = number_format($resultado, 2, ',', '.');
  return $result;
}

function mostraListaAluguel($ID)
{
  $conection = conection();
  $query = mysqli_query($conection, "SELECT * from aluguel as a inner join carro c on a.id_carro = c.id_carro where a.id_cliente = '$ID'");

  while ($row = mysqli_fetch_array($query)) {
    $ID          = $row['id_aluguel'];
    $modelo      = $row['modelo'];
    $dataInicial = $row['data_aluguel'];
    $dataFinal   = $row['data_vencimento'];
    $valor       = $row['valor'];
    $status      = $row['status'];
    if ($status == "Vencido") {
      $status = '<span class="status--denied">Vencido</span>';
    } else if ($status == "Aberto") {
      $status = '<span class="status--process">Aberto</span>';
    }else {
      $status = '<span class="status--denied">Fechado</span>';
    }
    /*if (calcDias($dataFinal) > 0) {
      $status = '<span class="status--process">Aberto</span>';
    } else {
      $status = '<span class="status--denied">Vencido</span>';
    }*/
    echo '<tr  class="tr-shadow">
            <td class="desc">' . $modelo . '</td>
            <td>' . date("d/m/Y", strtotime($dataInicial)) . '</td>
            <td>' . date("d/m/Y", strtotime($dataFinal)) . '</td>
            <td>R$ ' . number_format($valor, 2, ',', '.') . '</td>
            <td>' . $status . '</td>
            <td>R$ ' . number_format(calcMulta($dataFinal, $valor, $ID), 2, ',', '.') . '</td>
            <td>' . calcDias($dataFinal) . '</td>
            <td>';
    if (calcDias($dataFinal) > 0 && $status == '<span class="status--process">Aberto</span>') {
      echo '<div class="table-data-feature">
                      <button onclick="trocar(' . $ID . ')" name="btnModal" type="button" data-toggle="modal" data-target="#staticModal" class="btn btn-success btn-sm" id="btnModal">
                        <i class="fa fa-clock-o"></i>&nbsp;Adiar
                      </button>
                      <button onclick="trocar(' . $ID . ')" name="btnDelete" type="button" data-toggle="modal" data-target="#smallmodal" class="btn btn-danger btn-sm" id="btnDelete">
                        <i class="fa fa-times-circle"></i>&nbsp;Cancelar
                      </button>
                    </div>
                  </td>
                </tr>';
    }
  }
}

function UserID()
{
  $sei = $_COOKIE['user'];
  $conection = conection();
  $busca = "SELECT id_cliente FROM cliente WHERE email='$sei'";
  $identificacao = mysqli_query($conection, $busca);
  $retorno = mysqli_fetch_array($identificacao);
  return $retorno['id_cliente'];
}

function getUserName()
{
  $id = UserID();
  $conection = conection();
  $busca = "SELECT nome FROM cliente WHERE id_cliente='$id'";
  $identificacao = mysqli_query($conection, $busca);
  $retorno = mysqli_fetch_array($identificacao);
  return $retorno['nome'];
}

function getEmail()
{
  $id = UserID();
  $conection = conection();
  $busca = "SELECT email FROM cliente WHERE id_cliente='$id'";
  $identificacao = mysqli_query($conection, $busca);
  $retorno = mysqli_fetch_array($identificacao);
  return $retorno['email'];
}

function getContratos()
{
  $id = UserID();
  $conection = conection();
  $busca = "SELECT count(id_aluguel) as total FROM aluguel WHERE id_cliente='$id' and status = 'aberto'";
  $identificacao = mysqli_query($conection, $busca);
  $retorno = mysqli_fetch_array($identificacao);
  return $retorno['total'];
}

function getAlugueis()
{
  $id = UserID();
  $conection = conection();
  $busca = "SELECT count(id_aluguel) as total FROM aluguel WHERE id_cliente='$id'";
  $identificacao = mysqli_query($conection, $busca);
  $retorno = mysqli_fetch_array($identificacao);
  return $retorno['total'];
}

function administrador($id)
{
  $conection = conection();
  $busca = "SELECT * FROM adm WHERE id_cliente='$id'";
  $identificacao = mysqli_query($conection, $busca);
  $resultado = mysqli_num_rows($identificacao);
  if($resultado >= 1 ){
    header("location: ../adm/index.php");
  }
}

function getEndereco()
{
  $id = UserID();
  $conection = conection();
  $busca = "SELECT endereco FROM cliente WHERE id_cliente='$id'";
  $identificacao = mysqli_query($conection, $busca);
  $retorno = mysqli_fetch_array($identificacao);
  return $retorno['endereco'];
}

function getCpf()
{
  $id = UserID();
  $conection = conection();
  $busca = "SELECT cpf FROM cliente WHERE id_cliente='$id'";
  $identificacao = mysqli_query($conection, $busca);
  $retorno = mysqli_fetch_array($identificacao);
  return $retorno['cpf'];
}

function getNascimento()
{
  $id = UserID();
  $conection = conection();
  $busca = "SELECT data_nascimento FROM cliente WHERE id_cliente='$id'";
  $identificacao = mysqli_query($conection, $busca);
  $retorno = mysqli_fetch_array($identificacao);
  return date("d/m/Y", strtotime($retorno['data_nascimento']));
}
?>